@extends('user.layouts.user')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Claim Detail
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Approval</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> {{$claim->name}}
            <small class="pull-right">Date: {{$claim->transaction_date}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>{{$claim->employee->name}}</strong><br>
            {{$claim->employee->person->name}}<br>
            {{$claim->employee->position->name}}<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 col-sm-offset-4 invoice-col">
          <b>Invoice #007612</b><br>
          <br>
          <b>Request Type:</b> {{$claim->info}}<br>
          <b>Category:</b> {{$claim->transaction_category->name}}<br>
          <b>Request Due:</b> {{$claim->transaction_date}}
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Request</th>
              <th>Description</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            	@foreach($claim->details as $detail)
	            	<tr>
	            		<td>{{$detail->transaction_type->name}}</td>
	            		<td></td>
	            		<td>{{$detail->value}}</td>
	        		</tr>
            	@endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Attachment</p>
          <img src="/img/credit/visa.png" alt="Visa">
          <img src="/img/credit/mastercard.png" alt="Mastercard">
          <img src="/img/credit/american-express.png" alt="American Express">
          <img src="/img/credit/paypal2.png" alt="Paypal">
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$250.30</td>
              </tr>
              <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
@endsection