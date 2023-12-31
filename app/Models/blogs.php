<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class blogs extends Model
{
        
    use HasFactory, LogsActivity;
    protected $fillable =['title','image'	,'description','category_id','user_id','type', 'price'];

     public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
        // Chain fluent methods for configuration options
    }
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'blog_id', 'id');
    }
   
}
