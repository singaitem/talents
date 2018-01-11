@extends('user.layouts.user')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Setting
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Setting</li>
            </ol>
        </section>

            <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="box box-primary white-box">
                        <div class="body">
                            <div class="box-header with-border">
                                <h3 class="box-title">Family Members</h3>
                            </div>
                            <div class="box-body">
                                <div class="list-group">
                                    @foreach(auth()->user()->employee->person->families as $family)
                                    <div>
                                       <a href="{{route('family.detail',$family)}}" class="list-group-item">
                                            <h4 class="list-group-item-heading">{{$family->name}}</h4>
                                            <p class="list-group-item-text">
                                                {{$family->relationship}}
                                            </p>
                                        </a> 
                                    </div>
                                    @endforeach
                                    <button type="button" onclick="location.href='{{route('family.create')}}'" class="btn-raised btn btn-danger btn-floating waves-effect waves-light waves-round waves-effect waves-light">
                                        <i class="icon md-plus fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection