<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ServiceRequestController extends Controller
{
    /*
	This Controller handles the view part.
	
    */ 

    public function showTestView()
    {
    	return view('servicerequest.common.layout');
    }
}
