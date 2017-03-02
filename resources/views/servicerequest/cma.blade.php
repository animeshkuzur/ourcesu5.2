@extends('servicerequest.common.layout')
@section('formContent')
@include('servicerequest.common.acmobile')
<div class="clearfix">&nbsp;</div>
@include('servicerequest.common.welcomeMessage')
<div class="clearfix">&nbsp;</div>
@include('servicerequest.common.moneyreceipt')
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-2"><label>Correct your</label></div>
		<div class="col-sm-2"><label><input type="radio"  value="billing" name="addresschangetype" checked="checked">Billing Address</label></div>
		<div class="col-sm-2"><label><input type="radio"  value="supply" name="addresschangetype">Supply Address</label></div>
	</div>
</div>
@include('servicerequest.common.address')

@stop