@extends('user.layouts.user')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header hide-print">
            <h1 style="display: inline-block;width: 20%;">
                Payslip
                <small>Monthly</small>
            </h1>
            <div style="text-align: center;display: inline-block;width: 50%;"><button onclick="printpayslip()" class="btn btn-default">Print</button></div>
            <ol class="breadcrumb">
                <li><a href="{{'dashboard'}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>display: inline-block;
                <li><a href="{{'payslip.monthly'}}"><i class="fa fa-file-text-o"></i>Payslip Monthly</a></li>
                <li class="active">Payslip Detail</li>
            </ol>
        </section>

            <!-- Main content -->
        <section class="content">
            <div class="row">
            	<div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{$monthly->period}}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive" id="printsec">
			                <div class="col-md-3 col-md-offset-9 col-xs-5 col-xs-offset-7 full-border text-center text-red text-bold margin-bottom-30 font-size">
			                    PRIBADI & RAHASIA
			                </div>
			                <div class="col-md-6 col-xs-12 text-bold margin-bottom-30 font-large">
			                    SLIP GAJI KARYAWAN (MTD)
			                </div>
			                <div class="col-md-12 col-xs-12 all-border no-padding margin-bottom-30">
			                    <div class="col-md-4 col-xs-4 bg-silver text-bold border-right border-bottom">
			                        Employee Number
			                    </div>
			                    <div class="col-md-8 col-xs-8 border-bottom">
			                        {{auth()->user()->employee->name}}
			                    </div>
			                    <div class="col-md-4 col-xs-4 bg-silver text-bold border-right border-bottom">
			                        Full Name
			                    </div>
			                    <div class="col-md-8 col-xs-8 border-bottom">
			                        {{auth()->user()->employee->person->name}}
			                    </div>
			                    <div class="col-md-4 col-xs-4 bg-silver text-bold border-right border-bottom">
			                        Position
			                    </div>
			                    <div class="col-md-8 col-xs-8 border-bottom">
			                        {{auth()->user()->employee->position->name}}
			                    </div>
			                    <div class="col-md-4 col-xs-4 bg-silver text-bold border-right ">
			                        Tax Status
			                    </div>
			                    <div class="col-md-8 col-xs-8">
			                        {{auth()->user()->employee->tax_status}}
			                    </div>
			                </div>
			                <div class="col-md-2 col-xs-2 col-md-offset-8 col-xs-offset-7 bg-silver text-bold font-size-subheader">
			                    Periode
			                </div>
			                <div class="col-md-2 col-xs-3 font-size-subheader margin-bottom-30">
			                    {{$monthly->period}}
			                </div>
			                <div class="col-md-12 col-xs-12 text-bold bg-silver font-size">
			                    PERINCIAN DETAIL
			                </div>
			                <div class="col-md-6 col-xs-6 text-bold font-size-subheader">
			                    PENERIMAAN
			                </div>
			                <div class="col-md-6 col-xs-6 text-bold font-size-subheader">
			                    POTONGAN
			                </div>
			                <div class="col-md-6 col-xs-6">
			                    @foreach($monthly->detailElementType('Allowance') as $mtdd)
			                        <div class="col-md-8 col-xs-7 bg-silver font-size-subheader margin-bottom-5" style="padding-left: 0px;">{{$mtdd->element->name}}</div>
			                        <div class="col-md-4 col-xs-5 bg-value font-size-subheader margin-bottom-5" style="padding-left: 0px;">
			                            <span>Rp. </span><span class="text-right numbers pull-right">{{$mtdd->value}}</span>
			                        </div>
			                    @endforeach
			                </div>
			                <div class="col-md-6 col-xs-6 margin-bottom-30">
			                    @foreach($monthly->detailElementType('Deduction') as $mtdd)
			                        <div class="col-md-8 col-xs-7 bg-silver font-size-subheader margin-bottom-5" style="padding-left: 0px;">{{$mtdd->element->name}}</div>
			                        <div class="col-md-4 col-xs-5 bg-value font-size-subheader margin-bottom-5" style="padding-left: 0px;">
			                            <span>Rp. </span><span class="text-right numbers pull-right">{{$mtdd->value}}</span>
			                        </div>
			                    @endforeach
			                </div>
			                <div class="col-md-12 col-xs-12 text-bold font-size-subheader bg-silver margin-bottom-5" style="padding-right: 0px;">
			                    <div class="col-md-8 col-xs-8">Total Penerimaan</div>
			                    <div class="col-md-4 col-xs-4 bg-value">
			                        <span>Rp. </span>
			                        <span class="text-right numbers pull-right" style="margin-right: 15px;">{{$monthly->total_allowance}}</span>
			                    </div>
			                </div>
			                <div class="col-md-12 col-xs-12 text-bold font-size-subheader bg-silver margin-bottom-5" style="padding-right: 0px;">
			                    <div class="col-md-8 col-xs-8">Total Potongan</div>
			                    <div class="col-md-4 col-xs-4 bg-value">
			                        <span>Rp. </span>
			                        <span class="text-right numbers pull-right" style="margin-right: 15px;">{{$monthly->total_deduction}}</span>
			                    </div>
			                </div>
			                <div class="col-md-12 col-xs-12 text-bold font-size-subheader bg-silver margin-bottom-30" style="padding-right: 0px;">
			                    <div class="col-md-8 col-xs-8">Penerimaan</div>
			                    <div class="col-md-4 col-xs-4 bg-value">
			                        <span>Rp. </span>
			                        <span class="text-right numbers pull-right" style="margin-right: 15px;">{{$monthly->take_home_pay}}</span>
			                    </div>
			                </div>
			                <div class="col-md-12 col-xs-12 text-bold bg-silver font-size margin-bottom-5">
			                    PENGHASILAN BULAN INI DI TRANSFER KE :
			                </div>
			                <div class="col-md-12 col-xs-12 all-border no-padding margin-bottom-30 border-1">
			                    <div class="col-md-4 col-xs-4 bg-silver text-bold border-right border-bottom border-1">
			                        Bank / Branch
			                    </div>
			                    <div class="col-md-8 col-xs-8 border-bottom border-1">
			                        {{$monthly->bank_name}}
			                    </div>
			                    <div class="col-md-4 col-xs-4 bg-silver text-bold border-right border-bottom border-1">
			                        BANK ACCOUNT
			                    </div>
			                    <div class="col-md-8 col-xs-8 border-bottom border-1">
			                        {{$monthly->bank_account}}
			                    </div>
			                    <div class="col-md-4 col-xs-4 bg-silver text-bold border-right border-bottom border-1">
			                        NAME
			                    </div>
			                    <div class="col-md-8 col-xs-8 border-bottom border-1">
			                        {{$monthly->bank_employee_name}}
			                    </div>
			                    <div class="col-md-4 col-xs-4 bg-silver text-bold border-right border-1 ">
			                        NOMINAL
			                    </div>
			                    <div class="col-md-8 col-xs-8 numbers">
			                        {{$monthly->take_home_pay}}
			                    </div>
			                </div>
			                <div class="col-md-12 col-xs-12 text-bold bg-silver font-size margin-bottom-5">
			                    DISCLAIMER
			                </div>
			                <div class="col-md-12 col-xs-12">
			                    <p>
			                        Slip gaji ini dicetak oleh sistem dan tidak memerlukan tanda tangan. Data penggajian bersifat pribadi dan rahasia.
			                        Masing-masing pegawai agar menjaga kerahasiaan data penggajian.
			                    </p>
			                </div>
                		</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('css')
    <style>
        .border-1{
            border-width: 1px!important;
        }
        .all-border{
            border: 2px solid black;
        }
        .full-border{
            border: 3px solid black;
        }
        .border-right{
            border-right: 2px solid black;
        }
        .text-bold{
            font-weight: bold;
        }
        .font-large{
            font-size: 30px;
        }
        .margin-bottom-30{
            margin-bottom: 30px;
        }
        .bg-silver{
            background-color: silver;   
        }
        .no-padding{
            padding: 0px;
        }
        .font-size{
            font-size: 1.3em;
        }
        .font-size-subheader{
            font-size: 1.1em;
        }
        .border-bottom{
            border-bottom: 2px solid black;
        }
        .margin-bottom-5{
            margin-bottom: 5px;
        }
        .bg-value{
            background-color: #CCCCB3;
        }
    </style>
@endsection
@section('javascript')
    <script src="/assets/user/js/user.js"></script>
    <script>
    	function printpayslip(){
    		$('body .wrapper').hide();
    		$("#printsec").insertAfter($("body .wrapper"));
    		window.print();
    		$("#printsec").insertAfter($(".box-header"));
    		$('body .wrapper').show();
    	}
    	
    </script>
@endsection