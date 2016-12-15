<!DOCTYPE html>
<html>
<head>
	<title>OURCESU : Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="{{ URL::asset('js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
	
    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
		<div class="header">
			<nav class="navbar navbar-inverse navbar-static-top">
			  <div class="container-fluid">
			    <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span> 
			    </button>
			      <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">Dashboard</a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="nav navbar-nav">
			      <li><a href="{{ url('/admin/pages') }}"><span class="glyphicon glyphicon-file"></span>&nbsp;Pages</a></li>
			      <li><a href="{{ url('/admin/images') }}"><span class="glyphicon glyphicon-picture"></span>&nbsp;Images</a></li>
			      <li><a href="{{ url('/admin/git') }}"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Git Pull</a></li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			      <li><a href="{{ url('/admin/settings') }}"><span class="glyphicon glyphicon-cog"></span>&nbsp;Settings</a></li>
			      <li><a href="{{ url('/admin/logout') }}"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Logout</a></li>
			    </ul>
			    </div>
			  </div>
			</nav>
		</div>
	
		<div class="content">
			<div class="container">
				<h1>Edit Pages</h1>
				<h5>Logged in as 
				<b>
				{{ \Auth::guard('admin')->user()->email }}
				</b>
				</h5>
			</div>
			{!! Form::token() !!}
			<div class="container">
				<div class="dashboard-panel">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Select a Category: </label>
								<select class="form-control" id="category">
									<option disabled selected value> -- select an category -- </option>
									@if($category)
										@foreach($category as $cat)
											<option value="{{ $cat->id }}">{{ $cat->name }}</option>
										@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Select a Sub-Category: </label>
								<select class="form-control" id="subcategory" disabled="disabled">
									
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Select a Page: </label>
								<select class="form-control" id="page" disabled="disabled">
									
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-10">
							<div id="error">
								
							</div>
						</div>
						<div class="col-md-2">
							<button class="btn btn-default btn-sm btn-block" id="editbtn">EDIT</button>
						</div>
					</div><br>
					<meta name="csrf-token" content="{{ csrf_token() }}">
					<div id="editor">
						<div class="row">
							<div class="col-md-12">
								<textarea class="form-control" name="content" id="input" rows="10">
									
								</textarea>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-2">
								<button class="btn btn-block btn-sm btn-primary" id="savebtn">SAVE</button>
							</div>
							<div class="col-md-10">
								<div id="save-msg">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<script type="text/javascript">
		$('#category').change(function(e){
			$('#page').empty();
			$('#page').attr("disabled","disabled");
			$('#subcategory').empty();
			$('#subcategory').attr("disabled","disabled");
			$.ajaxSetup({
            	headers: {
                	'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            	}
        	});
        	e.preventDefault();
        	var url = "{{url('/admin/getsubcat')}}";
			var id = $('#category option:selected').val();
			var request = {"id":id}
			$.ajax({
	            type: "GET",
	            url: url,
	            data: request,
	            dataType: 'json',
	            success: function(data){
	            	var temp = data;
	                $('#subcategory').empty();
	                $('#subcategory').removeAttr("disabled");
	                $('#subcategory').html("<option disabled selected value> -- select an category -- </option>")
	                $.each(temp.data, function (i,val){
	                    $('#subcategory').append("<option value='"+val.id+"''>"+val.name+"</option>");
	                });       
	            },
	            error: function(data){
	                console.log(data);
	            }
	        });
		});

		$('#subcategory').change(function(e){
			$('#page').empty();
			$('#page').attr("disabled","disabled");
			$.ajaxSetup({
            	headers: {
                	'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            	}
        	});
        	e.preventDefault();
        	var url = "{{url('/admin/getpage')}}";
			var id = $('#subcategory option:selected').val();
			var request = {"id":id}
			$.ajax({
	            type: "GET",
	            url: url,
	            data: request,
	            dataType: 'json',
	            success: function(data){
	            	var temp = data;
	                $('#page').empty();
	                $('#page').removeAttr("disabled");
	                $('#page').html("<option disabled selected value> -- select an category -- </option>")
	                $.each(temp.data, function (i,val){
	                    $('#page').append("<option value='"+val.id+"''>"+val.name+"</option>");
	                });
	            },
	            error: function(data){
	                console.log(data);
	            }
	        });
		});

		tinymce.init({
		  //path_absolute: "{{ URL::to('/') }}",
		  selector: 'textarea',
		  height: 500,
		  menubar: false,
		  plugins: [
		    'advlist autolink lists link image charmap print preview anchor',
		    'searchreplace wordcount visualblocks code fullscreen',
		    'insertdatetime media table contextmenu paste code textcolor'
		  ],
		  toolbar: 'undo redo | insert | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		  relative_urls:false,
		  content_css: '//www.tinymce.com/css/codepen.min.css'
		});

		$('#editbtn').click(function(e){
			e.preventDefault();
			var cat = $('#category option:selected').val();
			var subcat = $('#subcategory option:selected').val();
			var pag = $('#page option:selected').val();
			if(cat && subcat && pag){
				$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            		}
        		});
        		var url = "{{url('/admin/getcontent')}}";
        		var request = {"cat":cat,"subcat":subcat,"pag":pag}
        		$.ajax({
		            type: "GET",
		            url: url,
		            data: request,
		            dataType: 'json',
		            success: function(data){
		            	if(data.data.content){
		            		tinyMCE.activeEditor.setContent(data.data.content);
		            	}
		            	else{
		            		tinyMCE.activeEditor.setContent("EMPTY");	
		            	}
		            },
		            error: function(data){
		                console.log(data);
		            }
		        });
			}
			else{
				$("#error").html("<div class='alert alert-danger alert-dismissible' role='alert' style='font-size: 12px;margin:5px;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Please select all the category</div>");
			}
		});

		$('#savebtn').click(function (e) {
			e.preventDefault();
			var cat = $('#category option:selected').val();
			var subcat = $('#subcategory option:selected').val();
			var pag = $('#page option:selected').val();
			var con = tinyMCE.activeEditor.getContent();
			if(cat && subcat && pag && con){
				$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            		}
        		});
        		var url = "{{url('/admin/savecontent')}}";
        		var request = {"cat":cat,"subcat":subcat,"pag":pag,"content":con}
        		$.ajax({
		            type: "POST",
		            url: url,
		            data: request,
		            dataType: 'json',
		            success: function(data){
		            	$("#save-msg").html("<div class='alert alert-success alert-dismissible' role='alert' style='font-size: 12px;margin:5px;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Page Edited</div>");
		            },
		            error: function(data){
		                console.log(data);
		            }
		        });
			}
			else{
				$("#save-msg").html("<div class='alert alert-danger alert-dismissible' role='alert' style='font-size: 12px;margin:5px;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Fail to save</div>");
			}
		});

	</script>
</body>
</html>