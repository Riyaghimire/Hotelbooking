<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class blogcontroller extends Controller
{
    public function index(){
        return view ('frontend.blog');
    }

    public function blogSingle(){
        return view ('frontend.blog-single');
    }
}
