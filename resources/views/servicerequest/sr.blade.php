@extends('servicerequest.common.layout')
@section('formContent')
@include('servicerequest.common.acmobile')
@include('servicerequest.common.welcomeMessage')
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-12"><label>Submit your latest payment details.</label></div>
	</div>
</div>

@include('servicerequest.common.moneyreceipt')
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-12"><label>Give your RC MR details</label></div>
	</div>
</div>
@include('servicerequest.common.moneyreceipt')
@stop