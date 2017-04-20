<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Guest;
use App\User_Detail;

class PaymentController extends Controller
{
    public function initiate(){
    	if(\Auth::guard('user')->check()){
            $id=\Auth::guard('user')->user()->id;
            $cont_acc = User_Detail::where('user_id',$id)->get(['cont_acc']);
            
            

            return view('pages.payment',['cont_acc'=>$cont_acc]);        
        }
        if(\Auth::guard('guest')->check()){
            $id = \Auth::guard('guest')->user()->id;
            $cont_acc = Guest::where('id',$id)->get(['cont_acc']);
            
            return view('pages.payment',['cont_acc'=>$cont_acc]);
        }

    	return view('pages.payment');
    }

    public function receipt(Request $request){
    	$data = $request->all();
    	return $data;
    }

    public function getbilldate(Request $request){
        $date = array();
        $flag = 1;
        $data = $request->only('cont_acc');
        if(!$data['cont_acc']){
            return response()->json(['error' => 'cont_acc parameter absent']);
        }
        $sap_bill = \DB::table('SAP_DATA.dbo.BILLING_DATA')->where('CONTRACT_ACC',$data['cont_acc'])->orderby('BILL_MONTH','DESC')->get(['BILL_MONTH']);
                if($sap_bill){
                    foreach ($sap_bill as $dat) {
                        array_push($date,$dat->BILL_MONTH);
                        if($flag){
                            $temp_date = $dat->BILL_MONTH;
                            $flag = 0;
                        }
                    }
                }
        $spot_bill = \DB::table('STL.dbo.BILLING_OUTPUT_2016')->where('CONTRACT_ACC',$data['cont_acc'])->where('BillMonth',$temp_date)->limit(1)->get();
        return response()->json(['dates' => $date,'spot_bill' => $spot_bill]);
    }

    public function getbill(Request $request){
        $date = array();
        $data = $request->only('cont_acc','date');
        if(!$data['cont_acc']){
            return response()->json(['error' => 'cont_acc parameter absent']);
        }
        if(!$data['date']){
            return response()->json(['error' => 'bill month parameter absent']);   
        }
        $spot_bill = \DB::table('STL.dbo.BILLING_OUTPUT_2016')->where('CONTRACT_ACC',$data['cont_acc'])->where('BillMonth',$data['date'])->limit(1)->get();
        if(!$spot_bill){
            return response()->json(['error' => 'no records found!']);    
        }
        return response()->json(['spot_bill' => $spot_bill]);
        
    }

    public function pay(Request $request){
        $data = $request->only('billmonth','input_contacc');
        try{
            $divcode = \DB::table('Address_Mas.dbo.VW_CON_MAS')->where('CONTRACT_ACC',$data['input_contacc'])->limit(1)->get(['DIVCODE']);
            //$amount = \DB::table('SAP_DATA.dbo.BILLING_DATA')->where('CONTRACT_ACC',$data['input_contacc'])->orderby('BILL_MONTH','DESC')->limit(1)->get(['INVOICE_AMOUNT']);
            $amount = 2;
            $transactionid = $this->generateTransactionID();
            if(!isset($divcode)){
                return back()->withInput()->withErrors(['cont_acc' => 'Contract Account Number is invalid']);
            }
            if(!isset($amount)){
                return back()->withInput()->withErrors(['billmonth' => 'Bill Month is invalid']);
            }
            $merch_id = "OURCESU";
            $secur_id = "ourcesu";
            $ret_url = "https://ourcesu.com/receipt";
            $req = $merch_id."|".$data['input_contacc']."|NA|".$amount."|NA|NA|NA|INR|NA|R|".$secur_id."|NA|NA|F|".$transactionid."|".$divcode[0]->DIVCODE."|NA|NA|NA|NA|NA|".$ret_url;
            $checksum = $this->encrypt($req);
            $msg = $req."|".$checksum;
        }
        catch(Exception $e){

        }
        return view('pages.pay',['msg'=>$msg]);
        //return response()->json(['input' => $data,'divcode'=>$divcode[0]->DIVCODE,'amount'=>$amount,'transactionid'=>$transactionid,'request'=>$req,'checksum'=>$checksum]);
    }

    protected function encrypt($str)
    {
        
        $checksum = hash_hmac('sha256',$str,'qBR2g6A5IsK2', false); 
        return $checksum;
    }

    protected function decrypt($response)
    {

        $hashSequence = "status||||||udf5|udf4|udf3|udf2|udf1|email|firstname|productinfo|amount|txnid|key";
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = $this->salt."|";

        foreach($hashVarsSeq as $hash_var) {
            $hash_string .= isset($response[$hash_var]) ? $response[$hash_var] : '';
            $hash_string .= '|';
        }

        $hash_string = trim($hash_string,'|');

        return strtolower(hash('sha512', $hash_string));
    }

    public function generateTransactionID()
    {
        return substr((mt_rand() . microtime()), 0, 10);
    }
}
