<?php

namespace App\Models;

//using class of post model cuz i wanna make queries on the table post

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $fillable = [
        'title',
        'slug',
        'description',
        'user_id',
        'img',
    ];
   
    public function user(){
        return $this->belongsTo(related:User::class);
    }
    public function test(){
        return $this->belongsTo(related:user::class, foreignkey:'user_id');
        //post belongs to user model
}
public function sluggable(): array
{
    return [
        'slug' => [
            'source' => ['title']
        ]
    ];
}



public function comments()
{
    return $this->morphMany(Comment::class, 'commentable');
}
}