<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class esewadetail extends Model
{
    use HasFactory;
    protected $table = 'payment_details';
    protected $fillable = ['user_id','username','blog_id','amount','esewa_status'];
    public function blogs(){
        return $this->hasOne(blogs::class,'id','blog_id');
    }
    public function users(){
        return $this->hasOne(User::class,'id','user_id');
    }
   
}
