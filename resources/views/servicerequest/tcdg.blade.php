@extends('servicerequest.common.layout')
@section('formContent')
@include('servicerequest.common.dcme')
@include('servicerequest.common.moneyreceipt')
<div>&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-4">
			<label>Current Domestic Load</label>
		</div>
		<div class="col-sm-3">
			<input type="text" name="currentdomesticload" class="form-control currentdomesticload inputNumber" id="currentdomesticload">
		</div>
	</div>
</div>
<div>&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-4">
			<label>Apply load for GPS Connection</label>
		</div>
		<div class="col-sm-3">
			<input type="text" name="loadgpsconnection" class="form-control loadgpsconnection inputNumber" id="loadgpsconnection">
		</div>
	</div>
</div>
<div>&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-4">
			<a href="#">Download the Load Verification Form</a>
		</div>
		<div class="col-sm-8"></div>
	</div>
</div>
<div>&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-4">
			<label>Upload Load Verification Form</label>
		</div>
		<div class="col-sm-8"><input type="file" name="loadverificationform" class="inputFile"></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-4">
			<label>Upload Electrical Inspection Report</label>
		</div>
		<div class="col-sm-8"><input type="file" name="electricalinspectionreport" class="inputFile"></div>
	</div>
</div>
<div>&nbsp;</div>
@stop