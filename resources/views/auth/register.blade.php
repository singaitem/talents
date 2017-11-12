@extends('auth.layouts.auth')

@section('body_class','register-page')

@section('content')
<div class="register-box">
	<div class="register-logo">
		<b>Talents</b>
	</div>

	<div class="register-box-body">
		<p class="login-box-msg">Sign Up</p>

		<form action="/register" method="post">
			{{csrf_field()}}
	  		<div class="form-group has-feedback">
				<input type="text" class="form-control" placeholder="Employee Number" name="employee_number">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="email" class="form-control" placeholder="Email" name="email">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" class="form-control" placeholder="Company Code" name="company_code">
				<span class="fa fa-building form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Password" name="password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
				<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
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
						  <input type="checkbox" name="agree"> I agree to the terms
					  </label>
			  		</div>
		  		</div>
			  	<div class="col-xs-4">
				  	<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
			  	</div>
			</div>
		</form>

		<div class="social-auth-links text-center">
	  		<p>- OR -</p>
	  		<a href="login" class="btn btn-block btn-social"><i class="fa fa-user"></i>I already have an account</a>
		</div>
	</div>
</div>
@endsection