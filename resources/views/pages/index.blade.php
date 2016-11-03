@extends('layout.master')

@section('style')

@endsection

@section('content')
	<div class="container">
                <div class="maincolor">
                        @include('include.login-ribbon')
			@include('include.left-tab')
			@include('include.body')
			@include('include.right-tab')
		</div>
	</div>
@endsection

@section('script')

@endsection