<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document Viewer</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="https://ourcesu.com"><img src="{{ URL::asset('images/logo2.png') }}" class="img-responsive logo"></a>
	    </div>
	    <p class="navbar-text"><b>Document Viewer</b></p>
	    <form class="navbar-form navbar-right">
	    	<button class="btn btn-sm btn-primary" onclick="window.print()"><span class="glyphicon glyphicon-print"></span> Print</button>
			<button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-download"></span> Download</button>	    	
	    </form>
	  </div>
	</nav>
	<div class="docviewer" style="margin-top: 50px; margin-bottom: 50px;">
		<div class="container-fluid">
			<div class="content">
			@if($doc_type == '1')
				@include('documents.demand-note')
			@endif
			@if($doc_type == '2')
				@include('documents.disconnect-notice')
			@endif
			@if($doc_type == '3')
				@include('documents.e-mobile-receipt')
			@endif
			@if($doc_type == '4')
				@include('documents.final-ass')
			@endif
			@if($doc_type == '5')
				@include('documents.foc-slip')
			@endif
			@if($doc_type == '6')
				@include('documents.inspection-report')
			@endif
			@if($doc_type == '7')
				@include('documents.meter-change')
			@endif
			@if($doc_type == '8')
				@include('documents.meter-protocol')
			@endif
			@if($doc_type == '9')
				@include('documents.money-receipt')
			@endif
			@if($doc_type == '10')
				@include('documents.provisional-ass')
			@endif
			@if($doc_type == '11')
				@include('documents.sap-bill')
			@endif
			@if($doc_type == '12')
				@include('documents.spot-bill')
			@endif
			@if($doc_type == '13')
				@include('documents.service-request')
			@endif
			</div>
		</div>	
	</div>
	
</body>
</html>