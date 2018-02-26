<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
   protected $guarded=[];
    protected $fillable=['subject','type','thread','user_id','notification'];


    public function user(){
        return $this->belongsTo(User::class);

    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');

    }


}
