@extends('layouts.app')

@section('content')
    <h4>{{$thread->subject}}</h4>
    <hr>

    <div class="thread-details">
        {{$thread->thread}}
    </div>
    {{--Comment--}}
    @foreach($thread->comments as $comment)
        <div class="comment-list">

            <h4><p>Comments:{{$comment->body}}</p></h4>
            <lead><p>Login:{{$comment->user->name}}</p></lead>


            <div class="container">
                <div class="row">
                    <div class="col-md-offset-7">
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

            {{--//reply form--}}
            <div class="reply-form">

                <form action="{{route('replycomment.store',$comment->id)}}" method="post" role="form">
                    {{csrf_field()}}
                    <legend>Create Reply</legend>

                    <div class="form-group">
                        <input type="text" class="form-control" name="body" id="" placeholder="Reply...">
                    </div>


                    <button type="submit" class="btn btn-primary">Reply</button>
                </form>

            </div>
            <br>
            @endforeach
            <br><br>
        </div>


        <div class="comment-form">

            <form action="{{route('threadcomment.store',$thread->id)}}" method="post" role="form">
                {{csrf_field()}}
                <legend>Create comment</legend>
                <div class="form-group">
                    <input type="text" class="form-control" name="body" id="" placeholder="Input...">
                </div>
                <button type="submit" class="btn btn-primary">Comment</button>
            </form>

        </div>
@endsection
@section('js')
    <script>
        function likeIt(commentId, elem) {
            var csrfToken = '{{csrf_token()}}';
            var likesCount = parseInt($('#' + commentId + "-count").text());
            $.post('{{route('toggleLike')}}', {commentId: commentId, _token: csrfToken}, function (data) {
                console.log(data);
                if (data.message === 'liked') {
                    $(elem).addClass('liked');
                    $('#' + commentId + "-count").text(likesCount + 1);
                    //$(elem).css({color:'blue'});
                }
                else {
                    $('#' + commentId + "-count").text(likesCount - 1);
                    $(elem).removeClass('liked');
                }

            });

        }
    </script>


@endsection
