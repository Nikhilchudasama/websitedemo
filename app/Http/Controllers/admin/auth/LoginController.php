<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Displays login form to the user
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Login user to the adminpanel
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login()
    {
        request()->validate([
            'username' => 'required|exists:users,username|string',
            'password' => 'required|min:6',
            'remember' => 'required|boolean',
        ]);

        if (Auth::guard('user')->attempt([
            'username' => request('username'),
            'password' => request('password')
        ], request('remember'))) {
            request()->session()->flash('type', 'success');
            request()->session()->flash('message', 'Logged in successfully');

            return redirect()->route('admin_home');
        }

        request()->session()->flash('type', 'error');
        request()->session()->flash('message', "Sorry, we couldn't recognize you");

        return redirect()->route('admin_login_page');
    }
}
