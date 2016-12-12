@extends('layout.master')

@section('style')
	<link rel="stylesheet" href="{{ URL::asset('css/register.css') }}" type="text/css">
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
				<h4><b>Create Your Account</b></h4>
				@if($errors)
					@if(count($errors))
						@foreach($errors->all() as $error)
							<div class="alert alert-danger alert-dismissible" role="alert">
								<font style="font-size: 12px; padding: 0px; margin : 0px;">
									{{ $error }}
									</font>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									
								</button>
							</div>
						@endforeach
					@endif
				@endif
				<br>
				{!! Form::open(array('route' => 'registervalidate','method'=>'POST')) !!}
				{!! Form::text('name', null, array('class' => 'form-control email','placeholder'=>'Name')) !!}
				<br>
				{!! Form::text('email', null, array('class' => 'form-control email','placeholder'=>'Email')) !!}
				<br>

				<div class=" " id="cont_acc1">					
					<input class="form-control" placeholder="CONTRACT ACCOUNT NUMBER" name="cont_acc[]" type="text">
					<div class="row">
						<div class="col-xs-6">
							<button type="button" id="addBtn" class="btn btn-default btn-sm btn-block"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Contract Acc</button>
						</div>
						<div class="col-xs-6">
							<button type="button" id="removeBtn" class="btn btn-default btn-sm btn-block"><span class="glyphicon glyphicon-minus"></span>&nbsp;&nbsp;Contract Acc</button>
						</div>
					</div>
				</div>
				<div id="cont_acc">
						
				</div>
				<br>
				{!! Form::password('password', array('class' => 'form-control password','placeholder'=>'Password')) !!}
				<br>
				{!! Form::password('password2', array('class' => 'form-control password','placeholder'=>'Confirm Password')) !!}
				<br>
				{!! Form::text('phone',null, array('class' => 'form-control phone','placeholder'=>'Mobile Number')) !!}
				<br>
				<a href="#" class="btn btn-default cancel-btn">&nbsp;Cancel&nbsp;</a>
				{!! Form::submit('&nbsp;&nbsp;Register&nbsp;&nbsp;', array('class' => 'btn btn-danger login-btn','name'=>'login')) !!}
				{!! Form::close() !!}	
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

			    var counter = 2;
					
			    $("#addBtn").click(function () {
							
				if(counter>10){
			        alert("Only 10 textboxes allow");
			        return false;
				}   
					
				var newTextBoxDiv = $(document.createElement('div')).attr({id : 'cont_acc' + counter,class: "some"});
			                
				newTextBoxDiv.after().html('<input class="form-control email" placeholder="CONTRACT ACCOUNT NUMBER '+counter+'" name="cont_acc[]" type="text">');
			            
				newTextBoxDiv.appendTo("#cont_acc");
	
				counter++;
			    });

			     $("#removeBtn").click(function () {
				if(counter==2){
			        alert("No more textbox to remove");
			        return false;
			       }   
			        
				counter--;
						
			        $("#cont_acc" + counter).remove();
						
			    });
					

			});
		</script>
@endsection