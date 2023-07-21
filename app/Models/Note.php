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
        'description',
        'files',
        'user_id',
    ];   

    public function users(){
        return $this->belongsTo(User::class);
    }
}
