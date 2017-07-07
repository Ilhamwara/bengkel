<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }
        return view('login');
    }
    public function postlogin(Request $r)
    {
        $this->validate($r, [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if (Auth::attempt(['email' => $r->email, 'password' => $r->password])) {
            return redirect()->intended('home');
        }

        return redirect()->back()->with('error','email dan password yang anda masukan tidak sesuai');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
