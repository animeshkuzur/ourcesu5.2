@extends('layout.master')
{{-- <script type="text/javascript" src="{{asset('public/js/jquery.min.js')}}"></script> --}}
@yield('urlsetter')
@section('content')
<div class="container">
	{!!Form::open()!!}

	<div class="row" class="show1">
		{{-- Holds AC No Mob No Emaik --}}
		{{-- @include('servicerequest.common.show1') --}}
		
	</div>


	<div class="row" class="show2">
		{{-- Holds Welcome Message --}}
		{{-- @include('servicerequest.common.show2') --}}
	</div>


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
		<div class="col-sm-12">
		<input type="submit" name="submit" id="formSubmit" class="btn btn-warning pull-right">
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
		});
	});
</script>
@stop