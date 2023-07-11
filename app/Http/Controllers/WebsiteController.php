<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use App\Models\esewadetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function index(){
        $blogs = blogs::latest()->where('status', 1)->get();
        return view('welcome', compact('blogs'));
    }
    public function show($id)
    {
        $data = blogs::with('comments', 'comments.hasusers:id,name')->find($id);
        if($data->type == 'paid'){
            $blogspaied =  esewadetail::where('blog_id', $data->id)->where('user_id', Auth::id())->count();
            if ($blogspaied > 0) {
                return view('/single-blogs', compact('data'));
            }else{
                  ;
                return back()->with('status', "<script> alert('It is Paid.') </script>");
            }
        }
        return view('/single-blogs', compact('data'));
        
    }
    public function search(Request $req){
        $blogs = blogs::where('title', 'like', "%{$req->search}%")
        ->orwhere('type', 'like', "%{$req->search}%")
        ->orwhere('price', 'like', "%{$req->search}%")
        ->orwhere('description', 'like', "%{$req->search}%")
        ->get();
        return view('welcome', compact('blogs'));
    }

}
