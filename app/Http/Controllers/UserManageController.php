<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserManageController extends Controller
{
    
    public function index()
    {
    $datas = User::with('roles')->latest()->paginate(25);
  
        return view('admin.users.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function show($id)
    {
        
        $data = User::find($id);
        return view('admin.users.show', compact('data'));
        
    }
    public function edit($id)
    {
        $roles = Role::all();
        $data = User::with('roles')->where('id',$id)->first();
        return view('admin.users.create', compact('data','roles'));
    }
    public function update(Request $req, $id){
        $user = User::find($id);
        $user->update([
            'name'=>$req->name,
            'email'=>$req->email,
            'phone'=>$req->phone,
        ]);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($req->role);
        return back()->with('status', 'Updated Successfully');
    }
    public function destroy($id)
    {
        $data = User::find($id);
        if($data->delete()){
            return back()->with('status', 'deleted');
        }
    }
}
