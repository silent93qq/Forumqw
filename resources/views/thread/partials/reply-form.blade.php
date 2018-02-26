{{--//reply form--}}
<div class="reply-form">
    @if(auth()->check())
    <form action="{{route('replycomment.store',$comment->id)}}" method="post" role="form">
        {{csrf_field()}}
        <legend>Create Reply</legend>

        <div class="form-group">
            <input type="text" class="form-control" name="body" id="" placeholder="Reply...">
        </div>


        <button type="submit" class="btn btn-primary">Reply</button>
    </form>
@endif
</div>
<br>