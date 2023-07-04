<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index(){
        
        $roles = Role::with('permissions')->get();
        return view('/admin.roles.index', compact('roles'));
    }
}
