<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $data = Category::all();
        return view('admin.category.index',compact('data'));
    }
    public function store(Request $req){
        $req->validate([
            'name'=>'required | min:4'
        ]);

        $category = Category::create([
            'categoryName'=>$req->name,
            'user_id'=>Auth::id()
        ]);

      return  $this->index()->with('status','created Successfully');
        
    }
    public function edit($id){
        $id = Category::findorfail($id);
        $data = Category::all();
        return view('admin.category.index',compact('data','id'));
        
    }
    public function update(Request $req){
        $req->validate([
            'name'=>'required | min:4'
        ]);

        $category = Category::find($req->id)->update([
            'categoryName'=>$req->name,
            'user_id'=>Auth::id()
        ]);

      return redirect('/admin/category')->with('status','Updated Successfully');
        
    }

    public function destroy($id){
        $cat = Category::findorfail($id);
        if($cat->delete()){
            return back()->with('status','Deleted Successfully');
        }
    }
}
