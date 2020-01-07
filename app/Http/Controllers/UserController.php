<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
class UserController extends Controller
{
 
    public function __construct() {
        $this->middleware('auth');
    }
    public function horas(){
        $user = User::all();

        return view('user.registerHoras',['users' => $user]);
        
    }
}
