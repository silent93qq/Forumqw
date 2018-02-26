<div class="container">
    <div class="row">

        <div class="col-md-offset-6">
            <h2>
                Threads
            </h2>

        </div>

        @if(auth()->check())
        <div class="col-md-offset-10 col-md-2">
            <a class="btn btn-primary pull-right" href="{{route('thread.create')}}">Create Thread</a>
        </div>
        @endif

    </div>
</div>