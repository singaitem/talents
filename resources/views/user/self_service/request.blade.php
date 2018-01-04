@extends('user.layouts.user')
@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Request
            <small>Type of requests</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">SelfService</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid gallery-container">
                <div class="gallery-box">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 box-transition">
                            <a class="lightbox" href="{{route('kacamata')}}">
                                <img src="/img/glasses.svg" alt="Eyeglasses">
                                <div class="text-center panel-footer">Eyeglasses</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 box-transition">
                            <a class="lightbox" href="{{route('medical')}}">
                                <img src="/img/medical.svg" alt="Medical">
                                <div class="text-center panel-footer">Medical</div>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-4 box-transition">
                            <a class="lightbox" href="">
                                <img src="https://cdn4.iconfinder.com/data/icons/usa-dollar-2/512/xxx025-512.png" alt="Tunnel" align="middle">
                                <div class="text-center panel-footer">Medical Overlimit</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 box-transition">
                            <a class="lightbox" href="{{route('travel')}}">
                                <img src="/img/business-travel.svg" alt="Coast">
                                <div class="text-center panel-footer">Business Travel</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 box-transition">
                            <a class="lightbox" href="">
                                <img src="https://accenttravel.com/wp-content/uploads/2016/07/icon-reports_v1.png" alt="Rails">
                                <div class="text-center panel-footer">SPD Advance</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 box-transition">
                            <a class="lightbox" href="">
                                <img src="/img/ring.svg" alt="Traffic">
                                <div class="text-center panel-footer">Wedding</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
          
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="/assets/user/self_service/css/gallery.css">
@endsection
@section('javascript')
    <script src="/assets/user/self_service/js/gallery.js"></script>
@endsection