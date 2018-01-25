<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use App\Models;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PledgeController extends Controller
{
    private $sysObject;

    public function __construct(SystemController $sys)
    {
        $this->middleware('auth');
        $this->sysObject = $sys;

    }

    public function pending(Request $request, SystemController $sys)
    {

        $client = @Models\ClientModel::where("user_id", @\Auth::user()->id)->first();
        $data = @Models\PledgeModel::where("pledge_maker_id", $client->id)->where("payment_confirm","Unconfirmed") ->paginate(50);
       


        // dd($data);
        return view("task.newPledge")
            ->with("data", $data);
    }
    public function index(Request $request, SystemController $sys)
    {
        if(\Auth::user()->role=="user"){
            $client = @Models\ClientModel::where("user_id", @\Auth::user()->id)->first();
            $data = @Models\PledgeModel::where("pledge_maker_id", $client->id)->orWhere("pledge_receiver_id", $client->id)->orderBy("id","DESC")->paginate(1000);

        }
        else{
            $data = @Models\PledgeModel::where("pledged_amount",">","0")->orderBy("id","DESC")->paginate(1000);

        }

        // dd($data);
        return view("pledges.index")
            ->with("data", $data);
    }

    public function showForm(Request $request, SystemController $sys)
    {


        $client2 = @Models\ClientModel::where("user_id", @\Auth::user()->id)->first();
      /*  $pledger = @Models\PledgeModel::where("pledge_maker_id", $client2->id)
            ->where(\DB::raw('MONTH(created_at)'),'=',date('n'))
            ->sum('pledged_amount'); */

        $pledger = @Models\PledgeModel::where("pledge_maker_id", $client2->id)->where("payment_confirm","Unconfirmed")
            ->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->sum('pledged_amount');
        if($pledger>=250){
            return redirect()->back()->with("error","You have exceeded your weekly pledge amount which is 250gh");
        }


        else {


            $data = $sys->getClients();


            return view('pledges.create')->with('data', $data);
        }

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
        Models\PledgeModel::where("id", $request->id)->delete();
        return redirect()->back()->with("success", "Record deleted successfully");

    }

}