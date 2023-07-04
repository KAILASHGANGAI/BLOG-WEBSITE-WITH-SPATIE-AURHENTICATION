<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        $blogs = blogs::latest()->where('status', 1)->get();
        return view('welcome', compact('blogs'));
    }
    public function show($id)
    {
        $data = blogs::find($id);
        return view('/single-blogs', compact('data'));
        
    }

}
