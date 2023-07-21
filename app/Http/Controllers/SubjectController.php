<?php

namespace App\Http\Controllers;

use App\Models\faculty;
use App\Models\subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $faculty = faculty::select('id','faculty_name')->get();
        $subject = subject::with('faculty:id,faculty_name')->get();
        return view('admin/subject/index',compact('subject','faculty'));
     }
     public function create(){
        return  view('admin.subject.create');
     }
     public function store(Request $req){
          $req->validate([
             'subject_name'=>'required',
             'faculty_id'=>'required'
          ]);
          subject::create([
             'subject_name'=>$req->subject_name,
             'faculty_id'=>$req->faculty_id
          ]);
          return back()->with('status','subject saved');
     }
    
     public function edit($id){
       $data = subject::with('faculty')->where('id',$id)->first();
       $faculty = faculty::select('id','faculty_name')->get();

       $subject = subject::all();
       return view('admin/subject/index',compact('subject','faculty','data'));
         
     }
     public function update(Request $req){
       $req->validate([
          'subject_name'=>'required',
          'faculty_id'=>'required'
       ]);
       subject::find($req->id)->update([
          'subject_name'=>$req->subject_name,
          'faculty_id'=>$req->faculty_id
       ]);
       return redirect('/admin/subject')->with('status','subject updated');
     }   
     public function destroy($id){
       $data = subject::find($id);
       if(isset($data)){
          $data->delete();
          return back()->with('status', 'record deleted');
       }else{
          return back()->with('status', 'record not found');
    
       }
    }
}
