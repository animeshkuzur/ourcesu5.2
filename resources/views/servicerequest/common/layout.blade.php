@extends('layout.master')
{{-- <script type="text/javascript" src="{{asset('public/js/jquery.min.js')}}"></script> --}}
@yield('urlsetter')
@section('content')
<style type="text/css">
	.srForm{
		padding-top: 10px;
		/*border: 1px solid black;*/
	}
</style>
<?php 
$customReason="";
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
		<div class="col-sm-12"><h4>Service Request -> {{$srTitle}}</h4></div></div>
	</div>
	{!!Form::open(array('class'=>'srForm form','id'=>'srForm'))!!}

		<input type="hidden" name="servicerequestType" id="servicerequestType">
		{{-- Holds AC No Mob No Email --}}
		@yield('formContent')


	<div class="row show3">
		{{-- Last Payment Details--}}
	</div>

	
	<div class="row show4">
		{{-- Latest Money Receipt Details --}}
	</div>


	<div class="row show5">
		
	</div>


	<div class="row show6">
		{{-- Holds the Submit Button  --}}
		<div class="col-sm-12 text-center" style="padding-top: 10px; ">
		
		<input type="submit" name="submit" id="formSubmit" class="btn btn-warning " style="text-align: center;">
	
		</div>
	</div>
	</form>

</div>
@stop
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('#formSubmit').click(function(e){
			e.preventDefault();
			var sForm= $('#srForm').serialize();
			console.log(sForm);
			console.log("**");
		});
	});
</script>
@stop