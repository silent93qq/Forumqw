@extends('layouts.app')

@section('content')

    @include('layouts.partials.error')
    @include('layouts.partials.success')

    <div class="row">
        <div class="col-md-offset-5">
            <div class=" well">
                <form class="form-vertical" action="{{route('thread.store')}}" method="post" role="form"
                      id="create-thread-form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" id="" placeholder="Input..."
                               value="{{old('subject')}}">
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <textarea class="form-control" name="type" id="" placeholder="Input..."
                        > {{old('type')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="thread">Thread</label>
                        <textarea class="form-control" name="thread" id="" placeholder="Input..."
                        > {{old('thread')}}</textarea>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>



@endsection
