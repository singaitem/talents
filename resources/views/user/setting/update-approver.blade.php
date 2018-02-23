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
                            <form role="form" action="{{route('setting.approver.change',$settingdetail->id)}}" method="post">
                                {{csrf_field()}}
                                <div class="col-md-12" style="margin-bottom: 20px;margin-top: 10px;">
                                    <div class="col-md-2">
                                        <input type="radio" value="1" name="type" id="spv" @if($settingdetail->type==1) checked @endif>
                                        <label for="spv">Supervisor</label>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 10px;">
                                    <div class="col-md-2">
                                        <input type="radio" value="2" name="type" id="pos"  @if($settingdetail->type==2) checked @endif>
                                        <label for="pos">Position</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="position" id="" class="form-control">
                                            @foreach($positions as $position)
                                            <option value="{{$position->id}}" @if($position->id==$settingdetail->position_id) selected @endif>{{$position->name}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-md-12" style="margin-bottom: 10px;">
                                    <div class="col-md-2">
                                        <input type="radio" value="3" name="type" id="emp"  @if($settingdetail->type==3) checked @endif>
                                        <label for="emp">Employee No</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="empno" class="form-control" id="inputEmail3" placeholder="EmpNo" @if($settingdetail->type==3) value="{{$settingdetail->employee->name}}" @endif>
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