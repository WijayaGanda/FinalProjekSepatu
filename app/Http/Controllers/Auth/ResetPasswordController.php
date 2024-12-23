<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class ResetPasswordController extends Controller
{
    // /*
    // |--------------------------------------------------------------------------
    // | Password Reset Controller
    // |--------------------------------------------------------------------------
    // |
    // | This controller is responsible for handling password reset requests
    // | and uses a simple trait to include this behavior. You're free to
    // | explore this trait and override any methods you wish to tweak.
    // |
    // */

    // use ResetsPasswords;

    // /**
    //  * Where to redirect users after resetting their password.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = '/homes';

    public function showForm()
    {
        return view('auth.passwords.direct-reset');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        $user->password = Hash::make($request->new_password);
        $user->save();

        Alert::success('Updated Successfully', 'Password Updated Successfully');
        return redirect()->route('login')->with('status', 'Password berhasil diubah!');
    }
}
