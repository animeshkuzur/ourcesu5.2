@extends('layout.master')

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/vault.css') }}" type="text/css">
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
	                        	<li>Vault</li>
	                        </ul>
                    	</div>
                    	<div>
                    		
                    	</div>
                    <h3>My Vault</h3>
                </div>
			
		</div>
	</div>
@endsection

@section('script')

@endsection