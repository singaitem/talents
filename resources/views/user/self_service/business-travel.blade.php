@extends('user.self_service.layouts.layout')
@section('content')

	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <div class="col-md-10 col-md-offset-1" style="margin-bottom: 10px;">
                <img src="/img/business-travel.svg" alt="Eyeglasses" style="max-width: 50px;">
                Business Travel
            </div>
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{route('selfservice')}}"><i class="fa ion-ios-body-outline"></i>Request</a></li>
            <li class="active">Business Travel</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
            <!-- left column -->
                
                <div class="col-md-10 col-md-offset-1">
                <!-- general form elements -->
                    <div class="box box-primary">
                        
                         <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('travel.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">

                            	<div class="col-md-6">
                            		<div class="form-group">
                            			<label for="">Origin</label>
                            			<select name="" id="" class="form-control">
                            				<option value="Jakarta">Jakarta</option>
                            			</select>
                            		</div>
                            	</div>
                            	<div class="col-md-6">
                            		<div class="form-group">
                            			<label for="">Destination</label>
                            			<select name="" id="" class="form-control">
                            				<option value="Jakarta">Jakarta</option>
                            			</select>
                            		</div>
                            	</div>

                            	<div class="col-md-6">
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
                            	<div class="col-md-6">
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
	                                <label for="name">Remark</label>
	                                <textarea name="remark" id="" cols="" class="form-control" placeholder="Remark"></textarea>
                        		</div>
                                
                                <div class="form-group">
                                	<label for="">SPD Type</label>
                        			<select name="spd_type" id="" class="form-control">
                        				<option value="" disabled hidden selected>-- Select SPD Type --</option>
                        				<option value="Regular">Regular</option>
                                        <option value="Pulang Kampung">Pulang Kampung</option>
                                        <option value="Mutasi">Mutasi</option>
                                        <option value="Training">Training</option>
                                        <option value="Assesment">Assesment</option>
                        			</select>
                                </div>
                                
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Please fill out your expense</h3>
                                    </div>
                                    <div class="box-body form-horizontal">
                                        <div class="form-group">
                                            <label for="ticket" class="col-sm-3 control-label" style="text-align: left;" >Ticket</label>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control numbers input-calc" name="ticket" id="ticket" value="{{ old('ticket') }}"  oninput="calculateTotal()">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="taxi" class="col-sm-3 control-label" style="text-align: left;" >Taxi</label>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control numbers input-calc" name="taxi" id="taxi" value="{{ old('taxi') }}"  oninput="calculateTotal()">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="transport" class="col-sm-3 control-label" style="text-align: left;" >Transport</label>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control numbers input-calc" name="transport" id="transport" value="{{ old('transport') }}"  oninput="calculateTotal()">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="hotel" class="col-sm-3 control-label" style="text-align: left;" >Hotel</label>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control numbers input-calc" name="hotel" id="hotel" value="{{ old('hotel') }}"  oninput="calculateTotal()">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="rental" class="col-sm-3 control-label" style="text-align: left;" >Rental Mobil</label>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control numbers input-calc" name="rental" id="rental" value="{{ old('rental') }}"  oninput="calculateTotal()">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mileage" class="col-sm-3 control-label" style="text-align: left;" >Mileage</label>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control numbers input-calc" name="mileage" id="mileage" value="{{ old('mileage') }}"  oninput="calculateTotal()">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <select class="form-control control-label text-right" name="uang_makan_type" id="selected_type">
                                                    <option value="umdn">Uang Makan Dalam Negri</option>
                                                    <option value="umln">Uang Makan Luar Negri</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" id="lensa" class="form-control input-calc" name="uang_makan" value="{{ old('uang_makan') }}" oninput="calculateTotal()">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <select class="form-control control-label text-right" name="uang_saku_type" id="selected_type">
                                                    <option value="usdn">Uang Saku Dalam Negri</option>
                                                    <option value="usln">Uang Saku Luar Negri</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" id="lensa" class="form-control input-calc" name="uang_saku" value="{{ old('uang_saku') }}" oninput="calculateTotal()">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="laundry" class="col-sm-3 control-label" style="text-align: left;" >Laundry</label>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control numbers input-calc" name="laundry" id="laundry" value="{{ old('laundry') }}"  oninput="calculateTotal()">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tpb" class="col-sm-3 control-label" style="text-align: left;" >Tol Parkir Bensin</label>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control numbers input-calc" name="tpb" id="tpb" value="{{ old('tpb') }}"  oninput="calculateTotal()">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="other" class="col-sm-3 control-label" style="text-align: left;" >Other</label>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control numbers input-calc" name="other" id="other" value="{{ old('other') }}"  oninput="calculateTotal()">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                
                                
                                <div class="form-group">
                                    <label class="col-sm-2">Total</label>
                                    <label class="col-sm-4 col-sm-offset-6 text-right">Rp. <span id="countTotal" class="numbers">--</span></label>
                                    <div class="col-sm-12 box box-success"></div>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <div class="wrapper-upload">
                                            <div class="upload-img">
                                                <img src="/img/upload.png" class="img-responsive">
                                            </div>
                                        </div>
                                        <label class="btn btn-primary btn-file">
                                            Browse <input type="file" name="image1" class="inp-img" accept="image/*" >
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="wrapper-upload">
                                            <div class="upload-img">
                                                <img src="/img/upload.png" class="img-responsive">
                                            </div>
                                        </div>  
                                        <label class="btn btn-primary btn-file">
                                            Browse <input type="file" name="image2" class="inp-img" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="wrapper-upload">
                                            <div class="upload-img">
                                                <img src="/img/upload.png" class="img-responsive">
                                            </div>
                                        </div>  
                                        <label class="btn btn-primary btn-file">
                                            Browse <input type="file" name="image3" class="inp-img" accept="image/*">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-right" id="appendModal">
                                <a id="confirm" class="btn btn-primary">Submit</a>
                            </div>
                            @extends('user.self_service.confirmation')
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            <!--/.col (left) -->
            </div>
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
    </style>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(":input").on('keypress', function (e) {
            if (e.keyCode == 13) {
                $("#confirm").click();
                e.preventDefault();
                return false;
            }
        });
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
            $('.input-calc').each(function(){
                if($(this).val()!=null){
                    total+=isNaN(parseInt($(this).val()))?0:parseInt($(this).val());
                }
            });
            $('#countTotal').text(total);
            $(".numbers").digits();
        }
        
        $('#confirm').click(function() {
            var total = $('#countTotal').text();
            $('#totalClaim').html(total);
            $('#totalValue').html(total);
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
