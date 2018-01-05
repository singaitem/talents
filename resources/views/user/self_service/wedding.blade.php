@extends('user.self_service.layouts.layout')
@section('content')

	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <div class="col-md-10 col-md-offset-1" style="margin-bottom: 10px;">
                <img src="/img/ring.svg" alt="Eyeglasses" style="max-width: 50px;">
                Wedding
            </div>
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="{{route('selfservice')}}"><i class="fa ion-ios-body-outline"></i>Request</a></li>
            <li class="active">Wedding</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
            <!-- left column -->
                
                <div class="col-md-10 col-md-offset-1">
                <!-- general form elements -->
                    <div class="box box-primary">
                        
                         <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('kacamata.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                Are you sure want to claim Wedding Donation ?
                                
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-right" id="appendModal">
                                <button class="btn bg-navy btn-block">Claim</button>
                            </div>
                            @extends('user.self_service.confirmation')
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            <!--/.col (left) -->
            </div>
        </section>
        
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="/assets/user/self_service/css/datepicker.css">
    <style type="text/css">
        .wrapper-upload{
            display: table;
            width: 100%;
        }
        .upload-img{
            display:table-cell;
            height: 275px;
            text-align: center;
            vertical-align: middle;
            width: 100%;
        }
        .wrapper-upload .upload-img img{
            display: inline;
        }
        .btn-file{
            display: block;
        }
        .inp-img{
            display: none;
        }
    </style>
@endsection
@section('javascript')
    <script type="text/javascript">
        $("#myModal").insertAfter($("#appendModal"));
    </script>
    <script src="/assets/user/self_service/js/datepicker.js"></script>
@endsection
