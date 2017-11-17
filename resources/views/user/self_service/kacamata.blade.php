@extends('user.layouts.user')
@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <div class="col-md-10 col-md-offset-1" style="margin-bottom: 10px;">
                <img src="/img/glasses.svg" alt="Eyeglasses" style="max-width: 50px;">
                Eyeglasses
            </div>
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="{{route('selfservice')}}"><i class="fa ion-ios-body-outline"></i>Request</a></li>
            <li class="active">Eyeglasses</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content" id="kacamata">
            <div class="row">
            <!-- left column -->
                
                <div class="col-md-10 col-md-offset-1">
                <!-- general form elements -->
                    <div class="box box-primary">
                        
                         <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('kacamata.confirmation')}}" method="post">
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
                                    <label for="store">Optical Store</label>
                                    <input type="text" class="form-control" id="store" placeholder="Optical Store" name="optical_store" value="{{ old('optical_store') }}">
                                </div>
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Please fill out your expense</h3>
                                    </div>
                                    <div class="box-body form-horizontal">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left;" >Frame</label>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control numbers" name="frame" value="{{ old('frame') }}">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <select class="form-control control-label text-right" name="selected_type">
                                                    @foreach($transaction_categories->types as $type)
                                                        @if($type->name!='Frame')
                                                            <option value="{{$type->name}}">{{$type->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="number" class="form-control" name="lensa" value="{{ old('lensa') }}" @v-model="item.price">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                
                                <div class="form-group">
                                    <label class="col-sm-2">Total</label>
                                    <label class="col-sm-4 col-sm-offset-6 text-right">Rp.@{{totalPrice}}</label>
                                    <div class="col-sm-12 box box-success"></div>
                                    
                                </div>
                                
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            <!--/.col (left) -->
            </div>
        </section>
        @if ($status=='success')
            @extends('user.self_service.confirmation')
        @endif
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="/assets/user/self_service/css/datepicker.css">
@endsection
@section('javascript')
    @if ($status!=null && $status=='success')
        <script>
            $(function() {
                $('#myModal').modal('show');
            });
        </script>
    @endif
    <script src="/js/app.js"></script>
    <script type="text/javascript">
        

    </script>
    <script src="/assets/user/self_service/js/datepicker.js"></script>
@endsection
