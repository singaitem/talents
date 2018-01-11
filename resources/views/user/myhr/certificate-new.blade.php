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
                                <h3 class="box-title">Create Certificate</h3>
                            </div>
                            <div class="box-body">
                                <form class="form-horizontal form-material">
                                	<div class="form-group">
                                        <label for="name" class="col-md-12">Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Name" class="form-control form-control-line" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no" class="col-md-12">No</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="No" class="form-control form-control-line" name="no" id="no">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="principle" class="col-md-12">Principle</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Principle" class="form-control form-control-line" name="principle" id="principle">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="year" class="col-md-12">Year</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Year" class="form-control form-control-line" name="year" id="year">
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-sm-12">Lifetime Type</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line">
                                            	<option value="" disabled selected hidden>-- Please Select Status --</option>
                                                <option value="Lifetime">Lifetime</option>
                                                <option value="Period">Period</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-md-12">Description</label>
                                        <div class="col-md-12">
                                            <textarea id="description" placeholder="Description" rows="5" name="description" class="form-control form-control-line"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-12">Attachment</label>
                                           
                                            <div class="col-sm-6">
                                                <div class="wrapper-upload">
                                                    <div class="upload-img">
                                                        <img src="/img/upload.png" class="img-responsive">
                                                    </div>
                                                </div>  
                                                <label class="btn btn-primary btn-file">
                                                    Browse <input type="file" name="image2" class="inp-img" accept="image/*">
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="wrapper-upload">
                                                    <div class="upload-img">
                                                        <img src="/img/upload.png" class="img-responsive">
                                                    </div>
                                                </div>  
                                                <label class="btn btn-primary btn-file">
                                                    Browse <input type="file" name="image3" class="inp-img" accept="image/*">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success" data-toggle="confirm" data-title="Confirmation" data-message="Are you sure?" data-type="success">Add Certificate</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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