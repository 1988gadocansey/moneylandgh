<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use App\Models;
use PhpParser\Node\Expr\AssignOp\Mod;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class MatchController extends Controller
{
    private $sysObject;

    public function __construct(SystemController $sys)
    {
        $this->middleware('auth');
        $this->sysObject = $sys;

    }

    public function index(Request $request, SystemController $sys)
    {
        $client2 = @Models\ClientModel::where("user_id", @\Auth::user()->id)->first();
        $client = @Models\PledgeModel::where("pledge_maker_id", $client2->id)->first();
        $data = @Models\MatchModel::where("client", $client->pledge_maker_id)->where("pledge",$client->id)->get();
        // dd($data);
        return view("matches.index")
            ->with("data", $data);
    }

    public function confirmMatch($id,Request $request, SystemController $sys)
    {
        $client = Models\ClientModel::where("user_id", @\Auth::user()->id)->first();
        $data = Models\MatchModel::where("client", $client->id)->get();
        $matchDetils=Models\MatchModel::where("id",$id)->first();
        Models\PledgeModel::where("id",$matchDetils->pledge)->update(array("payment_confirm"=>"Completed"));

         Models\MatchModel::where("id",$id)->update(array("confirmed"=>1));


        return redirect()->back()->with("data", $data)->with('success', "Payment confirmed");

    }

    public function store(Request $request)
    {


        $pledger = Models\ClientModel::where("user_id", @\Auth::user()->id)->first();
        //$pledgeReceiver = Models\ClientModel::where("id", $request->receiver)->first();

        //$pname = $pledgeReceiver->firstname;
        //$phone = $pledgeReceiver->phone;
        $paymentDue =date("Y-m-d"); //date('jS F, Y');
        $due=new \Carbon\Carbon($paymentDue);
        $dateToPay=$due->addDays(10);
        $amount = $request->amount;
        $receiver = $request->receiver;
        $code = rand();

        $data = new Models\PledgeModel();

        $data->pledge_maker_id = $pledger->id;
        $data->pledged_amount = $amount;
        $data->payment_confirm ="Unconfirmed";
        // $data->pledge_receiver_id = $receiver;
        $data->transaction_code = $code;
        $data->maturity_date = $dateToPay;
        $data->status = 0;
        $sql = $data->save();
        //$message = "Hi, $pname you have been pledged GHC$amount   due on $paymentDue from  $pledger->firstname with phone $pledger->phone due on $dateToPay";
        //@$this->sysObject->firesms($message, $phone, $pledgeReceiver->id);
        if ($sql) {

            return response()->json(['status' => 'success', 'message' => 'Pledge created... ']);

        } else {
            return response()->json(['status' => 'error', 'message' => ' Error created data. try again ']);

        }
    }

    public function destroy(Request $request)
    {
        Models\MatchModel::where("id", $request->id)->delete();
        return redirect("client/match")->with("success", "Record deleted successfully");

    }
    public function  showMatches(){
        //$client2 = @Models\ClientModel::where("user_id", @\Auth::user()->id)->first();
       // $client = @Models\PledgeModel::where("pledge_maker_id", $client2->id)->first();
        $data = @Models\MatchModel::paginate(5);
        // dd($data);
        return view("task.matches")
            ->with("data", $data);
    }
    public function showMatchForm(Request $request){
        $client = @Models\ClientModel::select('id','firstname','lastname','phone')->get();
        $pledge = @Models\PledgeModel::where("payment_confirm","Unconfirmed")
        ->where("matched",0)->get();
        // dd($data);
        return view("task.create")->with("pledge", $pledge)
            ->with("client", $client);
    }
    public function storeMatches(Request $request){
        $pledger=$request->maker;
         $receiver=$request->receiver;

         
          
           
          Models\PledgeModel::where("id",$pledger)->update(array("pledge_receiver_id"=>$receiver));
            
          $pledgeDetails=Models\PledgeModel::where("id",$pledger)->first();
          //dd($pledgeDetails);

          $receiverDetails=Models\ClientModel::where("id",$receiver)->first();

          
          $amount=$pledgeDetails->pledged_amount;
           $receiverName=$receiverDetails->mobile_money_name;
           $receiverPhone=$receiverDetails->mobile_money_phone;
         

          $data = new Models\MatchModel();

        $data->pledge = $pledger;
        $data->amount = $amount;
        $data->confirmed ="0";
         
        $data->client = $receiverDetails->id;
        $data->receiver_name = $receiverName;
        $data->mobile_money_no =$receiverPhone;
        $data->type ="receive";
        
        $sql = $data->save();
        //$message = "Hi, $pname you have been pledged GHC$amount   due on $paymentDue from  $pledger->firstname with phone $pledger->phone due on $dateToPay";
        //@$this->sysObject->firesms($message, $phone, $pledgeReceiver->id);
        if ($sql) {

            return response()->json(['status' => 'success', 'message' => 'Match  created... ']);

        } else {
            return response()->json(['status' => 'error', 'message' => ' Error created data. try again ']);

        }

    }

    public function firesms(Request $request){

        $sql=Models\MatchModel::where("confirmed",0)->get();
        if(count($sql)>0){
            foreach ($sql as   $value) {
                $phone=$value->mobile_money_no;
                $name=$value->receiver_name;

            $message = "Hi, $name you have been matched goto portal.moneylandgh.com to view details of your match.";
            @$this->sysObject->firesms($message, $phone, $name);
           
                 
            }
               return redirect()->back()->with("success","sms sent to matchs successfully");
     
             
        }
        else{
            return redirect()->back()->with("error","No Unconfirmed match to send sms to");
        }
    }

}