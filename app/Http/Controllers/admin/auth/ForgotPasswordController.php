<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('admin.auth.forgot_password');
    }

    /**
     * Send a reset link to the given user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail()
    {
        $validatedData = request()->validate([
            'email' => 'required|email|max:255',
        ]);
        $response = Password::broker('users')->sendResetLink($validatedData);

        if ($response == Password::RESET_LINK_SENT) {
            request()->session()->flash('type', 'success');
            request()->session()->flash('message', 'Please check your email Inbox. We have send you the password reset link.');

            return redirect()->route('admin_login_page');
        }

        return redirect()->route('admin_forgot_password_page')->withInput(request()->all())->with(['error', 'Error Occurred']);
    }
}
