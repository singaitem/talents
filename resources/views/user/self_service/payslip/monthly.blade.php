@extends('user.layouts.user')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Payslip
                <small>Monthly</small>
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
                                        <th>Period</th>
                                        <th>Date</th>
                                        <th>Paid Via</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(auth()->user()->employee->monthlysalaries as $monthly)
                                        <tr>
                                            <td>{{$monthly->period}}</td>
                                            <td>{{$monthly->paymentDateforHuman()}}</td>
                                            <td>{{$monthly->payment_method}}</td>
                                            <td><a href='{{route('payslip.monthly.detail',$monthly->id)}}' class="button btn btn-default">View</a>
                                            </td>
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