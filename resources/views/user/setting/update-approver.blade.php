@extends('user.layouts.user')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Approver
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="{{route('setting')}}"><i class="fa fa-wrench"></i>Setting</a></li>
                <li class="active">Update Approver</li>
            </ol>
        </section>

            <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Approver</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <form action="">
                                <div class="col-md-12" style="margin-bottom: 20px;margin-top: 10px;">
                                    <div class="col-md-2">
                                        <input type="radio" value="1" name="type" id="spv">
                                        <label for="spv">Supervisor</label>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 10px;">
                                    <div class="col-md-2">
                                        <input type="radio" value="2" name="type" id="pos">
                                        <label for="pos">Position</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="position" id="" class="form-control">
                                            @foreach($positions as $position)
                                            <option value="{{$position->id}}">{{$position->name}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-md-12" style="margin-bottom: 10px;">
                                    <div class="col-md-2">
                                        <input type="radio" value="3" name="type" id="emp">
                                        <label for="emp">Employee No</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="EmpNo">
                                    </div>
                                </div>
                                <div class="col-md-12 text-center" style="margin-bottom: 20px;margin-top: 20px;">
                                    <button class="btn btn-toolbar">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection