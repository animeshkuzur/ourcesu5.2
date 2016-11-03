@extends('layout.master')

@section('style')
	<link rel="stylesheet" href="{{ URL::asset('css/login.css') }}" type="text/css">
@endsection

@section('content')
	<div class="container">
        <div class="maincolor">
	        @include('include.login-ribbon')
			@include('include.left-tab')
			<!------------------body-content------------------>
                    <div class="col-md-6">						
                    	<div class="breadcum_content">
	                        <ul>
	                        	<li><a href="{{ url('/') }}">Home</a></li>
	                         	<li>Login</li>
	                        </ul>
                    	</div>
                    <!--<h3>Login</h3>-->
	                    <div class="row">
	                    	<div class="col-md-12">
	                    	<div class="login-body-text">
	                    		<h3>Login to 5 great reasons!</h3>
	                    		<ul>
	                    			<li>Simplified dashboard view of electricity bill</li>
	                    			<li>Simply Manage Your Connection</li>
	                    			<li>Make payment online</li>
	                    			<li>Hassel-free access to old bills & statements of account</li>
	                    			<li>Electricity Products & Services</li>
	                    		</ul>
	                    	</div>
	                    	</div>
	                    	
	                    </div>
                	</div>
        
		<div class="col-md-3">
			<div class="login-panel">
				<h4><b>Login to Your Account</b></h4>
				<br>
				{!! Form::open(array('route' => 'loginvalidate','method'=>'POST')) !!}
				{!! Form::text('email', null, array('class' => 'form-control email','placeholder'=>'Email or Contract Account No.','id'=>'email')) !!}
				<br>
				{!! Form::password('password', array('class' => 'form-control password','placeholder'=>'Password','id'=>'password')) !!}
				<br>
				<a href="#" class="btn btn-default cancel-btn">&nbsp;Cancel&nbsp;</a>
				{!! Form::submit('&nbsp;&nbsp;Login&nbsp;&nbsp;', array('class' => 'btn btn-danger login-btn','name'=>'login','id'=>'login')) !!}
				<br>
				<label>{!! Html::linkRoute('forgot', 'Forgot your password?') !!}</label>
				<br>
				{!! Form::submit('Login Without Password', array('class' => 'btn btn-danger login-btn btn-block no-password','name'=>'loginnopwd','id'=>'loginnopwd')) !!}
				{!! Form::close() !!}
				<div class="or">
					<h4><span>OR</span></h4>
				</div>	
				<a href="{{ url('/register') }}" class="btn btn-cancel cancel-btn btn-block">&nbsp;Sign up&nbsp;</a>
				<a href="#">
				<div class="help-login">
					<h5><b>Sign in Help</b></h5>
					<span class="glyphicon glyphicon-info-sign"></span>
					<b>Need help? Read FAQs.</b>

				</div>
				</a>
			</div>	
		</div>
		</div>
	</div>
	
@endsection

@section('script')
	<script type="text/javascript">
		 $(document).ready(function(){ 
    		$('#login').attr('disabled','disabled');
    		$('#loginnopwd').attr('disabled','disabled');

    		$('#email').on('change keyup paste',function(){
    			var username = $('#email').val();
    			intRegex = /[0-9 -()+]+$/;
    			emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    			if(intRegex.test(username)){
    				$('#loginnopwd').removeAttr('disabled');
    				$('#password').attr('disabled','disabled');
    			}
    			else if(emailRegex.test(username)){
    				$('#login').removeAttr('disabled');
    			}
    			else{
    				$('#loginnopwd').attr('disabled','disabled');
    				$('#password').removeAttr('disabled');
    				$('#login').attr('disabled','disabled');
    			}
    		});
    		

 		});

	</script>
@endsection