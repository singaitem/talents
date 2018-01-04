@extends('user.self_service.layouts.layout')
@section('content')

	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <div class="col-md-10 col-md-offset-1" style="margin-bottom: 10px;">
                <img src="/img/medical.svg" alt="Eyeglasses" style="max-width: 50px;">
                Medical
            </div>
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="{{route('selfservice')}}"><i class="fa ion-ios-body-outline"></i>Request</a></li>
            <li class="active">Medical Overlimit</li>
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
                        <form role="form" action="{{route('kacamata.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="transactionDate">Transaction Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" id="transactionDate" placeholder="dd/mm/yyyy" name="transaction_date" value="{{ old('transaction_date') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Hospital Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Hospital Name" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Please fill out your expense</h3>
                                    </div>
                                    <div class="box-body form-horizontal">
                                        <div class="form-group">
                                            <label for="dokter" class="col-sm-3 control-label" style="text-align: left;" >Dokter</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control numbers" name="dokter" id="dokter" value="{{ old('dokter') }}"  oninput="calculateTotal()">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="apotik" class="col-sm-3 control-label" style="text-align: left;" >Apotik</label>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control numbers" name="apotik" id="apotik" value="{{ old('apotik') }}"  oninput="calculateTotal()">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                
                                
                                <div class="form-group">
                                    <label class="col-sm-2">Total</label>
                                    <label class="col-sm-4 col-sm-offset-6 text-right" id="countTotal">Rp.--</label>
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
