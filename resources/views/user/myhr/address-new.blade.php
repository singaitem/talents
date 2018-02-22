@extends('user.layouts.user')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Address
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('address')}}"><i class="fa fa-home"></i> Address</a></li>
                <li class="active">Create Address</li>
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
                                <li class="active"><a href="{{route('address')}}"><i class="fa fa-home"></i> Address</a></li>
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
                    <div class="box box-primary white-box">
                        <div class="body">
                            <div class="box-header with-border">
                                <h3 class="box-title">Create Address</h3>
                            </div>
                            <div class="box-body">
                                <form action="{{route('address.add')}}" method="post" class="form-horizontal form-material">
                                    {{csrf_field()}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-12">City</label>
                                            <div class="col-sm-12">
                                                <select name="homebase" class="form-control form-control-line">
                                                	<option value="" disabled selected hidden>-- Please Select City --</option>
                                                    @foreach($homebases as $homebase)
                                                    <option value="{{$homebase->id}}">
                                                        {{$homebase->name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="district" class="col-md-12">District</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="District" class="form-control form-control-line" name="district" id="district">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subdistrict" class="col-md-12">Sub District</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Sub District" class="form-control form-control-line" name="subdistrict" id="subdistrict">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rt" class="col-md-12">RT</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="RT" class="form-control form-control-line" name="rt" id="rt">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rw" class="col-md-12">RW</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="RW" class="form-control form-control-line" name="rw" id="rw">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address" class="col-md-12">Address</label>
                                            <div class="col-md-12">
                                                <textarea id="address" rows="5" class="form-control form-control-line" name="addressTxt"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-12">Stay Status</label>
                                            <div class="col-sm-12">
                                                <select name="stay_status" class="form-control form-control-line">		
                                                	<option value="" disabled selected hidden>-- Please Select Status --</option>
                                                    <option value="Owned">Owned</option>
                                                    <option value="Contract">Contract</option>
                                                    <option value="Live With Parents">Live With Parents</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zipcode" class="col-md-12">Zip Code</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Zip Code" class="form-control form-control-line" name="zipcode" id="zipcode">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primary" class="col-md-12">Primary Address</label>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="form-control-line" name="primary" id="primary">
                                            </div>
                                        </div>
                                    </div>        
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success" data-toggle="confirm" data-title="Confirmation" data-message="Are you sure?" data-type="success">Add Address</button>
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