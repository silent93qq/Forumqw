<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    use LikableTrait;

    protected $fillable=['body','user_id'];
    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');

    }

}
