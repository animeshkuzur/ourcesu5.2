@extends('servicerequest.common.layout')
@section('formContent')
@include('servicerequest.common.acmobile')
@include('servicerequest.common.welcomeMessage')
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-4"><label>Provide the meter stolen date</label></div>
		<div class="col-sm-4"><input type="text" name="meterstolendate" class="form-control inputDate"></div>
	</div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-4"><label>Provide the meter stolen details</label></div>
		<div class="col-sm-4"><textarea class="form-control inputString" name="meterstolendetails"></textarea></div>
	</div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-4"><label>Upload your police complaint copy</label></div>
		<div class="col-sm-4"><input type="file" name="complaint" class="inputFile"></div>
	</div>
</div>
@stop