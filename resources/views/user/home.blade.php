@extends('user.layouts.user')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            </ol>
        </section>

            <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>150</h3>
                            <p>All Request</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-compose"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>53</h3>
                            <p>Benefit Request</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>44</h3>
                            <p>Personalia Request</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Pending Request</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-social-buffer"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-md-8">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Request</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>Request ID</th>
                                            <th>Module</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                            <td>Benefit</td>
                                            <td>Kacamata</td>
                                            <td><span class="label label-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                            <td>Personalia</td>
                                            <td>Change Marital Status</td>
                                            <td><span class="label label-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                            <td>Benefit</td>
                                            <td>Medical</td>
                                            <td><span class="label label-danger">Rejected</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                            <td>Benefit</td>
                                            <td>Medical Overlimit</td>
                                            <td><span class="label label-info">Waiting for Approval</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                            <td>Personalia</td>
                                            <td>Add Family</td>
                                            <td><span class="label label-info">Waiting for Approval</span>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Request</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-4">
                    <!-- PRODUCT LIST -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Recent Payslip</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                @foreach(auth()->user()->employee->monthlysalaries as $monthly)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="/img/payslip.svg" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">
                                            {{$monthly->period}}
                                        </a>
                                        <span class="product-description">
                                            {{$monthly->paymentDateforHuman()}}
                                        </span>
                                    </div>
                                </li>
                                @endforeach
                                
                            </ul>
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