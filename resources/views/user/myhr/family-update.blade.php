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
                <li class="active">Detail Family</li>
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
                                <form action="{{route('family.update',$family->id)}}" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="col-md-12">
                                    	<div class="form-group">
	                                        <label for="fullname" class="col-md-12">Full Name</label>
	                                        <div class="col-md-12">
	                                            <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control form-control-line" value="{{$family->name}}">
	                                        </div>
                                    	</div>
                                    </div>
                                    
                                   	<div class="col-md-6">
                                   		<div class="form-group">
	                                        <label for="placeofbirth" class="col-md-12">Place of Birth</label>
	                                        <div class="col-md-12">
	                                            <input type="text" placeholder="Place of Birth" class="form-control form-control-line" name="placeofbirth" id="placeofbirth" value="{{$family->placeofbirth}}">
	                                    	</div>
                                    	</div>
                                   	</div>
                                    <div class="col-md-6">
                                    	<div class="form-group">
	                                        <label for="datepicker" class="col-md-12">Date of Birth</label>
	                                        <div class="col-md-12 date">
	                                            <input type="text" id="datepicker" name="dateofbirth" class="form-control form-control-line" value="{{$family->birthdateformated()}}">
	                                        </div>
                                    	</div>
                                    </div>
                                    <div class="col-md-6">
                                    	<div class="form-group">
	                                        <label for="alivestatus" class="col-md-12">Alive Status</label>
	                                        <div id="alivestatus" class="col-md-12">
	                                            <select name="alivestatus" class="form-control form-control-line">
                                                    <option value="Alive" @if($family->alive_status=="Alive")selected @endif>Alive</option>
                                                    <option value="Passed Away" @if($family->alive_status=="Passed Away")selected @endif>Passed Away</option>
                                                </select>
	                                        </div>
                                    	</div>
                                    </div>
                                    <div class="col-md-6">
                                    	<div class="form-group">
	                                        <label for="gender" class="col-md-12">Gender</label>
	                                        <div id="gender" class="col-md-12">
                                                <select name="gender" class="form-control form-control-line">     
                                                    <option value="Male" @if($family->gender=="Male")selected @endif>Male</option>
                                                    <option value="Female" @if($family->gender=="Female")selected @endif>Female</option>
                                                </select>
	                                        </div>
                                    	</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="relationship" class="col-md-12">Relationship</label>
                                            <div id="relationship" class="col-md-12">
                                                <select name="relationship" class="form-control form-control-line">    
                                                    <option value="Father" @if($family->relationship=="Father")selected @endif>Father</option>
                                                    <option value="Monther" @if($family->relationship=="Monther")selected @endif>Monther</option>
                                                    <option value="Husband" @if($family->relationship=="Husband")selected @endif>Husband</option>
                                                    <option value="Wife" @if($family->relationship=="Wife")selected @endif>Wife</option>
                                                    <option value="Son" @if($family->relationship=="Son")selected @endif>Son</option>
                                                    <option value="Daughther" @if($family->relationship=="Daughther")selected @endif>Daughther</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marital" class="col-md-12">Marital Status</label>
                                            <div id="marital" class="col-md-12">
                                                <select name="marital" class="form-control form-control-line">
                                                    <option value="Single" @if($family->marital_status=="Single")selected @endif>Single</option>
                                                    <option value="Married" @if($family->marital_status=="Married")selected @endif>Married</option>
                                                    <option value="Divorce" @if($family->marital_status=="Divorce")selected @endif>Divorce</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="identity" class="col-md-12">Identity Card No</label>
                                            <div id="identity" class="col-md-12">
                                                <input type="text" class="form-control pull-right" name="identity" id="identity" value="{{$family->identity_no}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="familycard" class="col-md-12">Family Card No</label>
                                            <div id="familycard" class="col-md-12">
                                                <input name="familycard" type="text" class="form-control pull-right" id="familycard" value="{{$family->family_card_no}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address" class="col-md-12">Address</label>
                                            <div class="col-md-12">
                                                <textarea name="address" id="address" rows="5" class="form-control form-control-line">{{$family->address}}</textarea>
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
                                                <button class="btn btn-success" data-toggle="confirm" data-title="Confirmation" data-message="Are you sure?" data-type="success">Update Family Profile</button>
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