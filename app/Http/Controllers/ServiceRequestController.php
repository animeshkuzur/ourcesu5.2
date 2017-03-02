<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ServiceRequestController extends Controller
{
    /*
	This Controller handles the view part.
	
    */ 

	public $welcomeMessage="Hi welcome here. This is a customised static message common to all form";
    public function showTestView()
    {
    	return view('servicerequest.common.layout');
    }
    /*
	The order of form follows the order in the doc.
    */ 
    public function handler($type)
    {
    	try {
    		switch ($type) {
    			case 1:
    				return $this->showCLI($type);
    				break;
    			case 2:
    				return $this->showCLR($type);
    				break;
    			case 3:
    				return $this->showVL($type);
    				break;
    			case 4:
    				return $this->showTCGD($type);
    				break;
    			case 5:
    				return $this->showTCDG($type);
    				break;
    			case 6:
    				return $this->showNCSM($type);
    				break;
    			case 7:
    				return $this->showCMA($type);
    				break;
    			case 8:
    				return $this->showOT($type);
    				break;
                case 9:
                    return $this->showCAC($type);
                    break;
                case 10:
                    return $this->showPD($type);
                    break;
                case 11:
                    return $this->showTD($type);
                    break;
                case 12:
                    return $this->showSR($type);
                    break;
                case 13:
                    return $this->showDCWR($type);
                    break;
    			default:
    				# code...
    				break;
    		}
    	} catch (\Exception $e) {
    		dd($e->getMessage($type));
    	}
    }
    /*
		I want my connection load to be increased
    */ 
    public function showCLI($type)
    {
    	$srTitle="I want my connection load to be increased";
    	$welcomeMessage=$this->welcomeMessage;
    	return view('servicerequest.clr',compact('srTitle','welcomeMessage'));
    }
    /*
		I want my connection load to be reduced
    */ 
    public function showCLR($type)
    {	$srTitle="I want my connection load to be reduced";
    	$welcomeMessage=$this->welcomeMessage;
    	return view('servicerequest.clr',compact('srTitle','welcomeMessage'));
    }

    /*
		I want to verify my load
    */ 
	public function showVL($type)
	{
		$srTitle="I want to verify my load";
    	$welcomeMessage=$this->welcomeMessage;
    	return view('servicerequest.vl',compact('srTitle','welcomeMessage'));
	}

	/*
		Tariff category from gps to domestic
	*/ 
	public function showTCGD($type)
	{
		$srTitle="Connection -> Traffic Category from GPS to Domestic";
    	$welcomeMessage=$this->welcomeMessage;
    	return view('servicerequest.tcgd',compact('srTitle','welcomeMessage'));
	}
		/*
		Tariff category from domestic to gps
	*/ 
	public function showTCDG($type)
	{
		$srTitle="Connection -> Traffic Category from Domestic to GPS";
    	$welcomeMessage=$this->welcomeMessage;
    	return view('servicerequest.tcdg',compact('srTitle','welcomeMessage'));
	}
	/*

		Name Correction  (Spelling Mistake)
	*/ 
	public function showNCSM($type)
	{
		$srTitle="Attribute -> Name Correction(Spelling Mistake)";
    	$welcomeMessage=$this->welcomeMessage;
    	return view('servicerequest.ncsm',compact('srTitle','welcomeMessage'));
	}

	/*
		Correction of my address
	*/ 
	public function showCMA($type)
	{
		$srTitle="Correction of my address";
    	$welcomeMessage=$this->welcomeMessage;
    	return view('servicerequest.cma',compact('srTitle','welcomeMessage'));
	}
	/*
		Ownership Transfer

	*/ 
	public function showOT($type)
	{
		$srTitle="Attribute->Ownership Transfer";
    	$welcomeMessage=$this->welcomeMessage;
    	return view('servicerequest.ot',compact('srTitle','welcomeMessage'));
	}

    /*
        I want my correction address to be changed
    */ 

    public function showCAC($type)
    {
        $srTitle="I want my correction address to be changed";
        $welcomeMessage=$this->welcomeMessage;
        return view('servicerequest.cac',compact('srTitle','welcomeMessage'));
    }

    /*
        Permanent Disconnection
    */ 
    public function showPD($type)
    {
        $srTitle="I want Permanent Disconnection";
        $welcomeMessage=$this->welcomeMessage;
        return view('servicerequest.pd',compact('srTitle','welcomeMessage'));
    }

    /*
        Temporary Disconnection
    */ 
    public function showTD($type)
    {
        $srTitle="I want Temporary Disconnection";
        $welcomeMessage=$this->welcomeMessage;
        return view('servicerequest.td',compact('srTitle','welcomeMessage'));
    }

    /*
        Service Reconnection
    */ 

    public function showSR($type)
    {
        $srTitle="I want my service to be reconnected";
        $welcomeMessage=$this->welcomeMessage;

        return view('servicerequest.sr',compact('srTitle','welcomeMessage'));
    }

    /*
        Disconnected Consumer Wish to Reconnect
    */ 
    public function showDCWR($type)
    {
        $srTitle="I am a disconnected user & wish to reconnect my service";
        $welcomeMessage=$this->welcomeMessage;

        return view('servicerequest.dcwr',compact('srTitle','welcomeMessage'));
    }
}
