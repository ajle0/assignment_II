<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('migrations\resources\views\posts\index.blade.php');
    }
}
