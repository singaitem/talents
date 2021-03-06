@extends('user.layouts.user')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                List of Approver
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="{{route('setting')}}"><i class="fa fa-wrench"></i>Setting</a></li>
                <li class="active">Eyeglasses</li>
            </ol>
        </section>

            <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List of Request</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Type</th>
                                        <th>Approver</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $countApprover=1;?>
                                    @foreach($setting->details as $detail)
                                        <tr>
                                            <td>{{$countApprover}}</td>
                                            <td>@if($detail->type==1)Supervisor
                                                @elseif($detail->type==2)Position
                                                @elseif($detail->type==3)Employee No
                                                @endif
                                            </td>
                                            <td>
                                                @if($detail->type==2){{$detail->position->name}}@elseif($detail->type==3){{$detail->employee->name}}@endif
                                            </td>
                                              <td>
                                                <form role="form" style="margin-bottom: 0px;" action="{{route('setting.delete',$detail->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <a href="{{route('setting.update.approver',$detail->id)}}" class="btn btn-default btn-sm" role="button">Change</a>
                                                    <button class="btn btn-danger btn-sm" type="submit" data-toggle="confirm" data-title="Confirmation" data-message="Are you sure?" data-type="success">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $countApprover++; ?>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" style="text-align: right;"><a class="btn btn-success" href="{{route('setting.approver',$setting->id)}}">Add</a></th>
                                    </tr>
                                </tfoot>
                                
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