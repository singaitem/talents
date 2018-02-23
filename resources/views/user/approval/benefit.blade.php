@extends('user.layouts.user')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Approve
                <small>Benefit</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active"><a href="#">Approval</a></li>
            </ol>
        </section>

            <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List of Approve</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No Transaction</th>
                                        <th>Employee No</th>
                                        <th>Transaction Type</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($claims as $claim)
                                        <tr>
                                            <td><a href="{{ route('approve.detail', [$claim->id])}}">{{$claim->name}}</a></td>
                                            <td>{{$claim->employee->name}}</td>
                                            <td>{{$claim->transaction_category->name}}</td>
                                            <td>{{$claim->transaction_date}}</td>
                                            <td>{{$claim->total_value}}</td>
                                            <td>
                                                <span @if($claim->status=="Approved")class="label label-success"@elseif($claim->status=="Rejected")class="label label-danger" @else class="label label-warning" @endif style="line-height: 2;">{{$claim->status}}</span>
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