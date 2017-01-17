<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PaymentController extends Controller
{
    public function initiate(){


    	return view('pages.payment');
    }

    public function receipt(){
    	return 0;
    }
}
