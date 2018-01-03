@extends('user.layouts.user')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
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
                                <li class="active"><a href="{{route('profile')}}"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="{{route('family')}}"><i class="fa fa-users"></i> Family</a></li>
                                <li><a href="{{route('address')}}"><i class="fa fa-home"></i> Address</a></li>
                                <li><a href="{{route('certificate')}}"><i class="fa fa-certificate"></i> Certificate</a></li>
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
                    <div class="white-box">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#basic" data-toggle="tab"> Basic Information</a></li>
                                <li><a href="#detail" data-toggle="tab">Change Marital Status</a></li>
                                <li><a href="#changePassword" data-toggle="tab">Change Password</a></li>
                                <li><a href="#changeProfilePicture" data-toggle="tab">Change Profile Picture</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="basic">
                                    <form class="form-horizontal form-material">
                                        <div class="form-group">
                                            <label class="col-md-12">Full Name</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Full Name" class="form-control form-control-line" value="{{auth()->user()->employee->person->name}}"> </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" placeholder="Email" class="form-control form-control-line" name="example-email" id="example-email" value="{{auth()->user()->employee->person->email}}"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Phone No</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Phonenumber" class="form-control form-control-line" value="{{auth()->user()->employee->person->phone_number}}"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Date of Birth</label>
                                            <div class="col-md-12 date">
                                                <input type="text" class="form-control pull-right" id="datepicker" value="{{auth()->user()->employee->person->birthdateformated()}}">
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                                <div class="tab-pane" id="detail">
                                    <form class="form-horizontal form-material">
                                       
                                        
                                        <div class="form-group">
                                            <label class="col-sm-12">Marital Status</label>
                                            <div class="col-sm-12">
                                                <select class="form-control form-control-line">
                                                    <option value="single" @if(auth()->user()->employee->person->marital == 'single')selected @endif>Single</option>
                                                    <option value="married" @if(auth()->user()->employee->person->marital == 'married')selected @endif>Married</option>
                                                    <option value="divorce" @if(auth()->user()->employee->person->marital == 'divorce')selected @endif>Divorce</option>
                                                </select>
                                            </div>
                                        </div>
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
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="changePassword">
                                    <form class="form-horizontal form-material">
                                        <div class="form-group">
                                            <label class="col-md-12">Current Password</label>
                                            <div class="col-md-12">
                                                <input type="password" class="form-control form-control-line"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">New Password</label>
                                            <div class="col-md-12">
                                                <input type="password" class="form-control form-control-line"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Confirm Password</label>
                                            <div class="col-md-12">
                                                <input type="password" class="form-control form-control-line"> </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="changeProfilePicture">
                                    <form class="form-horizontal form-material">
                                        <div class="form-group">
                                            <label class="col-sm-12">Profile Picture</label>
                                            <div class="col-sm-4">
                                                <div class="wrapper-upload">
                                                    <div class="upload-img">
                                                        <img src="/img/profile_picture/{{auth()->user()->employee->person->picture}}" class="img-responsive">
                                                    </div>
                                                </div>
                                                <label class="btn btn-primary btn-file">
                                                    Browse <input type="file" name="image1" class="inp-img" accept="image/*" >
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                            <!-- tab-content -->    
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