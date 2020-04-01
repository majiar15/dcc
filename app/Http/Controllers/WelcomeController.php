<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
class WelcomeController extends Controller
{
    public function index(){
                $posts = Posts::orderBy('id','desc')->paginate(6);
                
                

       
        return view('welcome',['posts' =>$posts]);
    }
}
