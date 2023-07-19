<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use App\Models\Category;
use App\Models\esewadetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function index(){
        $blogs = blogs::latest()->where('status', 1)->paginate(9);
        $categories = Category::select('id','categoryName')->get();
        return view('welcome', compact('blogs','categories'));
    }
    public function show($id)
    {
        $data = blogs::with('comments', 'comments.hasusers:id,name')->find($id);
        $categories = Category::select('id','categoryName')->get();
        if($data->type == 'paid'){
            $blogspaied =  esewadetail::where('blog_id', $data->id)->where('user_id', Auth::id())->count();
            if ($blogspaied > 0) {
                return view('/single-blogs', compact('data'));
            }else{
                  ;
                return back()->with('status', "<script> alert('It is Paid.') </script>");
            }
        }
        return view('/single-blogs', compact('data','categories'));
        
    }
    public function search(Request $req){
        $categories = Category::select('id','categoryName')->get();

        $blogs = blogs::where('title', 'like', "%{$req->search}%")
        ->orwhere('type', 'like', "%{$req->search}%")
        ->orwhere('price', 'like', "%{$req->search}%")
        ->orwhere('description', 'like', "%{$req->search}%")
        ->get();
        return view('welcome', compact('blogs','categories'));
    }
    public function categoryBlogs($category){
        $categories = Category::select('id','categoryName')->get();
         $blogs = blogs::with('category')->where('category_id',$category)->get();
         $category_name = Category::select('categoryName')->find($category);
        return view('category', compact('blogs','categories','category_name'));

    }
    public function notes(){
        $categories = Category::select('id','categoryName')->get();

        return view('notes', compact('categories'));

    }
    public function markedread($id){
        if($id){
            auth()->user()->notifications->where('id',$id)->markAsread();
        }
        return back();
    }

}
