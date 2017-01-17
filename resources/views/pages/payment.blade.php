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
	                        	<li>Payment</li>
	                        </ul>
                    	</div>
                    	<div>
                    		
                    	</div>
                    <h3>My Payment</h3>
                    
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