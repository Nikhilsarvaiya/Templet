<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth, Hash;
use Str;


class AdminProfileController extends Controller
{   
    // edit profile
    public function profileEdit()
    {   
        $user = auth()->user();
        return view('admin.admin-profile',compact('user'));
    }

    // profile update
    public function profileUpdate(Request $request)
    {   
        $user = auth()->user();
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:admin,email,'.$user->id.',id',
            'password'              => 'nullable|min:8|confirmed',
            'password_confirmation' => 'nullable',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        if ( !empty( $request->password ) ) {
            $user->password = \Hash::make($request->password);
        }

        if ($user->save()) {
            return back()->with('success', 'Profile Updated Successfully');
        }

        return back()->with('error', 'Profile updated failed');
    }

    // password update
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'current_password'      => 'required',
            'password'              => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match');
        } else {
            $user->password = Hash::make($request->password);
            if ($user->save()){
                return back()->with('success', 'Password Changed Successfully');
            }else{
                return back()->with('error', 'Conform password not match');
            }
        }

    }

}
