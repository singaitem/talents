@extends('user.layouts.user')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Family
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">User profile</li>
            </ol>
        </section>

            <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box sidebar-default">
                        <div class="box-body box-profile">
                            <div class="content-group-sm">
                                <h6 class="text-semibold no-margin-bottom">
                                    {{auth()->user()->employee->person->name}}
                                </h6>
                                <span class="display-block">
                                    {{auth()->user()->employee->position->name}}
                                </span>
                                <span class="display-block">
                                    {{auth()->user()->employee->name}}
                                </span>
                            </div>
                            <a href="{{route('profile')}}" class="display-inline-block content-group-sm" >
                                <img class="profile-user-img img-responsive img-circle" src="/img/profile_picture/{{auth()->user()->employee->person->picture}}" alt="User profile picture" style="margin-bottom: 30px;">
                            </a>
                        </div>
                        <div class="panel no-border-top no-border-radius-top">
                            <ul class="navigation">
                                <li class="navigation-header">Navigation</li>
                                <li><a href="{{route('profile')}}"><i class="fa fa-user"></i> Profile</a></li>
                                <li class="active"><a href="{{route('family')}}"><i class="fa fa-users"></i> Family</a></li>
                                <li><a href="#schedule"><i class="fa fa-home"></i> Address</a></li>
                                <li><a href="#orders"><i class="fa fa-certificate"></i> Certificate</a></li>
                                <li class="navigation-divider"></li>
                                <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i> Log out</a></li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    @if(auth()->user()->employee->subordinate()->count())
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Team Members</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body box-members">
                                @foreach(auth()->user()->employee->subordinate() as $subordinate)
                                <div class="user-block team-members">
                                     <img class="img-circle img-bordered-sm" src="/img/profile_picture/{{$subordinate->person->picture}}" alt="user image">
                                    <span class="username">{{$subordinate->person->name}}</span>
                                    <span class="description">
                                        <div>{{$subordinate->position->name}}</div>
                                        <div>{{$subordinate->name}}</div>
                                    </span>
                                </div>
                                <hr>
                                @endforeach
                            </div>
                            <!-- /.box-body -->
                        </div>
                    @endif
                    
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box box-primary white-box">
                        <div class="body">
                            <div class="box-header with-border">
                                <h3 class="box-title">Family Members</h3>
                            </div>
                            <div class="box-body">
                                <div class="list-group">
                                    <div>
                                       <a href="" class="list-group-item">
                                            <h4 class="list-group-item-heading">Father</h4>
                                            <p class="list-group-item-text">
                                                Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                                Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                                pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                                sadipscing mel.
                                            </p>
                                        </a> 
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <h4 class="list-group-item-heading">List group item heading</h4>
                                            <p class="list-group-item-text">
                                                Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                                Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                                pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                                sadipscing mel.
                                            </p>
                                        </a>    
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <h4 class="list-group-item-heading">List group item heading</h4>
                                            <p class="list-group-item-text">
                                                Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                                Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                                pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                                sadipscing mel.
                                            </p>
                                        </a>
                                    </div>
                                    <button type="button" class="btn-raised btn btn-danger btn-floating waves-effect waves-light waves-round waves-effect waves-light">
                                        <i class="icon md-plus fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
<!-- /.content -->
</div>
@endsection
@section('css')
    <link rel="stylesheet" href="/assets/user/myhr/css/profile.css">
    <style>
        .list-group div{
            position: relative;
        }
        .list-group .btn-floating {
            position: absolute;
            bottom: 15px;
            right: 20px;
            -webkit-transform: translate(0,-50%);
            -ms-transform: translate(0,-50%);
            -o-transform: translate(0,-50%);
            transform: translate(0,-50%);
        }
        .waves-button, .waves-circle, .waves-float, .waves-round {
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-mask-image: -webkit-radial-gradient(circle,#fff 100%,#000 100%);
        }
        .waves-effect {
            position: relative;
            z-index: 1;
            display: inline-block;
            overflow: hidden;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
        }
        .btn-floating {
            width: 5rem;
            height: 5rem;
            padding: 0;
            margin: 0;
            font-size: 2.572rem;
            text-align: center;
            border-radius: 100%;
            -webkit-box-shadow: 0 6px 10px rgba(0,0,0,.15);
            box-shadow: 0 6px 10px rgba(0,0,0,.15);
        }
        .btn-raised {
            -webkit-box-shadow: 0 0 2px rgba(0,0,0,.18), 0 2px 4px rgba(0,0,0,.21);
            box-shadow: 0 0 2px rgba(0,0,0,.18), 0 2px 4px rgba(0,0,0,.21);
            -webkit-transition: -webkit-box-shadow .25s cubic-bezier(.4,0,.2,1);
            -o-transition: box-shadow .25s cubic-bezier(.4,0,.2,1);
            transition: box-shadow .25s cubic-bezier(.4,0,.2,1);
        }
    </style>
@endsection
@section('javascript')
    <script>
        function readURL(input) {

          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(input).parent().prev().children().children('.img-responsive').attr('src',e.target.result);
                console.log.apply(console,$(input).parent().prev().children().children('img'));
            }

            reader.readAsDataURL(input.files[0]);
          }
        }

        $(".inp-img").change(function() {
          readURL(this);
        });
    </script>
@endsection