@extends('servicerequest.common.layout')
@section('formContent')
@include('servicerequest.common.acmobile')
@include('servicerequest.common.welcomeMessage')
@include('servicerequest.common.supplydetails')
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-4"><label>Have you paid Meter Testing fee?</label></div>
		<div class="col-sm-3"><label><input type="radio" name="metertestingfee" value="yes" checked="checked">Yes</label></div>
		<div class="col-sm-3"><label><input type="radio" name="metertestingfee" value="no">No</label></div>
	</div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-12"><label>Please submit your Meter Testing MR Details</label></div>
	</div>
</div>
@include('servicerequest.common.moneyreceipt')
@include('servicerequest.common.reason')
@stop