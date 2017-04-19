@extends('layout.master')

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/payment.css') }}" type="text/css">
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
                    
                            
                        
                        <div class="account-body">
                    <div class="row">
                            <div class="col-xs-12">
                                <div class="title">
                                    Pay Bills
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
                        {!! Form::open(array('route' => 'savesettings', 'method'=>'POST')) !!}
                            <div class="row">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    Contract Account : 
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                    @if(isset($cont_acc))
                                        <select class="form-control input-sm" id="sel_contacc">
                                        @foreach($cont_acc as $cont)
                                            <option>{{$cont->cont_acc}}</option>
                                        @endforeach
                                        </select>
                                    @else
                                        <input type="text" name="input_contacc" id="text_contacc" class="form-control input-sm" placeholder="Contract Account Number">
                                    @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-danger login-btn btn-sm btn-block" style="width: 80px;" id="getbill">Get Bills</button>
                                </div>
                            
                            </div>
                            <div class="row" style="padding-top: 5px;">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    Collection Month : 
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::text('email',null, array('class' => 'form-control input-sm','placeholder'=>'Email','id'=>'email')) !!}
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-default btn-sm btn-block" style="width: 80px;">View Bill</a>
                                </div>
                            
                            </div>
                            <div class="row" style="padding-top: 5px;">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    Due Date : 
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::text('email',null, array('class' => 'form-control input-sm','placeholder'=>'Email','id'=>'email')) !!}
                                </div>
                                <div class="col-sm-4">
                                </div>
                            
                            </div>
                            <div class="row" style="padding-top: 5px;">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    Amount Before Due Date : 
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::text('email',null, array('class' => 'form-control input-sm','placeholder'=>'Email','id'=>'email')) !!}
                                </div>
                                <div class="col-sm-4">
                                   <a href="#" class="pay_help">(View help for Pay Before Due Date)</a>
                                </div>
                            
                            </div>
                            <div class="row" style="padding-top: 5px;">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    Amount After Due Date : 
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::text('mobile',null, array('class' => 'form-control input-sm','placeholder'=>'Add Mobile Number','id'=>'mobile')) !!}
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="pay_help">(View help for Pay After Due Date)</a>
                                </div>
                            
                            </div>
                            <div class="row" style="padding-top: 5px;">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    Amount to Be Paid : 
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::text('mobile',null, array('class' => 'form-control input-sm','placeholder'=>'Add Mobile Number','id'=>'mobile')) !!}
                                </div>
                                <div class="col-sm-4" style="font-size: 12px;">
                                    
                                </div>
                            
                            </div>
                            <div class="row" style="padding-top: 5px;">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    Mobile No. : 
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::text('mobile',null, array('class' => 'form-control input-sm','placeholder'=>'Add Mobile Number','id'=>'mobile')) !!}
                                </div>
                                <div class="col-sm-4" style="font-size: 12px;">
                                    (Enter Mobile Number to get SMS alert)
                                </div>
                            
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <div class="col-xs-4"></div>
                                <div class="col-xs-4">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <a href="#" class="btn btn-default cancel-btn btn-sm btn-block">&nbsp;Cancel&nbsp;</a>
                                        </div>
                                        <div class="col-xs-6">
                                            {!! Form::submit('Proceed to Pay',array('class' => 'btn btn-danger login-btn btn-sm btn-block','name'=>'submit')) !!}
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