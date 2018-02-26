<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\NotificationMail;
use App\Notifications\RepliedTohThread;
use App\Thread;
use Illuminate\Http\Request;
use App\User;

class CommentController extends Controller
{

    public function addThreadComment(CommentRequest $request, Thread $thread)
    {
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;

        $threads = new Thread();


        $notifics=NotificationMail::all();

        foreach ($notifics as $not) {
            if($not->thread_id==$thread->id && $not->user_id==auth()->user()->id){
                auth()->user()->notify(new RepliedTohThread());
            }
        }
        
        $thread->comments()->save($comment);

        return back()->withMessage('comment create');

    }

    public function addReplyComment(CommentRequest $request, Comment $comment)
    {
        $reply = new Comment();
        $reply->body = $request->body;
        $reply->user_id = auth()->user()->id;
        $comment->comments()->save($reply);

        return back()->withMessage('Reply create');
    }


}
