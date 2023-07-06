<?php

namespace App\Http\Controllers;

use App\Http\Requests\blogRequest;
use App\Models\blogs;
use App\Models\esewadetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\CodeCleaner\ReturnTypePass;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $user_type = User::with('roles')->find(Auth::id())->roles[0]->name;

          if($user_type == 'default'){
           
           // return $datas = esewadetail::with('blogs')->where('user_id', Auth::id())->where('esewa_status','verified')->get();
           
            $datas =  DB::table('blogs')
           ->join('payment_details', 'blogs.id', '=', 'payment_details.blog_id')
           ->join('users', 'payment_details.user_id', '=', 'users.id')
           ->where('payment_details.user_id', Auth::id())
           ->where('payment_details.esewa_status', 'verified')
           ->get();
           return view('admin.blogs.index',compact('datas', 'user_type'));

          }else{
            $datas = blogs::with('users')->latest()->paginate(5);
            return view('admin.blogs.index',compact('datas', 'user_type'));

          }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(blogRequest $request)
    {
         $request->validated();
         $imageName = time().'.'.$request->image->extension();  
         $request->image->move(public_path('image'), $imageName);
         $path = 'image/'.$imageName;
        $blog = blogs::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$path,
            'price'=>$request->price,
            'type'=>$request->type,
            'user_id'=> Auth::id()
        ]);
        if($blog){
            return redirect('/admin/blogs')->with('status',' Blog added successfully');
        }else{
            return redirect('/admin/blogs')->with('status',' Blog failed to save');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $data = blogs::find($id);
        return view('admin.blogs.show', compact('data'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = blogs::find($id);
        
        return view('admin.blogs.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(isset($request->image)){
        $imageName = time().'.'.$request->image->extension();  

         $request->image->move(public_path('image'), $imageName);
         $path = 'image/'.$imageName;
        }else{
            $path = blogs::find($id)->image;
        }
        $blog = blogs::find($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$path,
            'price'=>$request->price,
            'type'=>$request->type,
            'user_id'=> Auth::id()
        ]);
        if($blog){
            return redirect('/admin/blogs')->with('status',' Blog added successfully');
        }else{
            return redirect('/admin/blogs')->with('status',' Blog failed to save');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = blogs::find($id);
        if(file_exists($data->image)){
            unlink($data->image);
            $data->delete();
            return back()->with('status', 'deleted');
        }else{
            $data->delete();
            return back()->with('status', 'deleted');

        }
    }
    public function publish($id){
        $data = blogs::find($id);
        if($data->status == 0){
            $data->status = 1;
            $data->save();
            return back()->with('status', 'Published Successfully');
        }else{
            $data->status = 0;
            $data->save();
            return back()->with('status', 'UnPublished Successfully');
        }

    }
}
