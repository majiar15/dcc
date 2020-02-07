<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class CategoryController extends Controller
{
    public function index($id){
        $category = category::find($id);
        return view('Category.number'.$id , [
            'category'=>$category
        ]);
    }
}
