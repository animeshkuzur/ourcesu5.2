<?php
Route::get('/test','ServiceRequestController@showTestView');
// Common Handler for all View Files/Routes
Route::get('servicerequest/form/{type}','ServiceRequestController@handler');