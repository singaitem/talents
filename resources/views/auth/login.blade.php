@extends('auth.layouts.auth')

@section('body_class','login-page')

@section('content')
 
    
  <div id="clouds">
    <div class="cloud x1"></div>
    <!-- Time for multiple clouds to dance around -->
    <div class="cloud x2"></div>
    <div class="cloud x3"></div>
    <div class="cloud x4"></div>
    <div class="cloud x5"></div>
  </div>

 <div class="container">
	<div class="login-box">
  <div class="login-logo">
    <b><img src="/img/logo.png"></b>
  </div>
  <!-- /.login-logo -->
  @if (session('status'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
     {{ session('status') }}
  </div>
  @endif
  <div class="login-box-body">
    <p class="login-box-msg">Sign in</p>

    <form action="/login" method="post">
      {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        @if (!$errors->isEmpty())
          <div class="col-xs-12">
            <div class="alert alert-danger" role="alert">
                {!! $errors->first() !!}
            </div>
          </div>
        @endif
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->

        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>

        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="register" class="btn btn-block btn-social"><i class="fa fa-user-plus"></i>Create an account</a>
    </div>

  </div>
  <!-- /.login-box-body -->
</div>
</div>
@endsection