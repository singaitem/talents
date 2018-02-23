@extends('user.layouts.user')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Certificate
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('certificate')}}"><i class="fa fa-certificate"></i> Certificate</a></li>
                <li class="active">Create Certificate</li>
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
                                <li><a href="{{route('family')}}"><i class="fa fa-users"></i> Family</a></li>
                                <li><a href="{{route('address')}}"><i class="fa fa-home"></i> Address</a></li>
                                <li class="active"><a href="{{route('certificate')}}"><i class="fa fa-certificate"></i> Certificate</a></li>
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
                                <h3 class="box-title">Detail Certificate</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-horizontal form-material">
                                	<div class="form-group">
                                        <label for="name" class="col-md-12">Name</label>
                                        <div class="col-md-12">
                                        	<div class="box-hover-info">
                                        		{{$certificate->name}}
                                        	</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no" class="col-md-12">No</label>
                                        <div class="col-md-12">
                                        	<div class="box-hover-info">
                                        		{{$certificate->no}}
                                        	</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-md-12">Principle</label>
                                        <div class="col-md-12">
                                        	<div class="box-hover-info">
                                        		{{$certificate->principle}}
                                        	</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="year" class="col-md-12">Year</label>
                                        <div class="col-md-12">
                                        	<div class="box-hover-info">
                                        		{{$certificate->year}}
                                        	</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="year" class="col-md-12">Lifetime Type</label>
                                        <div class="col-md-12">
                                        	<div class="box-hover-info">
                                        		{{$certificate->type}}
                                        	</div>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label for="description" class="col-md-12">Description</label>
                                        <div class="col-md-12">
                                        	<div class="box-hover-info">
                                        		{{$certificate->description}}
                                        	</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-md-12">Attachment</label>
                                        @foreach($certificate->attachment->details as $attachment)
                                        <div class="col-md-6">
                                        	<div class="box-hover-info">
                                        		<img src="/img/upload/{{$attachment->name}}" style="max-width: 100%;">
                                        	</div>
                                        </div>
                                        @endforeach
                                    </div>
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
    <link rel="stylesheet" href="/assets/user/myhr/css/myhr.css">
@endsection
@section('javascript')
    <script src="/assets/user/myhr/js/myhr.js"></script>
@endsection