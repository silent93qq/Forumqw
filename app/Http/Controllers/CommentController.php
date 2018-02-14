<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Notifications\RepliedTohThread;
use App\Thread;
use Illuminate\Http\Request;
use App\User;

class CommentController extends Controller
{

    public function addThreadComment(Request $request, Thread $thread)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;

        $threads = new Thread();

        
        auth()->user()->notify(new RepliedTohThread());
        
        $thread->comments()->save($comment);

        return back()->withMessage('comment create');

    }

    public function addReplyComment(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $reply = new Comment();
        $reply->body = $request->body;
        $reply->user_id = auth()->user()->id;

        $comment->comments()->save($reply);

        return back()->withMessage('Reply create');
    }


}
