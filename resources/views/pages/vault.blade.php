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
                                        <th>View</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody id="doc_content">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td id='ajax-loader'>no records</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
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
                                            <select class="form-control input-sm" id="doc_type">
                                                <option disabled>SAP Bill</option>
                                                <option disabled>Spot Bill</option>
                                                <option disabled>Demand Note</option>
                                                <option disabled>Disconnection Notice</option>
                                                <option disabled="disabled">E-mobile Receipt</option>
                                                <option  disabled>Final Assessment</option>
                                                <option disabled="disabled">FOC Slip</option>
                                                <option disabled="disabled">Inspection Report</option>
                                                <option  disabled>Meter Change</option>
                                                <option disabled="disabled">Meter Protocol</option>
                                                <option value="9">Money Receipt</option>
                                                <option  disabled>Provisional Assessment</option>
                                                <option disabled="disabled">Acknowledgement Receipt of Service Request</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            
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
    $("#getdocs").click(function (e){
        $('#doc_content').empty();
        var loader = "{{ URL::asset('images/ajax-loader.gif') }}";
        $('#doc_content').html("<tr><td></td><td></td><td id='ajax-loader'><img src='"+loader+"' /></td><td></td><td></td></tr>");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        e.preventDefault();
        var docid = $('#doc_type option:selected').val();
        var url = "{{url('/datedocuments')}}";
        if($("#text_contacc").length){
            var contacc = $("#text_contacc").val();
        }
        else{
            var contacc = $("#sel_contacc option:selected").text();    
        }
        var request = {"cont_acc":contacc,"doc_type":docid}
        $.ajax({
            type: "GET",
            url: url,
            data: request,
            dataType: 'json',
            success: function(data){
                $('#doc_content').empty();
                if(data.dates[0] == null){
                    $('#doc_content').append("<tr><td></td><td></td><td>No Records found</td><td></td><td></td></tr>");
                }
                else{
                    $.each(data.dates, function (i,val){
                        $('#doc_content').append("<tr><td>"+data.document_name+"</td><td>"+val+"</td><td>"+data.document_type+"</td><td><a href='{{ url('/docview') }}/"+contacc+"/"+val+"/"+data.document_id+"' class='btn btn-sm btn-default' target='_blank'>View</a></td><td><a href='#' class='btn btn-sm btn-default' target='_blank'>Download</a></td></tr>");
                    }); 
                }
                
            },
            error: function(data){
                console.log(data);
            }
        });
    });
</script>
@endsection