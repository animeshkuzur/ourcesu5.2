@extends('servicerequest.common.layout')
@section('formContent')
@include('servicerequest.common.acmobile')
@include('servicerequest.common.welcomeMessage')
@include('servicerequest.common.moneyreceipt')
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-12"><label>Please select appropriate option</label></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-3"><label>Your current bill cleared?</label></div>
		<div class="col-sm-3"><label><input type="radio" name="currentbill" value="yes" checked="checked">Yes</label></div>
		<div class="col-sm-3"><label><input type="radio" name="currentbill" value="no">No</label></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-3"><label>Your meter is now ?</label></div>
		<div class="col-sm-3"><label><input type="radio" name="meterstatus" value="okay" checked="checked">Okay</label></div>
		<div class="col-sm-3"><label><input type="radio" name="meterstatus" value="defective">Defective</label></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-3"><label>Disconnection Fee Paid?</label></div>
		<div class="col-sm-3"><label><input type="radio" name="disconnectionfee" value="yes" checked="checked">Yes</label></div>
		<div class="col-sm-3"><label><input type="radio" name="disconnectionfee" value="no">No</label></div>
	</div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-6"><label>Give your DC MR & Last MR Details</label></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-6"><label>DC</label></div>
	</div>
</div>
@include('servicerequest.common.moneyreceipt')
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-6"><label>MR</label></div>
	</div>
</div>
@include('servicerequest.common.moneyreceipt')
<div class="clearfix">&nbsp;</div>
@include('servicerequest.common.reason')
@stop