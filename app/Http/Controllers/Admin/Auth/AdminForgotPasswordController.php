<?php

namespace App\Http\Controllers\Admin\Auth;

use Hash;
use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;


class AdminForgotPasswordController extends Controller
{
    // send forget password link
    public function forgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "email" => "required|exists:admin",
        ]);

        if($validator->fails()){
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        try {
            $status = Password::broker('admin')->sendResetLink($request->only('email'));
            
            if( $status === Password::RESET_LINK_SENT ){
                return response()->json([
                    'status'  => true,
                    'message' => 'Cool! Password recovery instruction has been sent to your email.',
                ]);    
            }
        } catch (\Throwable $th) {}
        
        return response()->json([
            'status'  => false,
            'message' => 'Oops! something went wrong, Please try again later',
        ]);

    }

    // reset password form
    public function ResetPasswordForm(Request $request,$token)
    {
        $admin = Admin::query()->where('email',$request->email)->first();
        return view('admin.auth.reset-password', compact('token','admin'));
    }

    // submit reset password form
    public function resetPasswordStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password_confirmation' => 'required',
            'password' => [
                'required',
                'confirmed',
                \Illuminate\Validation\Rules\Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
            ],
        ]);

        $admin = Admin::query()->where('email',$request->email)->first();

        $status = Password::broker('admin')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password)  {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if($status === Password::PASSWORD_RESET){
            return response()->json([
                'status'       => true,
                'message'      => 'Your password has been changed!',
                'redirect_url' => route('admin.login.form'),
            ]);
        }
        
        return response()->json([
            'status'  => false,
            'message' => 'Oops! something went wrong, Please try again later',
        ]);
        
    }
}
