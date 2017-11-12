@extends('layouts.app')
	
@section('page')
	@section('body_class','hold-transition skin-blue fixed sidebar-mini')
	@extends('user.layouts.navbar')
    {{--Region Content--}}
    @yield('content')

@endsection

@section('stylesheet')
	<link rel="stylesheet" href="/assets/user/css/user.css">
	<link rel="stylesheet" href="/assets/user/font/flaticon.css">
@endsection
@section('scripts')
	<script src="/assets/user/js/user.js"></script>
@endsection
