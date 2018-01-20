<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

 
class LostPasswordController extends Controller
{
     

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(SystemController $sys)
    {
        $this->sysObject = $sys;
    }
    public function firesms($message, $phone, $receipient)
    {


        //$key = "83f76e13c92d33e27895";
        $message = urlencode($message);
        $phone = $phone; // because most of the numbers came from excel upload

        $key = "c2ff49f0bcbabdd8a0e4";
        //your unique API key;
        //$message = urlencode($message); //encode url;
        $sender_id="MoneyLandGH";
        /*******************API URL FOR SENDING MESSAGES********/
        $url = "http://sms.gadeksystems.com/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";

        $result=file_get_contents($url); //call url and store result;

        switch($result){
            case "1000":
                $result= "Message sent";
                break;
            case "1002":
                $result= "Message not sent";
                break;
            case "1003":
                $result= "You don't have enough balance";
                break;
            case "1004":
                $result= "Invalid API Key";
                break;
            case "1005":
                $result= "Phone number not valid";
                break;
            case "1006":
                $result= "Invalid Sender ID";
                break;
            case "1008":
                $result= "Empty message";
                break;
        }





    }
   
    /**
     *  
     *
     * @param  Request  $request
     * @return Response
     */
    public function sendNewPassword(Request $request)
    {
        $this->validate($request, [

           
            'phone' => 'required',
            
             
        ]);
        
        
       $phone=$request['phone'];
       $str = 'abcdefhkmnprtuvwxyz234678';
                    $shuffled = str_shuffle($str);
                    $vcode = substr($shuffled,0,9);
                   
       $sendPass=strtoupper($vcode);
       $message="Hi, please use this password  $sendPass to login .";
       $password = bcrypt(strtoupper($sendPass));
       $query=  \App\User::where('phone',$phone)->first();
        
        if(!empty($query)){
           if( \App\User::where('phone',$phone)->update(array('password'=>$password))){
               // fire sms

               $this->firesms($message, $query->phone,$query->name) ;
           }
        }
        else{
              return redirect("/")->withErrors(array("<span style='font-weight:bold;font-size:13px;'>Email or phone number not recognized.. try again </span> "));
         
        }
                
             
         if($query){
              return redirect("/")->with("success","<span style='font-weight:bold;font-size:13px;'>Password reset changed.. </span> ");
         
         }
    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
     

     
}
