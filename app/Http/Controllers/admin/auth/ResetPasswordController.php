<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Decide where to redirect the user after reset password
     *
     * @return string
     */
    public function redirectTo()
    {
        return route('admin_home');
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param string $token
     * @return \Illuminate\Http\Response
     */
    public function showResetForm($token, $email)
    {
        return view('admin.auth.reset_password', compact('token', 'email'));
    }

    /**
     * Specify the guard to be used for authentication.
     *
     * @return void
     */
    protected function guard()
    {
        return Auth::guard('user');
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('users');
    }
}
