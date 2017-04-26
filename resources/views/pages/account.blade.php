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
                                <div class="form-group">

                                    @if($cont_acc)
                                        <select class="form-control input-sm" id="sel_contacc" style="float:right;width:110px;margin-right: 10px;">
                                        @foreach($cont_acc as $cont)
                                            <option>{{$cont->cont_acc}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                        
                    <div class="account-header" id="account_header">   
                        <div class="row">
                            <div class="col-xs-12">
                                Consumer ID : {{ $data->CONS_ACC }}
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-xs-12">
                                Name & Address : {{ $data->CON_NAME }}<br>
                                {{ $data->CON_ADD3 }}<br>
                                {{ $data->VILLAGE }}
                            </div>
                        </div>
                    </div>
                @if($user_type == 0)
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
                            <div class="row" style="padding-top: 5px;">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    Name : 
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::text('name',$set_data->name, array('class' => 'form-control input-sm','placeholder'=>'Name','id'=>'name')) !!}
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>
                            
                            </div>
                            <div class="row" style="padding-top: 5px;">
                            
                                <div class="col-sm-4" style="text-align: right;padding-top: 5px;">
                                    Email : 
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::text('email',$set_data->email, array('class' => 'form-control input-sm','placeholder'=>'Email','id'=>'email')) !!}
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
                                    {!! Form::text('mobile',$set_data->phone, array('class' => 'form-control input-sm','placeholder'=>'Add Mobile Number','id'=>'mobile')) !!}
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
                @else
                    <div class="account-body" style="pointer-events: none;opacity: 0.4;">
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
                @endif
                        
                    
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
<script type="text/javascript">
    $("#sel_contacc").on('change',function (e){
        $('#account_header').empty();
        var loader = "{{ URL::asset('images/ajax-loader.gif') }}";
        $('#account_header').html("<div class='row'><div class='col-xs-4'></div><div class='col-xs-4'><div id='ajax-loader'><img src='"+loader+"' /></div></div><div class='col-xs-4'></div></div>");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        e.preventDefault();
        var url = "{{url('/getuserdetails')}}";
        var contacc = $("#sel_contacc option:selected").text();    
        var request = {"cont_acc":contacc}
        $.ajax({
            type: "GET",
            url: url,
            data: request,
            dataType: 'json',
            success: function(data){
                $('#account_header').empty();
                if(data.header){
                    $('#account_header').append("<div class='row'><div class='col-xs-12'>Consumer ID : "+data.header.CONS_ACC+"</div></div><div class='row'><div class='col-xs-12'>Name & Address : "+data.header.CON_NAME+" <br>"+data.header.CON_ADD3 +"<br>"+data.header.VILLAGE+"</div></div>");
                }                
            },
            error: function(data){
                console.log(data);
            }
        });
    });


</script>
@endsection