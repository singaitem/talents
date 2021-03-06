@extends('user.layouts.user')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Payslip
                <small>Yearly</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{'dashboard'}}"><i class="fa fa-dashboard"></i>Home</a></li>
                <li class="active">Payslip Yearly</li>
            </ol>
        </section>

            <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List of Payslip Yearly</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Period</th>
                                        <th>Effective Month</th>
                                        <th>Current Month</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(auth()->user()->employee->yearlysalaries as $yearly)
                                        <tr>
                                            <td>{{$yearly->period}}</td>
                                            <td>{{$yearly->effective_month}}</td>
                                            <td>{{$yearly->current_month}}</td>
                                            <td><a href='{{route('payslip.yearly.detail',$yearly->id)}}' class="button btn btn-default">View</a>
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