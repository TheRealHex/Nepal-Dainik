<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $table="posts";
    protected $fillable = ['title','image','content','cat_id','user_id','status','remarks'];
    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
