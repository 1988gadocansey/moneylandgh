<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use App\User;
use PhpParser\Node\Expr\AssignOp\Mod;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        //$agent = new Agent();
        /*$agent->is('Windows');
        $agent->is('Firefox');
        $agent->is('iPhone');
        $agent->is('OS X');
        $agent->isAndroidOS();
        $agent->isNexus();
        $agent->isSafari();
        $agent->isMobile();
        $agent->isTablet();
        $device = $agent->device();
        $platform = $agent->platform();
        $browser = $agent->browser();
        $agent->isDesktop();
        $agent->isPhone();
        $browser = $agent->browser();
        $version = $agent->version($browser);*/

        //$platform = $agent->platform();
        //$version = $agent->version($platform);
        //dd($agent->device());
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request $request
     * @return Response
     */
    public function index(SystemController $sys)
    {
        @$user = \Auth::user()->id;

        $date = new \Datetime();
        @User::where("id", $user)->update(array("last_sign_in" => $date));
        //$newIndex=$sys->assignIndex(@\Auth::user()->programme);
//dd($newIndex);
        $lastVisit = \Carbon\Carbon::createFromTimeStamp(strtotime(@\Auth::user()->last_sign_in))->diffForHumans();
        $student = @\Auth::user()->username;
        /*$userModel=User::query()->where('username',$student)->where('active','1')->first();
        $studentUpdate=$userModel->biodata_update;
        $academicDetails=$sys->getSemYear();
        $sem=$academicDetails[0]->SEMESTER;
        $year=$academicDetails[0]->YEAR;
       
        $studentDetail=Models\StudentModel::query()->where('STATUS','In School')->where('INDEXNO',$student)->orwhere('STATUS','Alumni')->orwhere('STATUS','Admitted')->first();
        //dd($studentDetail);
        $totalCredit=$studentDetail->TOTAL_CREDIT_DONE;
        $leftComplete=$studentDetail->CREDIT_LEFT_COMPLETE;

        $cgpa=$studentDetail->CGPA;
        $class=$studentDetail->CLASS;
        $outstandingBill=@$sys->formatMoney($studentDetail->BILL_OWING);
        $SemesterBill=@$sys->formatMoney($studentDetail->BILLS);
        $totalOwing=@$sys->formatMoney($studentDetail->BILL_OWING+$studentDetail->BILLS);
        //Payment details
        $paymentDetail=  Models\FeePaymentModel::query()->where('SEMESTER',$sem)->where('YEAR',$year)->where('INDEXNO',$student)->get();
        
         $totalPaid= \DB::table('tpoly_feedetails')->where('SEMESTER',$sem)->where('YEAR',$year)->where('INDEXNO',$student)->SUM("AMOUNT");
        //$_SESSION['paidd']=$totalPaid;
         
        // mounted courses
        $courseDetail= Models\MountedCourseModel::query()->where('COURSE_SEMESTER','2')->where('COURSE_LEVEL',$studentDetail->LEVEL)->where('PROGRAMME',$studentDetail->PROGRAMMECODE)->where('COURSE_YEAR',$year)->get();
        // dd( $courseDetail);
        $studentNew=Models\StudentModel::where("indexno",  $student)->select("REGISTERED")->first();
        if($studentUpdate==1){
         if($studentNew->REGISTERED==1){
              $query = @Models\AcademicRecordsModel::where("indexno",  $student)->where("year", $year
                    )
                    ->where('sem',$sem)
                     ->get();

         }*/

        $client = Models\ClientModel::where("user_id", @\Auth::user()->id)->first();
        if ($client != "") {
            $data = Models\PledgeModel::where("pledge_maker_id", $client->id)->where("payment_confirm", "Unconfirmed")->orderBy("created_at", "DESC")->get();
           // dd($data);
            $info = 1;

            $totalPledge=count($data);
            $totalMatches=Models\MatchModel::where("confirmed",1)->with('recieverDetails')->count();
            return view('dashboard')->with("rows", $data)->with("info", $info)
                ->with("pledgeTotal", $totalPledge)
                ->with("totalMatches", $totalMatches)
                ->with('lastVisit', $lastVisit);

        } else {
            $info = 0;
            return view('dashboard')->with("info", $info)
                ->with('lastVisit', $lastVisit);

        }


    }

    public function accountStatement(Request $request, SystemController $sys)
    {
        $student = @\Auth::user()->username;


        $academicDetails = $sys->getSemYear();
        $sem = $academicDetails[0]->SEMESTER;
        $year = $academicDetails[0]->YEAR;

        $studentDetail = Models\StudentModel::query()->where('STATUS', 'In School')->orwhere('STATUS', 'Alumni')->orwhere('STATUS', 'Admitted')->where('INDEXNO', $student)->first();


        $outstandingBill = @$sys->formatMoney($studentDetail->BILL_OWING);
        $SemesterBill = @$sys->formatMoney($studentDetail->BILLS);
        //Payment details
        $paymentDetail = Models\FeePaymentModel::query()->where('INDEXNO', $studentDetail->STNO)->orderBy('LEVEL', 'DESC')->orderBy('YEAR', 'DESC')->orderBy('SEMESTER', 'DESC')->get();
        return view("students.account_statement")->with("transaction", $paymentDetail)
            ->with('balance', $outstandingBill)
            ->with('semesterBill', $paymentDetail);
    }

    /**
     * Create a new task.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    /**
     * Destroy the given task.
     *
     * @param  Request $request
     * @param  Task $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }
}
