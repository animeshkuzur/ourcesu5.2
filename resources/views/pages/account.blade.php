@extends('layout.master')

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/account.css') }}" type="text/css">
@endsection

@section('content')
	<div class="container">
        <div class="maincolor">
            @include('include.login-ribbon')
			@include('include.left-tab')
			<!------------------body-content------------------>
                    <div class="col-md-9">						
                    	<div class="breadcum_content">
	                        <ul>
	                        	<li><a href="{{ url('/') }}">Home</a></li>
	                        	<li>Account</li>
	                        </ul>
                    	</div>
                    	<div>
                    		
                    	</div>
                    <h3>My Account</h3>
                    
                    <div class="account-header">
                        <div class="row">
                            <div class="col-xs-12">
                                Consumer ID : 102-02088119
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                Name & Address : Mr. ABC XYZ<br>
                                Address line 1<br>
                                Address line 2
                            </div>
                        </div>
                    </div>
                    <div class="account-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="title">
                                    Settings
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-2"></div>
                            <div class="col-xs-8">
                                <div class="account-line">
                                    <h4><span></span></h4>
                                </div>
                            </div>
                            <div class="col-xs-2"></div>
                        </div>
                        <div class="content">
                        {!! Form::open(array('route' => 'savesettings', 'method'=>'POST')) !!}
                            <div class="row" style="padding-top: 5px;">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    Name : 
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::text('name','John Doe', array('class' => 'form-control input-sm','placeholder'=>'Name','id'=>'name')) !!}
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>
                            
                            </div>
                            <div class="row" style="padding-top: 5px;">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    Email : 
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::text('email','john@doe.com', array('class' => 'form-control input-sm','placeholder'=>'Email','id'=>'email')) !!}
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>
                            
                            </div>
                            <div class="row" style="padding-top: 5px;">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    New Password : 
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::password('password1', array('class' => 'form-control input-sm','placeholder'=>'Password','id'=>'name')) !!}
                                </div>
                                <div class="col-sm-4" style="font-size: 12px;">
                                    (Change your password)
                                </div>
                            
                            </div>
                            <div class="row" style="padding-top: 5px;">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    Confirm New Password : 
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::password('password2', array('class' => 'form-control input-sm','placeholder'=>'Confirm Password','id'=>'name')) !!}
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>
                            
                            </div>
                            <div class="row" style="padding-top: 5px;">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    Mobile : 
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::text('mobile','', array('class' => 'form-control input-sm','placeholder'=>'Add Mobile Number','id'=>'mobile')) !!}
                                </div>
                                <div class="col-sm-4" style="font-size: 12px;">
                                    (Enter Mobile Number to get SMS alert)
                                </div>
                            
                            </div>
                            <div class="row" style="padding-top: 5px">
                                <div class="col-xs-4"></div>
                                <div class="col-xs-4">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <a href="#" class="btn btn-default cancel-btn btn-sm btn-block">&nbsp;Cancel&nbsp;</a>
                                        </div>
                                        <div class="col-xs-6">
                                            {!! Form::submit('SAVE',array('class' => 'btn btn-danger login-btn btn-sm btn-block','name'=>'submit')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4"></div>
                            </div>
                        {!! Form::close() !!}
                        </div>
                    </div>
                    
                </div>
		<!--Accounts Right Tab
            <div class="col-md-3 righttab">
                <div style="padding-top: 40px;">
                    
                </div>
                <div class="">
                <a href="{{ url('/settings') }}">
                    <div class="right-tab">
                        <div class="right-tab-icon">
                            <span class="glyphicon glyphicon-cog" style="color: #E5E5E5;"></span>
                        </div>
                        <div class="right-tab-title">My Settings</div>
                    </div>
                </a>
                </div>
           
            
                <div class="">
                <a href="{{ url('/vault') }}">
                    <div class="right-tab">
                        <div class="right-tab-icon">
                            <img src="{{ URL::asset('images/quick.png') }}" class="img-responsive" align="left">
                        </div>
                        <div class="right-tab-title">My Vault</div>
                    </div>
                </a>
                </div>


                <div class="">
                <a href="{{ url('/vault') }}">
                    <div class="right-tab">
                        <div class="right-tab-icon">
                            <img src="{{ URL::asset('images/quick.png') }}" class="img-responsive" align="left">
                        </div>
                        <div class="right-tab-title">My Vault</div>
                    </div>
                </a>
                </div>
            </div>-->	
		</div>
	</div>
@endsection

@section('script')

@endsection