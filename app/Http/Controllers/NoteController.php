<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
        $datas = Note::all();
        return view('admin.notes.index', compact('datas'));
    }
    public function store(Request $request){

    }
    public function edit($id){

    }
    public function show($id){

    }
    public function update($id){

    }
    public function destroy(){
        
    }
}
