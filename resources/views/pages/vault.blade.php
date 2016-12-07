@extends('layout.master')

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/vault.css') }}" type="text/css">
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
                            <table class="table">
                                <thead>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <td></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <br><br><br>
                        <div class="vault-panel">
                        <div class="form-group">
                            <label for="sel1">Contract Account Number :</label>
                                <select class="form-control input-sm" id="sel1">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="sel1">Year :</label>
                                        <select class="form-control input-sm" id="sel1">
                                            <option>2016</option>
                                            <option>2015</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sel1">Month :</label>
                                        <select class="form-control input-sm" id="sel1">
                                            <option>Jan</option>
                                            <option>Feb</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><input type="checkbox" value="">&nbsp;&nbsp;Fetch All Documents</label>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="button" name="Fetch" value="Fetch" class="form-control btn-sm btn-block btn btn-danger">
                                    </div>
                                </div>
                        </div>
                        </div>
                    </div> 
		</div>
	</div>
@endsection

@section('script')

@endsection