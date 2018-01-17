@extends('user.layouts.user')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Setting
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Setting</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid gallery-container">
                <div class="gallery-box">
                    <div class="row">
                        <div class="col-sm-6 col-md-2 col-md-offset-1 box-transition">
                            <a class="lightbox" href="{{route('setting.marital')}}">
                                <img src="/img/marital.svg" alt="Eyeglasses">
                                <div class="text-center panel-footer">Change Marital</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-2 box-transition">
                            <a class="lightbox" href="{{route('setting.family')}}">
                                <img src="/img/family.svg" alt="Eyeglasses">
                                <div class="text-center panel-footer">Family</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-2 box-transition">
                            <a class="lightbox" href="{{route('setting.address')}}">
                                <img src="/img/address.png" alt="Eyeglasses">
                                <div class="text-center panel-footer">Address</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-2 box-transition">
                            <a class="lightbox" href="{{route('setting.certificate')}}">
                                <img src="/img/certificate-flat.png" alt="Eyeglasses">
                                <div class="text-center panel-footer">Certificate</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-2 box-transition">
                            <a class="lightbox" href="{{route('setting.eyeglasses')}}">
                                <img src="/img/glasses.svg" alt="Eyeglasses">
                                <div class="text-center panel-footer">Eyeglasses</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-2 col-md-offset-1 box-transition">
                            <a class="lightbox" href="{{route('setting.medical')}}">
                                <img src="/img/medical.svg" alt="Medical">
                                <div class="text-center panel-footer">Medical</div>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-2 box-transition">
                            <a class="lightbox" href="{{route('setting.medicaloverlimit')}}">
                                <img src="/img/medicaloverlimmit.png" alt="Tunnel" align="middle">
                                <div class="text-center panel-footer">Medical Overlimit</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-2 box-transition">
                            <a class="lightbox" href="{{route('setting.businesstravel')}}">
                                <img src="/img/business-travel.svg" alt="Coast">
                                <div class="text-center panel-footer">Business Travel</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-2 box-transition">
                            <a class="lightbox" href="{{route('setting.spdadvance')}}">
                                <img src="/img/spdadvance.svg" alt="Rails">
                                <div class="text-center panel-footer">SPD Advance</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-2 box-transition">
                            <a class="lightbox" href="{{route('setting.wedding')}}">
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
    <style>
        .gallery-box .lightbox img {
            min-height: 150px;
        }
    </style>
@endsection
@section('javascript')
    <script src="/assets/user/self_service/js/gallery.js"></script>
@endsection