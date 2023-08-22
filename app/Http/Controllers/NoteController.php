<?php

namespace App\Http\Controllers;

use App\Models\faculty;
use App\Models\Note;
use App\Models\subject;
use App\Models\User;
use Faker\Core\File;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator as ValidationValidator;
use Symfony\Component\Console\Input\Input;

class NoteController extends Controller
{
    public function index(){
      $user_type = User::with('roles')->find(Auth::id())->roles[0]->name;

      if($user_type == 'default'){
       
       
        $datas =  DB::table('notes')
       ->join('payment_details', 'notes.id', '=', 'payment_details.note_id')
       ->join('users', 'payment_details.user_id', '=', 'users.id')
       ->where('payment_details.user_id', Auth::id())
       ->where('payment_details.esewa_status', 'verified')
       ->get();
       return view('admin.notes.index',compact('datas', 'user_type'));

      }else{
        $datas = Note::with('users')->latest()->paginate(5);
        return view('admin.notes.index',compact('datas', 'user_type'));

      }
        // $datas = Note::with('faculty:id,faculty_name','subject:id,subject_name')->get(['id','title','faculty_id','subject_id','type','price']);
        // return view('admin.notes.index', compact('datas'));
    }
    public function create(){
        $subject = subject::get(['id','subject_name']);
        $faculty = faculty::get(['id','faculty_name']);
        return view('admin.notes.create', compact('subject','faculty'));


    }
    public function store(Request $req){
        $req->validate([
        'faculty'=>'required',
            'subject'=>'required',
            'title'=>'required',
            'type'=>'required',
            'file'=>'required|mimes:csv,txt,xlx,xls,pdf',
            'description'=>'required'
       ]);
       $file = $req->file('file');
       if(isset($file)){
         $fileName = time().'.'.$file->extension();  
 
          $file->move(public_path('Notes'), $fileName);
          $path = 'Notes/'.$fileName;
         }
       Note::create([
        'title'=>$req->title,
        'faculty_id'=>$req->faculty,
        'subject_id'=>$req->subject,
        'price'=>$req->price,
        'type'=>$req->type,
        'description'=>$req->description,
        'files'=>$path,
        'user_id'=>Auth::id(),
       ]);
       return back()->with('status', 'Notes Uploaded');
         
    }
 public function show($id){
  
    $data = Note::with('faculty', 'subject')->where('id',$id)->first();
    return view('admin.notes.show', compact('data'));
 }
 
 public function edit($id){
   $subject = subject::get(['id','subject_name']);
   $faculty = faculty::get(['id','faculty_name']);
    $data = Note::find($id);
    return view('admin.notes.create', compact('data','subject','faculty'));
 }
 public function update(Request $req){
   $req->validate([
      'faculty'=>'required',
          'subject'=>'required',
          'title'=>'required',
          'description'=>'required'
     ]);
     $file = $req->file('file');
     if(isset($file)){
       $fileName = time().'.'.$file->extension();  

        $file->move(public_path('Notes'), $fileName);
        $path = 'Notes/'.$fileName;
       }else{
         $path = Note::find($req->id)->files;
       }
     Note::find($req->id)->update([
      'title'=>$req->title,
      'faculty_id'=>$req->faculty,
      'subject_id'=>$req->subject,
      'price'=>$req->price,
      'type'=>$req->type,
      'description'=>$req->description,
      'files'=>$path,
    
     ]);
     return redirect('/admin/notes')->with('status', 'Notes Uploaded');
 }
 
 public function destroy($id){
    $data = Note::find($id);
    if (isset($data->files)) {
        unlink($data->files);
    }
    if($data->delete()){
      return  back()->with('status','deleted successfully');
    }
    return  back()->with('status','Data not found');
  
 }
}
