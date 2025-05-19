<?php

namespace App\Http\Controllers\Backend;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountSettingController extends Controller
{
    //View Account Page
    public function accountSetting(){
        return view('backend.account-setting');
    }
    //Update Account
    public function accountUpdate(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        notify()->success("Your Account Successfully Updated","Success");
        $user->save();
        return redirect()->back();
    }
    //Update Password
    public function passwordUpdate(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                notify()->success("Password Successfully Changed","Success");
                return redirect()->back();
            } else {
                notify()->error('New password cannot be the same as old password', 'Error');
                return redirect()->back();
            }
        } else {
            notify()->error('Old password not match ⚡️', 'Error');
            return redirect()->back();
        }

    }

}
