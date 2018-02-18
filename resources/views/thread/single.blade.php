@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2">

                <div class="well text-info reply-list">
                    <h4>{{$thread->subject}}</h4>
                    <hr>
                    <hr>
                    <div class="thread-details">
                        {{$thread->thread}}
                    </div>
                    <hr>

                </div>

                @include('thread.partials.reply-comment-list')

                @include('thread.partials.comment-form')

                @endsection

                @section('js')
                    <script>
                        function likeIt(commentId, elem) {
                            var csrfToken = '{{csrf_token()}}';
                            var likesCount = parseInt($('#' + commentId + "-count").text());
                            $.post('{{route('toggleLike')}}', {
                                commentId: commentId,
                                _token: csrfToken
                            }, function (data) {
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

            </div>
        </div>
    </div>


@endsection
