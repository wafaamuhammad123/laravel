<?php

namespace App\Models;

use Illuminate\Http\Request;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    public function commentable()
    {
        return $this->morphTo();
        //retrieve model related to my class
    }
    protected $fillable = [
        'comment',
    ];
}
