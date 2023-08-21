<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'faculty_id',
        'subject_id',
        'type',
        'price',
        'description',
        'files',
        'user_id',
    ];   

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function faculty(){
        return $this->hasOne(faculty::class,'id','faculty_id');
    }
    public function subject(){
        return $this->hasOne(subject::class,'id','subject_id');
    }
}
