@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="text-center">
                                You are logged in! {{Auth::user()->name}}
                            </div>


                        <h2>My Profile!</h2>

                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <form enctype="multipart/form-data" action="profile" method="POST">
                            <label>Update image</label>
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" class="pull-right btn btn-sn btn-primary">
                        </form>
                    </div>

                        <div class="class text-center">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a href="{{ url('/changepassword') }}">Change password</a>
                        </div>
                        <br>


            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2">
                        <div>
                            <div class="col-md-5">
                                <h2>Thread list</h2>
                                @forelse($threadsUser as $th)
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <h5>{{$th->subject}}</h5>
                                            <a href="{{route('thread.show', $th->id)}}">{{$th->thread}}
                                            </a>
                                        </li>
                                    </ul>
                                @empty
                                    <p>Threads isn't found</p>
                                @endforelse
                            </div>

                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
