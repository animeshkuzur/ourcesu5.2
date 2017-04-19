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
                case 14:
                    return $this->showTM($type);
                    break;
                case 15:
                    return $this->showMRHS($type);
                    break;
                case 16:
                    return $this->showMS($type);
                    break;
                case 17:
                    return $this->showMSL($type);
                    break;
                case 18:
                    return $this->showMMSM($type);
                    break;
                case 19:
                    return $this->showIMR($type);
                    break;
                case 20:
                    return $this->showNMDNU($type);
                    break;
                case 21:
                    return $this->showSMAPSP($type);
                    break;
                case 22:
                    return $this->showMMNRM($type);
                    break;
                case 23:
                    # code...
                    return $this->showBBWR($type);
                    break;
                case 24:
                    return $this->showRBBR($type);
                    break;
                case 25:
                    return $this->showBBHLR($type);
                    break;
                case 26:
                    return "Required Consultation";
                    break;
                
    			default:
    				return "In Progress";
    				break;
    		}
    	} catch (\Exception $e) {
    		dd($e->getMessage());
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

    /*
        Test Meter
    */ 
    public function showTM($type)
    {
        $srTitle="I am a disconnected user & wish to reconnect my service";
        $welcomeMessage=$this->welcomeMessage;

        return view('servicerequest.tm',compact('srTitle','welcomeMessage'));
    }

    /*
        Meter running high speed
    */ 
    public function showMRHS($type)
    {
        $srTitle="My meter is running at high speed";
        $welcomeMessage=$this->welcomeMessage;

        return view('servicerequest.mrhs',compact('srTitle','welcomeMessage'));
    }

    /*
        Meter Stopped
    */ 
    public function showMS($type)
    {
        $srTitle="My meter is not running";
        $welcomeMessage=$this->welcomeMessage;

        return view('servicerequest.ms',compact('srTitle','welcomeMessage'));
    }
        /*
        Meter Stolen
    */ 
    public function showMSL($type)
    {
        $srTitle="My meter is stolen";
        $welcomeMessage=$this->welcomeMessage;

        return view('servicerequest.msl',compact('srTitle','welcomeMessage'));
    }
    /*
        Meter Change from mechanical to static
    */ 
    public function showMMSM($type)
    {
        $srTitle="Want to change my Mechaninc Meter to Static Meter";
        $welcomeMessage=$this->welcomeMessage;

        return view('servicerequest.mmsm',compact('srTitle','welcomeMessage'));
    }

    /*
        I want Meter on Rent
    */ 
    public function showIMR($type)
    {
        $srTitle="I want my meter on rent. What is the procedure?";
        $welcomeMessage=$this->welcomeMessage;

        return view('servicerequest.imr',compact('srTitle','welcomeMessage'));
    }

    /*

    I have already charged my meter since three months, new meter details not

        updated yet in to my Electricity Bill
    */ 
    public function showNMDNU($type)
    {
        $srTitle=" I have already charged my meter since three months, new meter details not
        updated yet in to my Electricity Bill";
        $welcomeMessage=$this->welcomeMessage;
        return view('servicerequest.nmdnu',compact('srTitle','welcomeMessage'));
    }
    /*
        I want to shift my meter to another place, but in same plot
    */ 
    public function showSMAPSP($type)
    {
        $srTitle="I want to shift my meter to another place, but in same plot";
        $welcomeMessage=$this->welcomeMessage;
        return view('servicerequest.smapsp',compact('srTitle','welcomeMessage'));   
    }
    /*
        My Meter not read this month
    */ 
    public function showMMNRM($type)
    {
        $srTitle="My Meter not read this month";
        $welcomeMessage=$this->welcomeMessage;
        return view('servicerequest.mmnrm',compact('srTitle','welcomeMessage'));   
    }
    /*
        I have received a bill based on wrong reading
    */ 
    public function showBBWR($type)
    {
        $srTitle="I have received a bill based on wrong reading";
        $welcomeMessage=$this->welcomeMessage;
        return view('servicerequest.bbwr',compact('srTitle','welcomeMessage'));   
    }
    /*
    No one has come to my premises to take reading but I have received a bill based on Reading
    */
    public function showRBBR($type)
    {
        $srTitle="No one has come to my premises to take reading but I have received a bill based on Reading";
        $welcomeMessage=$this->welcomeMessage;
        return view('servicerequest.rbbr',compact('srTitle','welcomeMessage'));
    }
    /*
    I have received a bill based on house lock remark
    */ 
    public function showBBHLR($type)
    {
        $srTitle="I have received a bill based on house lock remark";
        $welcomeMessage=$this->welcomeMessage;
        return view('servicerequest.bbhlr',compact('srTitle','welcomeMessage'));
    }


}
