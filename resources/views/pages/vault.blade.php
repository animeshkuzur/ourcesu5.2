@extends('layout.master')

@section('style')
    <link href="{{ URL::asset('css/vault.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/datepicker.css') }}" rel="stylesheet" type="text/css">
    
@endsection

@section('content')
	<div class="container">
        <div class="maincolor">
            @include('include.login-ribbon')
			@include('include.left-tab')
			<!------------------body-content------------------>
                    <div class="col-md-6">						
                    	<div class="breadcum_content">
	                        <ul>
	                        	<li><a href="{{ url('/') }}">Home</a></li>
	                        	<li>Vault</li>
	                        </ul>
                    	</div>
                        <h3>My Vault</h3>
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Download/View</th>
                                    </tr>
                                </thead>
                                <tbody id="doc_content">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>no records</td>
                                        <td></td>
                                    </tr>
                                    <!--<tr>
                                        <td>Mary</td>
                                        <td>Moe</td>
                                        <td>mary@example.com</td>
                                        <td><button class="btn btn-default btn-sm btn-block">View/Download</button></td>
                                    </tr>
                                    <tr>
                                        <td>July</td>
                                        <td>Dooley</td>
                                        <td>july@example.com</td>
                                        <td><button class="btn btn-default btn-sm btn-block">View/Download</button></td>
                                    </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <br><br><br>
                        <div class="vault-panel">
                            <div class="form-group">
                                <label for="sel1">Contract Account Number :</label>
                                    @if($cont_acc)
                                        <select class="form-control input-sm" id="sel_contacc">
                                        @foreach($cont_acc as $cont)
                                            <option>{{$cont}}</option>
                                        @endforeach
                                    </select>
                                    @else
                                        <input type="text" name="contacc" id="text_contacc" class="form-control input-sm" placeholder="Contract Account Number">
                                    @endif
                                    
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-append date input-group input-group-sm" id="datepicker" data-date="{{date('m-Y')}}" data-date-format="mm-yyyy">
                                                <span class="add-on input-group-addon" id="sizing-addon3"><span class="glyphicon glyphicon-calendar"></span></span>
                                                <input type="text" readonly="readonly" name="date" class="form-control" aria-describedby="sizing-addon3" value="{{date('m-Y')}}" id="date">          
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" value="" checked="checked">&nbsp;&nbsp;Fetch All Documents</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-danger btn-sm btn-block fetch-btn" type="button" name="fetch" id="getdocs">FETCH</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div> 
		</div>
	</div>
@endsection

@section('script')
<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript">
    $("#datepicker").datepicker( {
        format: "mm-yyyy",
        viewMode: "months", 
        minViewMode: "months",
        autoclose: true
    });
    $("#getdocs").click(function (e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        e.preventDefault();
        var url = "{{url('/getdocuments')}}";
        if($("#text_contacc").length){
            var contacc = $("#text_contacc").val();
        }
        else{
            var contacc = $("#sel_contacc option:selected").text();    
        }
        var request = {"cont_acc":contacc,"date":$("#date").val()}
        $.ajax({
            type: "GET",
            url: url,
            data: request,
            dataType: 'json',
            success: function(data){
                $('#doc_content').empty();
                $.each(data.data, function (i){
                    $('#doc_content').append("<tr><td>"+data.data[i].name+"</td><td>"+data.data[i].date+"</td><td>"+data.data[i].type+"</td><td></td></tr>");
                });
                
            },
            error: function(data){
                console.log(data);
            }
        });
    });
</script>
@endsection