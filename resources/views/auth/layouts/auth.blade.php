@extends('layouts.app')
	
@section('page')

    {{--Region Content--}}
    @yield('content')

@endsection

@section('stylesheet')
	<link rel="stylesheet" href="/assets/auth/css/auth.css">
@endsection
@section('scripts')
	<script src="/assets/auth/js/auth.js"></script>
@endsection
