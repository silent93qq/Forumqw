{{--Comment--}}
@foreach($thread->comments as $comment)
    <div class="comment-list">

        <h4><p>Comments:{{$comment->body}}</p></h4>
        <lead><p>Login:{{$comment->user->name}}</p></lead>


        <div class="container">
            <div class="row">
                <div class="col-md-offset-9">
                    <button class="btn btn-default btn-sm-5"
                            id="{{$comment->id}}-count">{{$comment->likes()->count()}}</button>
                    <span onclick="likeIt('{{$comment->id}}',this)"
                          class="btn btn-default btn-sm-5  {{$comment->isLiked()?"liked":""}}"><span
                                class="glyphicon glyphicon-thumbs-up"></span></span>

                </div>
            </div>
        </div>
        <br>
        <br>

        {{--Reply--}}
        @foreach($comment->comments as $reply)
            <div class="small well text-info reply-list" style="margin-left: 40px">
                <p>{{$reply->body}}</p>
                <lead> by {{$reply->user->name}}</lead>
            </div>

        @endforeach

        @include('thread.partials.reply-form')
        @endforeach
        <br><br>
    </div>