<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-5"><label>
		@if(isset($customMeterCost)){{$customMeterCost}}@else Have you paid Meter Cost?@endif</label></div>
		<div class="col-sm-1"><input type="radio" name="paidmetercost" class="form-control" value="1"></div>
		<div class="col-sm-1">Yes</div>
		<div class="col-sm-1"><input type="radio" name="paidmetercost" class="form-control" value="0"></div>
		<div class="col-sm-1">No</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-12"><label>IF YES</label></div>
	</div>
</div>
@include('servicerequest.common.moneyreceipt')

<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-12"><label>IF NO</label></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-2">Pay Online Here</div>
		<div class="col-sm-2"><button class="btn btn-primary">Pay Online</button></div>
	</div>
</div>