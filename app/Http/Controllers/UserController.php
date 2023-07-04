<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterReq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function register(RegisterReq $req){
      
        $user = User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'phone'=>$req->phone,
            'password'=>Hash::make($req->password)
        ]);
        $role = Role::where('name','default')->first();
        $user->assignRole($role->id);
        return redirect('/login')->with('status', 'Registered Successfully, Please Login');
    }

    public function login(Request $req){
        $credentials =  $req->validate([
            'email'=>'required| email | exists:users',
            'password'=>'required|min:8'
        ]);
        if(Auth::attempt($credentials)){
            $req->session()->regenerate();
            return redirect()->intended('/admin/dashboard');

        }else{
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

    }
    public function logout(){
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/')->with('status','logout Successfuly');
    }
}

