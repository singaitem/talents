@extends('user.layouts.user')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Request
                <small>Personal</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Personal Request</li>
            </ol>
        </section>

            <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List of Request</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No Transaction</th>
                                        <th>Transaction Type</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Reason</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($claims as $claim)
                                        <tr>
                                            <td><a href="{{ route('request.detail', [$claim->id])}}">{{$claim->name}}</a></td>
                                            <td>{{$claim->transaction_category->name}}</td>
                                            <td>{{$claim->transaction_date}}</td>
                                            <td><span class="label label-warning" style="line-height: 2;">{{$claim->request->status}}</span>
                                            </td>
                                            <td>{{$claim->reason}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
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