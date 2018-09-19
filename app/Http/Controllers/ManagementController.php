<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ManagementController extends Controller
{
    public function management()
    {
        $user = User::all();
        return view('manage.user',compact('user'));
    }
}
