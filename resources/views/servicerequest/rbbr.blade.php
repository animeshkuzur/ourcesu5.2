@extends('servicerequest.common.layout')
@section('formContent')
@include('servicerequest.common.acmobile')
@include('servicerequest.common.welcomeMessage')
@include('servicerequest.common.supplydetails')
<div class="clearfix">&nbsp;</div>
@include('servicerequest.common.equipment')
<?php 
$customUploadMeter="Meter Photo Cab";
$customCurrentMeter="Provide your current ";
?>
@include('servicerequest.common.currentmeterrating')
@include('servicerequest.common.uploadmeterprotocol')
@stop