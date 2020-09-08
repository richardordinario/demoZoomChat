<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        @include('layouts.style.style')
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            
            <a href="{{url('/login')}}" class="btn btn-info">Login User</a>
            <a href="{{url('/register')}}" class="btn btn-info">Register User</a>
        </div>
        @include('layouts.script.script')
    </body>
</html>
