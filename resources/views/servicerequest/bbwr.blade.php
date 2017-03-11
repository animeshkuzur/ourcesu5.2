@extends('servicerequest.common.layout')
@section('formContent')
@include('servicerequest.common.acmobile')
@include('servicerequest.common.supplydetails')
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-12">
			<label>On which Date our Meter Reader came to your premises to</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-3">
			<label>Took Reading</label>
		</div>
		<div class="col-sm-3"><input type="text" name="meterreadingdate" class="form-controm inputDate"></div>
		<div class="col-sm-3">
			<label>Reading(Kwh)</label>
		</div>
		<div class="col-sm-3"><input type="text" name="meterreading" class="form-controm inputNumber"></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-12">
			<label>Provide your meter reading as on date</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-3">
			<label>Date</label>
		</div>
		<div class="col-sm-3"><input type="text" name="meterreadingdate2" class="form-controm inputDate"></div>
		<div class="col-sm-3">
			<label>Reading(Kwh)</label>
		</div>
		<div class="col-sm-3"><input type="text" name="meterreading2" class="form-controm inputNumber"></div>
	</div>
</div>
<?php
$customUploadMeter="Upload your meter photo";
?>
@include('servicerequest.common.uploadmeterprotocol')
@stop