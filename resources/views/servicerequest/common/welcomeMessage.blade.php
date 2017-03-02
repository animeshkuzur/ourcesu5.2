<style type="text/css">
	.welcomeMessage{
		border: 2px solid black;
		padding-top:5px;
		padding-bottom: 5px; 
	}
</style>
<div class="row">
	<div class="col-sm-12 text-center">
		<div class="col-sm-12">
			@if(isset($welcomeMessage))
				<div class="welcomeMessage">{{$welcomeMessage}} </div>
			@endif
		</div>
	</div>
</div>