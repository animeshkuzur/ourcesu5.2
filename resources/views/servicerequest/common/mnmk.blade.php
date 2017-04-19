<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-3" style="display: inline;"><label>Meter No.</label></div>
		<div class="col-sm-3"><input type="text" name="meterno" class="form-control inputString"></div>
		<div class="col-sm-3" style="display: inline;"><label>Meter Make</label></div>
		<div class="col-sm-3"><input type="text" name="metermake" class="form-control inputString"></div>
	</div>

</div>

@if(isset($showMoreMeter))
<div class="clearfix">&nbsp;</div>
<div class="row">
	<input type="hidden" name="moreMeterData">
	<div class="col-sm-12">
		<div class="col-sm-3" style="display: inline;"><label>Meter Installation Date</label></div>
		<div class="col-sm-3"><input type="text" name="meterinstallationdate" class="form-control inputDate"></div>
		<div class="col-sm-3" style="display: inline;"><label>Protocol No.</label></div>
		<div class="col-sm-3"><input type="text" name="protocolno." class="form-control inputString"></div>
	</div>

</div>
@endif