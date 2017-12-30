@extends('user.layouts.user')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Request
                <small>Benefit</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{'dashboard'}}"><i class="fa fa-dashboard"></i>Home</a></li>
                <li class="active">Payslip Monthly</li>
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
                                    @foreach($monthlies as $monthly)
                                        <tr>
                                            <td>{{$monthly->period}}</td>
                                            <td>{{$monthly->payment_start_date}}</td>
                                            <td>{{$monthly->period}}</td>
                                            <td><span class="label label-warning" style="line-height: 2;">{{$monthly->period}}</span>
                                            </td>
                                            <td>{{$monthly->period}}</td>
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