<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Forum</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
@include('layouts.navbar')

<div class="container">


    <div class="row">
        <div class="row content-heading"></div>
        <div class="col-md-3"><h4>Category</h4>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4"><h4 class="main-content-heading">@yield('heading')</h4>
                    </div>
                    <div class="col-md-offset-8 col-md-2">
                        <a class="btn btn-primary" href="{{route('thread.create')}}">Create Thread</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-9">
        <div class="content-wrap-well">


            @yield('content')
        </div>
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('js')
</body>
</html>
