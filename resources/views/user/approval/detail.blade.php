@extends('user.layouts.user')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Claim Detail
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a @if($claim->transaction_category->module=="Benefit")href="{{route('approve.benefit')}}"@elseif($claim->transaction_category->module=="Personalia")href="{{route('approve.personal')}}"@endif>Approval</a></li>
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
          <b>Request Type:</b> {{$claim->info}}<br>
          <b>Category:</b> {{$claim->transaction_category->name}}<br>
          <b>Description:</b>{{$claim->description}}<br>
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
        <div class="col-xs-6 col-xs-offset-6 text-right">
          <label>Total:</label>
          <label>Rp. {{$claim->total_value}}</label>
        </div>
        <div class="col-xs-12">
          <p class="lead">Attachment</p>
          @foreach($claim->attachments as $photo)
            <div class="col-md-4 col-xs-12">
              <img src="/img/upload/{{$photo->name}}" style="max-width: 100%;">
            </div>
          @endforeach
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      @if($flagShow==true)
      <div class="row no-print">
        <div class="col-xs-12">
          <form action="{{route('approve.approved', [$claim->id])}}" method="post" style="display: inline;">
            {{csrf_field()}}
            <button data-toggle="confirm" data-title="Confirmation" data-message="Are you sure?" data-type="success" type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Approve
            </button>
          </form>
          <form action="{{route('approve.rejected',$claim->id)}}" method="post" style="display: inline;">
            {{csrf_field()}}
            <a id="reject" class="btn btn-danger pull-right" style="margin-right: 5px;">
              <i class="fa fa-times"></i> Reject
            </a>
            <div class="modal fade" id="myModal">
              <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Reason</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12" style="margin-bottom: 10px;">
                          <div class="col-md-12">
                              <textarea id="reason" rows="5" class="form-control form-control-line" name="reason" placeholder="Reason"></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
          </form>
        </div>
      </div>
      @endif
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
@endsection
@section('javascript')
    <script type="text/javascript">
      $('#reject').click(function() {
        $('#myModal').modal('show');
      });
    </script>
@endsection