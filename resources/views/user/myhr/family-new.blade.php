@extends('user.layouts.user')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Family
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('family')}}"><i class="fa fa-users"></i> Family</a></li>
                <li class="active">Add Family Members</li>
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
                    <div class="box box-primary white-box">
                        <div class="body">
                            <div class="box-header with-border">
                                <h3 class="box-title">Family Members</h3>
                            </div>
                            <div class="box-body">
                                <form action="{{route('family.add')}}" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="col-md-12">
                                    	<div class="form-group">
	                                        <label for="fullname" class="col-md-12">Full Name</label>
	                                        <div class="col-md-12">
	                                            <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control form-control-line" value="">
	                                        </div>
                                    	</div>
                                    </div>
                                    
                                   	<div class="col-md-6">
                                   		<div class="form-group">
	                                        <label for="placeofbirth" class="col-md-12">Place of Birth</label>
	                                        <div class="col-md-12">
	                                            <input type="text" placeholder="Place of Birth" class="form-control form-control-line" name="placeofbirth" id="placeofbirth" value="">
	                                    	</div>
                                    	</div>
                                   	</div>
                                    <div class="col-md-6">
                                    	<div class="form-group">
	                                        <label for="datepicker" class="col-md-12">Date of Birth</label>
	                                        <div class="col-md-12 date">
	                                            <input type="text" placeholder="dd/mm/yyyy" id="datepicker" name="dateofbirth" class="form-control form-control-line" value="">
	                                        </div>
                                    	</div>
                                    </div>
                                    <div class="col-md-6">
                                    	<div class="form-group">
	                                        <label for="alivestatus" class="col-md-12">Alive Status</label>
	                                        <div id="alivestatus" class="col-md-12">
	                                            <select name="alivestatus" class="form-control form-control-line">     
                                                    <option value="" disabled selected hidden>-- Please Select Alive Status --</option>
                                                    <option value="Alive">Alive</option>
                                                    <option value="Passed Away">Passed Away</option>
                                                </select>
	                                        </div>
                                    	</div>
                                    </div>
                                    <div class="col-md-6">
                                    	<div class="form-group">
	                                        <label for="gender" class="col-md-12">Gender</label>
	                                        <div id="gender" class="col-md-12">
	                                            <select name="gender" class="form-control form-control-line">     
                                                    <option value="" disabled selected hidden>-- Please Select Gender --</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
	                                        </div>
                                    	</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="relationship" class="col-md-12">Relationship</label>
                                            <div id="relationship" class="col-md-12">
                                                <select name="relationship" class="form-control form-control-line">     
                                                    <option value="" disabled selected hidden>-- Please Select Relationship --</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Monther">Monther</option>
                                                    <option value="Husband">Husband</option>
                                                    <option value="Wife">Wife</option>
                                                    <option value="Son">Son</option>
                                                    <option value="Daughther">Daughther</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marital" class="col-md-12">Marital Status</label>
                                            <div id="marital" class="col-md-12">
                                                <select name="marital" class="form-control form-control-line">
                                                    <option value="" disabled selected hidden>-- Please Select Marital --</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorce">Divorce</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="identity" class="col-md-12">Identity Card No</label>
                                            <div id="identity" class="col-md-12">
                                                <input type="text" placeholder="Identity Card No" name="identity" class="form-control pull-right" id="identity" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="familycard" class="col-md-12">Family Card No</label>
                                            <div id="familycard" class="col-md-12">
                                                <input type="text" placeholder="Family Card No" name="familycard" class="form-control pull-right" id="familycard" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address" class="col-md-12">Address</label>
                                            <div class="col-md-12">
                                                <textarea id="address" name="address" rows="5" class="form-control form-control-line" placeholder="Address"></textarea>
                                            </div>
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
                                                    Browse <input type="file" name="image1" class="inp-img" accept="image/*">
                                                </label>
                                            </div>
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
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success" data-toggle="confirm" data-title="Confirmation" data-message="Are you sure?" data-type="success">Add Family Member</button>
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