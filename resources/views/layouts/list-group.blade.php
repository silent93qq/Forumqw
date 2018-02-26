<div class="container">
    <div class="row">
    <div class="col-md-offset-2">
        <div class="list-group">
            @forelse($threads as $thread)
                <a href="{{route('thread.show',$thread->id)}}" class="list-group-item">
                    <h4 class="list-group-item-heading">{{$thread->subject}}</h4>
                    <p class="list-group-item-text">{{str_limit($thread->thread,100)}}</p>
                    <br>

                    @if(auth()->check())
                    <form action="{{route('notific',$thread->id)}}" method="post" role="form">
                        {{csrf_field()}}

                       {{--@foreach($notifs as $not)--}}
                            {{--@if($not->thread_id==$thread->id && $not->user_id==auth()->user()->id)--}}
                                {{--<input type="submit" class="btn btn-success pull-right"  value="Remove notific">--}}
                        {{--@else--}}
                                <input type="submit" class="btn btn-success pull-right"  value="Notification">
                            {{--@endif--}}
                        {{--@endforeach--}}

                    </form>
                    @endif

                    <lead><p>Login:{{$thread->user->name}}</p></lead>
                </a>

            @empty
                <h5>No threads</h5>

            @endforelse
    </div>


        </div>
</div>
</div>