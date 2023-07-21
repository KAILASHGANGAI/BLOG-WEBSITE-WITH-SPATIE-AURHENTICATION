<?php

namespace App\Http\Controllers;

use App\Models\faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
 public function index(){
    $faculty = faculty::all();
    return view('admin/faculty/index',compact('faculty'));
 }
 public function create(){
    return  view('admin.faculty.create');
 }
 public function store(Request $req){
      $req->validate([
         'faculty_name'=>'required|unique:faculties'
      ]);
      faculty::create([
         'faculty_name'=>$req->faculty_name
      ]);
      return back()->with('status','Faculty saved');
 }

 public function edit($id){
   $data = faculty::find($id);
   $faculty = faculty::all();
   return view('admin/faculty/index',compact('faculty','data'));
     
 }
 public function update(Request $req){
   $req->validate([
      'faculty_name'=>'required|unique:faculties'
   ]);
   faculty::find($req->id)->update([
      'faculty_name'=>$req->faculty_name
   ]);
   return redirect('faculty')->with('status','Faculty updated');
 }


 public function destroy($id){
   $data = faculty::find($id);
   if(isset($data)){
      $data->delete();
      return back()->with('status', 'record deleted');
   }else{
      return back()->with('status', 'record not found');

   }
}
}
