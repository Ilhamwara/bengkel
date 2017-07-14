<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;

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
    public function manage()
    {
        $user = User::all();
        return view('user.index',compact('user'));
    }
    public function edituser($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit',compact('user'));
    }
    public function edituserpost(Request $r, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $r->nama;
        $user->email = $r->email;

        if (!empty($r->password)) {
            $user->password = Hash::make($r->password);
        }
        $user->save();

        return redirect()->back()->with('success','Berhasil merubah data');
    }
    public function hapususer($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success','Berhasil menghapus user');
    }
    public function tambahuser()
    {
        return view('user.tambah');
    }
    public function tambahuserpost(Request $r)
    {
        $user = new User;
        $user->name = $r->nama;
        $user->email = $r->email;
        $user->password = Hash::make($r->password);
        $user->save();

        return redirect()->back()->with('success','Berhasil menambahkan user');
    }
}
