<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\User;
use App\Models\ProgrammeModel;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        /*ini_set('max_execution_time', 3000); //300 seconds = 5 minutes
         $user=User::where('username','!=','')->where('id','>=',3200)->get();
         foreach($user as $users=>$row){
             
             $student=$row->username;
             $password=$row->real_password;
             $hashedPassword = \Hash::make($password);
             
             User::where('username',$student)->update(array("password" => $hashedPassword));
             
         }*/
         
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getIndex(Request $request)
    {
        
        return view('students.index');
    }
    public function anyData(Request $request)
    {
         
        $students = StudentModel::join('tpoly_programme', 'tpoly_students.PROGRAMMECODE', '=', 'tpoly_programme.PROGRAMMECODE')
           ->select(['tpoly_students.ID', 'tpoly_students.NAME','tpoly_students.INDEXNO', 'tpoly_programme.PROGRAMME','tpoly_students.LEVEL','tpoly_students.INDEXNO','tpoly_students.SEX','tpoly_students.AGE','tpoly_students.TELEPHONENO','tpoly_students.COUNTRY','tpoly_students.GRADUATING_GROUP','tpoly_students.STATUS']);
         


        return Datatables::of($students)
                         
            ->addColumn('action', function ($student) {
                 return "<a href=\"edit_student/$student->INDEXNO/id\" class=\"\"><i title='Click to view student details' class=\"md-icon material-icons\">&#xE88F;</i></a>";
                 // use <i class=\"md-icon material-icons\">&#xE254;</i> for showing editing icon
                //return' <td> <a href=" "><img class="" style="width:70px;height: auto" src="public/Albums/students/'.$student->INDEXNO.'.JPG" alt=" Picture of Employee Here"    /></a>df</td>';
                          
                                         
            })
               ->editColumn('id', '{!! $ID!!}')
            ->addColumn('Photo', function ($student) {
               // return '<a href="#edit-'.$student->ID.'" class="md-btn md-btn-primary md-btn-small md-btn-wave-light waves-effect waves-button waves-light">View</a>';
            
                return' <a href="show_student/'.$student->INDEXNO.'/id"><img class="md-user-image-large" style="width:60px;height: auto" src="Albums/students/'.$student->INDEXNO.'.JPG" alt=" Picture of Student Here"    /></a>';
                          
                                         
            })
              
            
            ->setRowId('id')
            ->setRowClass(function ($student) {
                return $student->ID % 2 == 0 ? 'uk-text-success' : 'uk-text-warning';
            })
            ->setRowData([
                'id' => 'test',
            ])
            ->setRowAttr([
                'color' => 'red',
            ])
                  
            ->make(true);
             
            //flash the request so it can still be available to the view or search form and the search parameters shown on the form 
      //$request->flash();
    }
    /*
     * Update of students biodata here
     */
    public function biodataUpdate(Request $request, SystemController $sys) {
        $region=$sys->getRegions();
        $studentSessionId = @\Auth::user()->username;
        
        // make sure only students who are currently in school can update their data
        $query = StudentModel::where('INDEXNO', $studentSessionId)->where('STATUS','In School')->first();
        if(!empty($query)) {
            $programme = $sys->getProgramList();
            $hall = $sys->getHalls();
            $religion = $sys->getReligion();
            return view('students.biodata')->with('data', $query)
                ->with('programme', $programme)
                ->with('country', $sys->getCountry())
                ->with('region', $region)
                ->with('hall', $hall)
                ->with('religion', $religion);
        }else{
            return redirect("/dashboard")->with("error","You are not elligible to update your profile pls contact TPConnect Office");
        }
    }
   

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        echo "ss";
    }
public function gad()
    {
        //
        return view('autocomplete');
    }

    public function updateLevel()
    {
        $students=  StudentModel::query()->get();
            
         foreach ($students as $key => $row) {
              //$student= new StudentModel();
                  $indexno=$row->INDEXNO;
                 
                  $level= substr($indexno, 2,2);
                   //dd($level);
                  if($level=='15'){
                      StudentModel::where('INDEXNO','LIKE','0715%')->update(array("LEVEL"=>'100',"YEAR"=>'1'));
                  }
                  elseif($level=='14'){
                      
                      StudentModel::where('INDEXNO','LIKE','0714%')->update(array("LEVEL"=>'200',"YEAR"=>'2'));
                      
                  }
                  elseif($level=='13'){
                         
                       StudentModel::where('INDEXNO','LIKE','0713%')->update(array("LEVEL"=>'300',"YEAR"=>'3'));
                  }
               
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function biodataSave(Request $request , SystemController $sys)
    {
        set_time_limit(36000);
        /*transaction is used here so that any errror rolls
         *  back the whole process and prevents any inserts or updates
         */

  \DB::beginTransaction();

        $studentSessionId = @\Auth::user()->username;
        $indexno=$request->input('indexno');
         
        $year=$request->input('year');
//        if($year=='1'){
//            $level='100';
//        }
//        elseif($year=='2'){
//            $level='200';
//        }
//         elseif($year=='3'){
//            $level='300';
//        }
//        else{
//            $year=$level;
//        }
         $fname=$request->input('fname');
          $othername=$request->input('othernames');
        $gender=$request->input('gender');
        $category=$request->input('category');
        $hostel=$request->input('hostel');
        $hall=$request->input('halls');
        $dob=$request->input('dob');
        $gname=$request->input('gname');
        $gphone=$request->input('gphone');
        $goccupation=$request->input('goccupation');
        $gaddress=$request->input('gaddress');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $marital_status=$request->input('marital_status');
        $region=$request->input('region');
        $country=$request->input('nationality');
        $religion=$request->input('religion');
        $residentAddress=$request->input('contact');
        $address=$request->input('address');
        $hometown=$request->input('hometown');
        $nhis=$request->input('nhis');
        $type=$request->input('type');
        $disability=$request->input('disabilty');
        $title=$request->input('title');
        $age=$sys->age($dob,'eu');
        $group=$sys->graduatingGroup($indexno);
       
        $query= StudentModel::where("INDEXNO",$studentSessionId)->update(array(

            
                "TITLE"=>$title,
                 "SEX"=>$gender,
                 "DATEOFBIRTH"=>$dob,
                 "AGE"=>$age,
                 "GRADUATING_GROUP"=>$group,
                 "MARITAL_STATUS"=>$marital_status,
                 "HALL"=>$hall,
                 "ADDRESS"=>$address,
                 "RESIDENTIAL_ADDRESS"=>$residentAddress,
                 "EMAIL"=>$email,
                 "TELEPHONENO"=>$phone,
                 "COUNTRY"=>$country,
                 "REGION"=>$region,
                 "RELIGION"=>$religion,
                 "HOMETOWN"=>$hometown,
                 "GUARDIAN_NAME"=>$gname,
                 "GUARDIAN_ADDRESS"=>$gaddress,
                 "GUARDIAN_PHONE"=>$gphone,  
                 "GUARDIAN_OCCUPATION"=>$goccupation,
                 "DISABILITY"=>$disability,
                 "STATUS"=>"In School",
                 "NHIS"=>$nhis,
                 "STUDENT_TYPE"=>$type,
                 "TYPE"=>$category,
                 "HOSTEL"=>$hostel,
                 "SYSUPDATE"=>"1"
            
                ));
     
     \DB::commit();
         if(!$query){
      
          return redirect("/biodataUpdate")->withErrors("  N<u>o</u> :<span style='font-weight:bold;font-size:13px;'> Error in updating profile  </span>");
          }else{
           User::where("username",$studentSessionId)->update(array("biodata_update"=>'1'));
           return redirect("dashboard")->with("success"," <span style='font-weight:bold;font-size:13px;'> Now you can register biodata successfully updated!</span> ");
              
              
          }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
