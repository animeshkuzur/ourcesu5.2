@extends('servicerequest.common.layout')
@section('formContent')
@include('servicerequest.common.dcme')
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-3">
			<label>Name:</label>
		</div>
		<div class="col-sm-3">
			....................................................
		</div>
		<div class="col-sm-3">
			<label>Energisation Date:</label>
		</div>
		<div class="col-sm-3">
			<input type="date" name="energisationdate" class="inputDate form-control">
		</div>
	</div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-3"><label>Type Correct Name</label></div>
		<div class="col-sm-3"><input type="text" name="correctname" class="form-control inputString"></div>
	</div>

</div>
@include('servicerequest.common.uploadid')
@include('servicerequest.common.uploadresid')
@include('servicerequest.common.uploadaffidavit')
@stop