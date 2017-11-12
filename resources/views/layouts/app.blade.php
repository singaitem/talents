<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        {{--CSRF Token--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{--Title and Meta--}}

        {{--Common App Styles--}}
        <link rel="stylesheet" href="{{asset('assets/app/css/app.css')}}">
        
        
        {{--Styles--}}
        @yield('stylesheet')

        {{--Head--}}
        @yield('head')
        
        {{--Font--}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition @yield('body_class')">

        {{--Page--}}
        @yield('page')

        {{--Common Scripts--}}
        <script src="/assets/app/js/app.js"></script>

        {{--Scripts--}}
        @yield('scripts')
    </body>
</html>
