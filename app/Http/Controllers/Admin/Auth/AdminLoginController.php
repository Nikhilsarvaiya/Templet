<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth as AdminAuth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return AdminAuth::guard('admin');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return response()->json([
            'status'       => false,
            'message'      => 'Incorrect username or password. Please try again',
            'redirect_url' => route('admin.login.form'),
        ]);
    }

    public function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        $user = $this->guard('admin')->user();
        $user->last_logged_in_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->last_login_ip     = request()->getClientIp();
        $user->save();

        \Log::info("Admin log-in - " . request()->path()."\n".request()->getClientIp()."\n". $user->email. ' ,'.$user->name);

        return response()->json([
            'status'       => true,
            'message'      => 'You are now logged in.',
            'redirect_url' => route('admin.home'),
        ]);
    }

    public function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            ['email' => $request->email, 'password' => $request->password],
            $request->filled('remember')
        );
    }
    
    public function logout(Request $request)
    {
        $user = $this->guard('admin')->user();
        \Log::info("Admin log-out - " . request()->path()."\n".request()->getClientIp()."\n  ". $user->email. ', '.$user->name ."\n time spend :-".$user->last_logged_in_at->diffForHumans(now(), \Carbon\CarbonInterface::DIFF_ABSOLUTE));

        $this->guard('admin')->logout();

        return redirect()->route('admin.login.form')->with('success', 'Logout successfully');
    }
}
