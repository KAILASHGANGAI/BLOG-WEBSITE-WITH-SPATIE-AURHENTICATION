<?php

namespace App\Http\Controllers;

use App\Models\faculty;
use App\Models\Note;
use App\Models\subject;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class NoteController extends Controller
{
    public function index(){
        $datas = Note::all();
        return view('admin.notes.index', compact('datas'));
    }
 
}
