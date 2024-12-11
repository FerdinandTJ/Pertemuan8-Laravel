<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('signin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($credentials['email'] == 'ferdinandtj4@gmail.com' && $credentials['password'] == 'ferdinand') {
            session()->put('user', $credentials);

            return redirect('/')->with('success', 'Login successful');
        } else {

            return redirect('/signin')->with('error', 'Email or password is incorrect');
        }
    }

    public function showRegister()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        $data = $request->only('name', 'email', 'password', 'password_confirmation');

        if ($data['password'] === $data['password_confirmation']) {
            session()->put('user', $data);

            return redirect('/signin')->with('success', 'Registration successful, please login');
        } else {
            return redirect('/signup')->with('error', 'Password and confirmation do not match');
        }
    }
}
