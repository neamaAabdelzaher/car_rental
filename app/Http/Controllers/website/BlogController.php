<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
     public function __invoke()
    {
       return view('website.blog.index');
    }
}
