@extends('user.self_service.layouts.layout')
@section('content')

	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <div class="col-md-10 col-md-offset-1" style="margin-bottom: 10px;">
                <img src="/img/spdadvance.svg" alt="Eyeglasses" style="max-width: 50px;">
                SPD Advance
            </div>
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="{{route('selfservice')}}"><i class="fa ion-ios-body-outline"></i>Request</a></li>
            <li class="active">SPD Advance</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
            <!-- left column -->
                
                <div class="col-md-10 col-md-offset-1">
                <!-- general form elements -->
                    <div class="box box-white">
                    <!-- /.box-header -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#plan" data-toggle="tab"> Planning</a></li>
                                <li><a href="#realisation" data-toggle="tab"> Realisation</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="plan">
                                    <!-- form start -->
                                    <form role="form" action="{{route('kacamata.store')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="box-body">
                                    		<div class="form-group">
                                    			<label for="">Origin</label>
                                    			<select name="" id="" class="form-control">
                                    				<option value="Jakarta">Jakarta</option>
                                    			</select>
                                    		</div>
                                    		<div class="form-group">
                                    			<label for="">Destination</label>
                                    			<select name="" id="" class="form-control">
                                    				<option value="Jakarta">Jakarta</option>
                                    			</select>
                                    		</div>

                                        	<div class="col-md-6" style="padding-left: 0px;">
                                        		<div class="form-group">
            	                                    <label for="transactionDate">Start Date</label>
            	                                    <div class="input-group date">
            	                                        <div class="input-group-addon">
            	                                            <i class="fa fa-calendar"></i>
            	                                        </div>
            	                                        <input type="text" class="form-control pull-right datepicker" id="transactionDate" placeholder="dd/mm/yyyy" name="transaction_date" value="{{ old('transaction_date') }}">
            	                                    </div>
                                            	</div>
                                        	</div> 
                                        	<div class="col-md-6" style="padding-right: 0px;">
                                        		<div class="form-group">
            	                                    <label for="transactionDate">End Date</label>
            	                                    <div class="input-group date">
            	                                        <div class="input-group-addon">
            	                                            <i class="fa fa-calendar"></i>
            	                                        </div>
            	                                        <input type="text" class="form-control pull-right datepicker" id="transactionDate" placeholder="dd/mm/yyyy" name="transaction_date" value="{{ old('transaction_date') }}">
            	                                    </div>
                                            	</div>
                                        	</div>
                                            <div class="form-group">
                                                <label for="">SPD Type</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="" disabled hidden selected>-- Select SPD Type --</option>
                                                    <option value="regular">Regular</option>
                                                    <option value="pulang">Pulang Kampung</option>
                                                    <option value="mutasi">Mutasi</option>
                                                    <option value="training">Training</option>
                                                    <option value="assesment">Assesment</option>
                                                </select>
                                            </div>
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Please fill out your expense</h3>
                                                </div>
                                                <div class="box-body form-horizontal">
                                                    <div class="form-group">
                                                        <label for="ticket" class="col-sm-3 control-label" style="text-align: left;" >Amount</label>

                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp</span>
                                                                <input type="number" class="form-control numbers" name="ticket" id="ticket" value="{{ old('ticket') }}"  oninput="calculateTotal()">
                                                                <span class="input-group-addon">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    		<div class="form-group">
            	                                <label for="name">Remark</label>
            	                                <textarea name="" id="" cols="" class="form-control" placeholder="Remark"></textarea>
                                    		</div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer text-right" id="appendModal">
                                            <a id="confirm" class="btn btn-primary">Submit</a>
                                        </div>
                                        @extends('user.self_service.confirmation')
                                    </form>
                                </div>
                                <div class="tab-pane" id="realisation">
                                    <div class="list-group">
                                        @foreach($claimSPD as $claim)
                                            <div>
                                               <a href="{{ route('realisation', [$claim->id])}}" class="list-group-item">
                                                    <h4 class="list-group-item-heading">{{$claim->name}}</h4>
                                                    <p class="list-group-item-text">
                                                        {{$claim->employee->name}}-{{$claim->transaction_date}}
                                                    </p>
                                                </a> 
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div> 
            </div>
            <!--/.col (left) -->
        </section>
        
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="/assets/user/self_service/css/datepicker.css">
    <style type="text/css">
        .wrapper-upload{
            display: table;
            width: 100%;
        }
        .upload-img{
            display:table-cell;
            height: 275px;
            text-align: center;
            vertical-align: middle;
            width: 100%;
        }
        .wrapper-upload .upload-img img{
            display: inline;
        }
        .btn-file{
            display: block;
        }
        .inp-img{
            display: none;
        }
        .list-group div{
            position: relative;
        }
        .list-group .btn-floating {
            position: absolute;
            bottom: 15px;
            right: 20px;
            -webkit-transform: translate(0,-50%);
            -ms-transform: translate(0,-50%);
            -o-transform: translate(0,-50%);
            transform: translate(0,-50%);
        }
    </style>
@endsection
@section('javascript')
    <script type="text/javascript">
        $("#myModal").insertAfter($("#appendModal"));
        function isLower(a,b){
            if(a<b){
                return a
            }else{
                return b
            }
        }
        function calculateTotal(){
            var total = 0;
            if($('#dokter').val()!=null){
                total=isNaN(parseInt($('#dokter').val()))?0:parseInt($('#dokter').val());
            }
            if($('#apotik').val()!=null){
                total+=isNaN(parseInt($('#apotik').val()))?0:parseInt($('#apotik').val());
            }
            $('#countTotal').text(total);
        }
        
        $('#confirm').click(function() {
            var total = $('#countTotal').text();
            $('#totalClaim').html('Rp. '+total);
            var value = 0;
            var frameValue = {{$balance->findDetail('Frame')->value}};
            var frameCurrValue = isNaN(parseInt($('#frame').val()))?0:parseInt($('#frame').val());
            value+= isLower(frameValue,frameCurrValue);
            
            var lensatype =  $('#selected_type').find(":selected").text();
            var lensaValue = 0;
            @foreach($balance->details as $detail)
                if('{{$detail->transaction_type->name}}' == lensatype){
                    lensaValue={{$detail->value}};
                }
            @endforeach
            var lensaCurrValue = isNaN(parseInt($('#lensa').val()))?0:parseInt($('#lensa').val());
            value+= isLower(lensaValue,lensaCurrValue);
            $('#totalValue').html('Rp. '+value);
            $('#myModal').modal('show');
        });
        function readURL(input) {

          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(input).parent().prev().children().children('.img-responsive').attr('src',e.target.result);
                console.log.apply(console,$(input).parent().prev().children().children('img'));
            }

            reader.readAsDataURL(input.files[0]);
          }
        }

        $(".inp-img").change(function() {
          readURL(this);
        });
    </script>
    <script src="/assets/user/self_service/js/datepicker.js"></script>
@endsection
