@extends('servicerequest.common.layout')
@section('formContent')
@include('servicerequest.common.acmobile')
<div class="clearfix">&nbsp;</div>
@include('servicerequest.common.welcomeMessage')
<div class="clearfix">&nbsp;</div>
@include('servicerequest.common.supplydetails')
<?php $customMeterCost="Have you paid your meter shifting fee";
$customReason="Kindly mention the reason that’s why do you want to shift your meter to another place.";
?>
@include('servicerequest.common.metercost')
@include('servicerequest.common.reason')
@stop