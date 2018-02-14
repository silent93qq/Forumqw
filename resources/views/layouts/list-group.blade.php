<div class="list-group">
    @forelse($threads as $thread)
        <a href="{{route('thread.show',$thread->id)}}" class="list-group-item">
            <h4 class="list-group-item-heading">{{$thread->subject}}</h4>
            <p class="list-group-item-text">{{str_limit($thread->thread,100)}}</p>
            <br>
            <form action="{{route('Notification')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="notificationId" value="{{$thread->id}}">
                <input type="submit" class="btn btn-success pull-right" id="{{$thread->id}}" value="Notification">
            </form>
            <lead><p>Login:{{$thread->user->name}}</p></lead>
        </a>

    @empty
        <h5>No threads</h5>

    @endforelse
</div>