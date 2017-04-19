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
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-5"><label>For how many days do you want the disconnection?</label></div>
		<div class="col-sm-2"><label><input type="text" name="disconnectionperiod" class="form-control inputNumber" placeholder="Days"></div>
		
	</div>
</div>
@include('servicerequest.common.reason')
@stop