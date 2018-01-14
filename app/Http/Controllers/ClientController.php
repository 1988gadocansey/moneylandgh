<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use App\Models;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
class ClientController  extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }

    public function showProfileForm(Request $request, SystemController $sys)
    {

        $studentSessionId = @\Auth::user()->id;



        // make sure only students who are currently in school can update their data
        $query = Models\ClientModel::where('user_id', $studentSessionId)->first();


        return view('profile.profile')->with('data', $query)
            ;

    }

    public function profileUpdate(Request $request){


        $clientCode = @\Auth::user()->id;
        $fname = $request->fname;
        $phone = $request->phone;
        $lname = $request->surname;
        $othername = $request->othername;

        $gender = $request->gender;

        $address = $request->address;
        $month = $request->month;
        $day = $request->day;
        $year = $request->year;

        $email = $request->email;
        $dateJoined=$year."/".$month."/".$day;
        $checkQuery = Models\ClientModel::where("user_id", $clientCode)
            ->first();
        if (empty($checkQuery)) {
            $data = new Models\ClientModel();
            $data->firstname = ucwords($fname);

            $data->email = $email;
            $data->gender=  $gender;
            $data->date_joined=  $dateJoined;
            $data->address = ucwords($address);
            $data->middle_name = ucwords($othername);
            $data->lastname = ucwords($lname);
            $data->user_id = ucwords($clientCode);

            $sql = $data->save();

        } else {
            $sql =  Models\ClientModel::where("user_id", $clientCode)
                ->update(array(
                    "firstname" => ucwords($fname),

                    "email" => ucwords($email),
                    "address" => ucwords($address),
                    "gender" => ucwords($gender),
                    "date_joined" =>  $dateJoined,
                    "lastname" => ucwords($lname),
                    "middle_name" => ucwords($othername),


                ));

        }
        if ($sql) {

            return response()->json(['status' => 'success', 'message' => 'Profile information updated... ']);

        } else {
            return response()->json(['status' => 'error', 'message' => ' Error sending data. try again ']);

        }
    }


}