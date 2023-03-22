<?php

namespace App\Models;

//using class of post model cuz i wanna make queries on the table post

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(related:User::class);
    }
    public function test(){
        return $this->belongsTo(related:user::class, foreignkey:'user_id');
        //post belongs to user model

}



public function comments()
{
    return $this->morphMany(Comment::class, 'commentable');
}
}