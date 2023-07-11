<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(){

    }
    public function store(Request $req){
       $req->validate([
        'comment'=>'required | min:4'
       ]);
          
       $comment  = Comment::create([
        'user_id'=>Auth::id(), 
        'blog_id'=>$req->blog_id,
        'comment'=>$req->comment
       ]);

       return back()->with('status','comment added Successfully');

    }
}
