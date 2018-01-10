<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
 
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\User;

class CourseController extends Controller
{
     
    /**
     * Create a new controller instance.
     *
     
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        
    }
     public function log_query() {
        \DB::listen(function ($sql, $binding, $timing) {
            \Log::info('showing query', array('sql' => $sql, 'bindings' => $binding));
        }
        );
    }
     public function transcript(SystemController $sys,Request $request){
         $student=  \Auth::user()->username;
               
      $userModel=User::where('username',$student)->where('active','1')->first();
              $studentUpdate=$userModel->biodata_update;
                
              $sql=Models\StudentModel::where("INDEXNO",$student)->first();
              

        //$studentUpdate=@$sql->biodata_update;             
         if($studentUpdate==0){
        return redirect('/biodataUpdate');
        }

        $qa=@$sql->QUALITY_ASSURANCE;

                if($qa==0) {
                 return redirect('/lecturer/assessment'); 
                }

        $owing=@$sql->BILL_OWING;
        
                           
                 
                 
               $data=$this->transcriptHeader($sql, $sys)  ;
              $record=$this->generateTranscript($sql->INDEXNO,$sys);
      return view("courses.transcript")->with('grade',$record)->with("student",$data)->with("owing",$owing);
         
                  
                
              
     }

    public function generateTranscript($sql,  SystemController $sys){

        $records=  Models\AcademicRecordsModel::where("indexno",$sql)->groupBy("year")->groupBy("level")->orderBy("level")->get();
        $programObject=Models\StudentModel::where('INDEXNO',$sql)->select("PROGRAMMECODE")->get();
        $program=$programObject[0]->PROGRAMMECODE;

        ?>


        <table width='700px' style="text-align:left; margin-top:-2px; font-size: 16px" height="90" class=""  border="0">
            <tr>

                <td  style=" " align="left">
                    <?php
                    $gpoint=0.0;
                    $totcredit=0;
                    $totgpoint=0.0;
                    $gcredit=0;
                    $b=0.0;
                    $a=0;
                    foreach ($records as $row){
                        for($i=1;$i<3;$i++){
                            $query=  Models\AcademicRecordsModel::where("indexno",$sql)->where("year",$row->year)->where("sem",$i)->get()->toArray();


                            if(count($query)>0){

                                echo "<div class='uk-text-bold' align='left' style='margin-left:18px'>YEAR : ".$row->year."    ";
                                echo ", SEMESTER : ".$i;
                                echo ", LEVEL :  " .$row->level." <hr/></div>";






                                ?>

                                <div class="uk-overflow-container">
                                <table style="margin-left:18px"  border="0" style="" width='840px'  class="uk-table uk-table-striped">
                                    <thead >
                                    <tr class="uk-text-bold" style="background-color:#1A337E;color:white;">
                                        <td  width="86">CODE</td>
                                        <td  width="458">COURSE</td>
                                        <td align='center' width="48">CR</td>
                                        <td align='center' width="49">GD</td>
                                        <td align='center'width="95" >GP</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    foreach ($query as $rs){

                                    if($rs['grade']!="IC" and $rs['grade']!="E" and $rs['grade']!="NC"){

                                    ?>
                                    <tr>
                                        <td <?php // if($rs['grade']=="E"|| $rs['grade']=="F"){ echo "style='display:none'";}?>> <?php $object=$sys->getCourseByCodeProgramObject($rs['code'],$program); echo @$object[0]->COURSE_CODE; ?></td>
                                        <td <?php // if($rs['grade']=="E"|| $rs['grade']=="F"){ echo "style='display:none'";}?>> <?php
                                            if($rs['resit']=="yes"){
                                                echo @$object[0]->COURSE_NAME."<span style='color:red'>*</span>";}else{echo @$object[0]->COURSE_NAME;}?> </td>

                                        <td align='center' <?php // if($rs['grade']=="E"|| $rs['grade']=="F"){ echo "style='display:none'";}?>><?php  @$gcredit+=@$rs['credits'];   $totcredit+=@$rs['credits'];@$a+=$totcredit; if($rs['credits']){ echo $rs['credits'];} else{echo "IC";};?></td>

                                        <td align='center' <?php // if($rs['grade']=="E" || $rs['grade']=="F"){ echo "style='display:none'";}?>><?php  if($rs['grade']){ echo @$rs['grade'];} else{echo "IC";}?></td>


                                        <td align='center' <?php // if($rs['grade']=="E"|| $rs['grade']=="F"){ echo "style='display:none'";}?>>
                                            <?php   @$gpoint+=@$rs['gpoint']; @$totgpoint+=@$rs['gpoint'];@$b+=@$totgpoint;if($rs['gpoint']){ echo $rs['gpoint'];} else{echo "0";}  ?></td>



                                        <?php
                                        }
                                        }?>
                                    </tr>
                                    <tr>

                                        <td>&nbsp</td>

                                        <td class="uk-text-bold"><span>GPA</span> <?php echo  number_format(@($gpoint/$gcredit), 2, '.', ',');?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>

                                        <td class="uk-text-bold" align='center'><?php echo $gcredit; ?></td>
                                        <td >&nbsp;</td>
                                        <td class="uk-text-bold" align='center'><?php echo $gpoint; ?>&nbsp;</td>
                                    </tr>
                                    <tr>

                                        <td>&nbsp</td>

                                        <td class="uk-text-bold"><span>CGPA</span> <?php echo  number_format(@($totgpoint/$totcredit), 2, '.', ',');?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>

                                        <td class="uk-text-bold" align='center'><?php echo   $totcredit; ?></td>
                                        <td >&nbsp;</td>
                                        <td class="uk-text-bold" align='center'><?php echo $totgpoint;   $b="";$a=""; ?>&nbsp;</td>
                                    </tr>

                                    </tbody>
                                    <?php
                                    $gpoint=0.0;
                                    $gcredit=0;
                                    ?>

                                </table>
                            <?php }else{
                                echo "<p class='uk-text-danger'>No results to display</p>";
                                ?><?php }?>
                            <p>&nbsp;</p>
                            </div><?php }  }

                    ?>


            </tr>

        </table>

        </div></div>

    <?php }
    public function transcriptHeader($student, SystemController $sys) {
        ?>
<div class="md-card" style="overflow-x: auto;" >
  
        <div   class="uk-grid" data-uk-grid-margin>

            <table  border="0" width="886px" cellspacing="0" align="center" style="margin-left:8px">
                        
                        <tr>
                            <th height="41" valign="top" class="bod" scope="row">
                            <table width="100%" border="0">
                            <tr>
                                <th align="center" valign="middle" scope="row">
                                <table height="133" border="0">
                                <tr>
                                    <th align="center" valign="middle" scope="row">
                                
                                <table border="0" >
                                    <tr>

                                        <td>
                                            <table>
                                                <tr>
                                                    <td class="uk-text-danger uk-text-left" colspan="3"><blinks>Use Mozilla Firefox or Google Chrome. Contact your HOD or call 0246091283 / 0243348522 / 0505284060 for any assistance. </blinks></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align='left'> <img src="<?php echo url('public/assets/img/academic.jpg')?>" style='width: 826px;height: auto;margin-bottom: 10px;'/></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td class="uk-text-bold"style="padding-right: px;">INDEX NUMBER</td> 
                                                    <td style=""><?php echo $student->INDEXNO;?></td>
                                                    <td rowspan="5" width="145">&nbsp;    
                                                        <img   style="width:130px;height: auto;margin-left: 8px"  
                                                            <?php
                                                                $pic = $student->INDEXNO;
                                                            ?>   
                                                                src='<?php echo url("public/albums/students/$pic.JPG")?>' alt="  Affix student picture here"    />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="uk-text-bold" style="">NAME</td> <td style=""><?php echo strtoupper($student->TITLE .' '.  $student->NAME)?></td>
                                                </tr>
                                                <tr>
                                                    <td class="uk-text-bold"style="">GENDER</td> <td style=""><?php echo strtoupper($student->SEX)?></td>
                                                </tr>
                                                <tr>
                                                    <td class="uk-text-bold">PROGRAMME</td> <td style=""><?php echo strtoupper($student->programme->PROGRAMME)?></td>
                                                </tr>
                                                 
                                                <tr>
                                                    <td class="uk-text-bold" style="">DATE OF BIRTH</td> <td style=""><?PHP echo  $student->DATEOFBIRTH ; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="uk-text-left" colspan="3">&nbsp;<br/>For HND only. &nbsp;&nbsp;Grade &nbsp;= &nbsp;Value, &nbsp;&nbsp;&nbsp;A+ &nbsp;= &nbsp;5.0, &nbsp;&nbsp;&nbsp;A &nbsp;= &nbsp;4.5, &nbsp;&nbsp;&nbsp;B+ &nbsp;= &nbsp;4.0, &nbsp;&nbsp;&nbsp;B &nbsp;= &nbsp;3.5, &nbsp;&nbsp;&nbsp;C+ &nbsp;= &nbsp;3, &nbsp;&nbsp;&nbsp;C &nbsp;= &nbsp;2.5, &nbsp;&nbsp;&nbsp;D+ &nbsp;= &nbsp;2, &nbsp;&nbsp;&nbsp;D &nbsp;= &nbsp;1.5, &nbsp;&nbsp;&nbsp;F &nbsp;= &nbsp;0, &nbsp;&nbsp;&nbsp;red asterisk means resit</td>
                                                </tr>
                                            </table>    
                                        </td>
                                    </tr>
                                </table>
                                </tr>
                                </table> <!-- end basic infos -->

                            </div>
                              
</div>
                            </tr>
                        </table></th>
                        </tr>
                        <tr></tr>
                    </table>

    <?php
        
    }
     
    public function show(Request $request) {
        
    }
     
    
    public function register(Request $request, SystemController $sys)
    {
       
        $student=@\Auth::user()->username;
        $array=$sys->getSemYear();
        $sem=$array[0]->SEMESTER;
        $year=$array[0]->YEAR;

        $status=$array[0]->STATUS;
        
         // check requisits for registrations
        $userModel=User::query()->where('username',$student)->where('active','1')->first();
              $studentUpdate=$userModel->biodata_update;
         if($studentUpdate==0){
        return redirect('/biodataUpdate');
        }


       if ($request->isMethod("get")) {
       $studentRecords=@Models\StudentModel::where("INDEXNO",$student)->first();
           $qa=@$studentRecords->QUALITY_ASSURANCE;
            if($studentRecords->LEVEL=='200H'|| $studentRecords->LEVEL=='300H'|| $studentRecords->LEVEL=="200BTT") {
                if ($qa == 0) {
                    return redirect('lecturer/assessment');
                }
            }
        if(!empty($studentRecords)){
        $owing=@$studentRecords->BILL_OWING;
            $bill=@$studentRecords->BILLS;
        $register=@$studentRecords->ALLOW_REGISTER;
        $studentStatus=@$studentRecords->STATUS;
         $qa=@$studentRecords->QUALITY_ASSURANCE;
        
        if($status==1) {
            $studentDetail = @$studentRecords;

            $courseCore = @Models\MountedCourseModel::query()->where('COURSE_SEMESTER', $sem)->where('COURSE_LEVEL', $studentDetail->LEVEL)->where('PROGRAMME', $studentDetail->PROGRAMMECODE)->where('COURSE_YEAR', $year)->where('COURSE_TYPE', 'Core')->paginate(100);

            $courseElective = @Models\MountedCourseModel::query()->where('COURSE_SEMESTER', $sem)->where('COURSE_LEVEL', $studentDetail->LEVEL)->where('PROGRAMME', $studentDetail->PROGRAMMECODE)->where('COURSE_YEAR', $year)->where('COURSE_TYPE', 'Elective')->paginate(100);
            $courseResit = @Models\MountedCourseModel::query()->where('COURSE_SEMESTER', $sem)->where('COURSE_LEVEL', $studentDetail->LEVEL)->where('PROGRAMME', $studentDetail->PROGRAMMECODE)->where('COURSE_YEAR', $year)->where('COURSE_TYPE', 'Resit')->paginate(100);
            $paid = Models\FeePaymentModel::where("INDEXNO", $studentRecords->INDEXNO)
                ->where("YEAR", $year)
                ->where("SEMESTER", $sem)
                ->sum("AMOUNT");
                $balance=$bill - $paid;

                 if($paid>= 0.7*$bill or $studentRecords->LEVEL=='100H' or $studentRecords->LEVEL=='100NT' or $studentRecords->LEVEL=='100BTT' or $studentRecords->LEVEL=='100BTT' or $studentRecords->LEVEL=='500MT' or $studentRecords->PROTOCOL=='1'){
            return view('courses.register')
                ->with('year', $year)
                ->with('sem', $sem)
                ->with('data', $studentDetail)
                ->with('course', $courseCore)
                ->with('courseElective', $courseElective)
                ->with('courseResit', $courseResit)
                ->with('owing', $owing)
                ->with('bill', $bill)
                ->with('paid', $paid)
                ->with('register', $register)
                ->with('qa', $qa)
                ->with('studentStatus', $studentStatus);
                } else{
          dd("You owe school fees contact finance. Amount is GHS".$balance);
      }
        }
      
     

        }
        else{
             // abort(434, "{!!<b>Course Registration has not been open yet contact ICT Officer</b>!!}");
        return      redirect("/registered_courses")->with("error","Course Registration has not been open yet contact 0246091283 / 0505284060");

        }
       }
       elseif($request->isMethod("post")){
           /*do post to database here 
            * @request type Post
            */
          \DB::beginTransaction();
          try {
                  
                $core=$request->input('core');
                $resit=$request->input('resit');
                   
                $elective=$request->input('elective');
                //dd($elective);
                $level=$request->input('level');
                $credit=$request->input('credit');
                $totalHours=$request->input('hours');
                $yeargroup=$request->input('yearGroup');
                $studentID=$sys->getStudentIDfromIndexno($student);
                   
                     @Models\AcademicRecordsModel::query()->where('student', $studentID)
                       ->where('year', $year)
                       ->where('sem', $sem)
                       ->delete() ;
                       
             if($core){
             //  dd(count($core));
                 
                 for($i=0;$i<count($core);$i++){
                      
                    
                     $queryModel=new Models\AcademicRecordsModel();
                     $queryModel->course=$core[$i];
                     $queryModel->code=$sys->getCourseCodeByID($core[$i]);
                     $queryModel->credits=$credit[$i];
                     $queryModel->student=$studentID;
                     $queryModel->indexno=$student;
                     $queryModel->yrgp=$yeargroup;
                     $queryModel->year=$year;
                     $queryModel->sem=$sem;
                     $queryModel->level=$level;
                     $queryModel->lecturer=$sys->getLecturer($core[$i]);
                     $queryModel->dateRegistered=\date('Y-m-d H:i:s');
                     
                     if($queryModel->save()){
                        // let increase the credit hours done by the student
                                           

                            
                                    }
                     
                 }
                    $oldHours = Models\StudentModel::where("INDEXNO", $student)->where('STATUS', '=', 'In school' )->orWhere('STATUS', '=', 'Admitted' )->first();
                    $durationCredit = $sys->getProgrammeMinCredit(@$oldHours->PROGRAMMECODE);

                    $newHours = @$oldHours->TOTAL_CREDIT_DONE + $totalHours;

                    $leftHours = $durationCredit - $newHours;

                    Models\StudentModel::where('INDEXNO', $student)->update(array('TOTAL_CREDIT_DONE' => $newHours,'STATUS'=>'In school', 'CREDIT_LEFT_COMPLETE' => $leftHours, 'REGISTERED' => '1'));
                    \DB::commit(); 
                   
                }
                if($resit){ 
                    
                    for($i=0;$i<count($resit);$i++){
                        $queryResit = new Models\AcademicRecordsModel();
                        $queryResit->course = $resit[$i];

                         $queryResit->credits =$sys->getCreditHours($resit[$i]) ;
                        $queryResit->student = $studentID;
                        $queryResit->indexno=$student;
                        $queryResit->yrgp = $yeargroup;
                        $queryResit->year = $year;
                        $queryResit->sem = $sem;
                        $queryResit->level = $level;
                        $queryResit->dateRegistered = \date('Y-m-d H:i:s');
                        $queryResit->lecturer=$sys->getLecturer($resit[$i]);
                        if ($queryResit->save()) {
                                
                        }
                    }
                   /* $oldHours = Models\StudentModel::where("INDEXNO", $student)->where('STATUS', '=', 'In school')->first();
                    $durationCredit = $sys->getProgrammeMinCredit(@$oldHours->PROGRAMMECODE);

                    $newHours = @$oldHours->TOTAL_CREDIT_DONE + $totalHours;

                    $leftHours = $durationCredit - $newHours;

                    Models\StudentModel::where('INDEXNO', $student)->update(array('TOTAL_CREDIT_DONE' => $newHours, 'CREDIT_LEFT_COMPLETE' => $leftHours, 'REGISTERED' => '1'));
                
                    */
                    \DB::commit(); 
                        }
                if($elective){
                  //  dd($elective);
                   
                    
                     $queryElective=new Models\AcademicRecordsModel();
                     $queryElective->course=$elective;
                    $queryElective->code=$sys->getCourseCodeByID($elective);
                     // dd($sys->getCreditHours($elective));
                     $queryElective->credits=$sys->getCreditHours($elective) ;
                     $queryElective->student=$studentID;
                     $queryElective->yrgp=$yeargroup;
                     $queryElective->year=$year;
                    $queryElective->indexno=$student;
                     $queryElective->sem=$sem;
                     $queryElective->level=$level;
                     $queryElective->dateRegistered=\date('Y-m-d H:i:s');
                     $queryElective->lecturer=$sys->getLecturer($elective);
                     if ($queryElective->save()) {
                        $oldHours = Models\StudentModel::where("INDEXNO", $student)->where('STATUS', '=', 'In school')->first();
                        $durationCredit = $sys->getProgrammeMinCredit(@$oldHours->PROGRAMMECODE);

                        $newHours = @$oldHours->TOTAL_CREDIT_DONE + $totalHours;

                        $leftHours = $durationCredit - $newHours;

                        Models\StudentModel::where('INDEXNO', $student)->update(array('TOTAL_CREDIT_DONE' => $newHours, 'CREDIT_LEFT_COMPLETE' => $leftHours, 'REGISTERED' => '1'));

                        \DB::commit();
                          
                          
                    }
                }
                
                 $url = url("printOut/".trim($student));
               
                    $print_window = "<script >window.open('$url','','location=1,status=1,menubar=yes,scrollbars=yes,resizable=yes,width=1000,height=500')</script>";
                    
                    $request->session()->flash("success", "Course registered successfully   $print_window");
                      return redirect("/dashboard"); 
               
          } catch (\Exception $e) {
                \DB::rollback();
                
            }
         
       }
    }
    /*
     * Printing registration form after registering
     */
    
    public function printRegistration(Request $request, $student, SystemController $sys) {
         
           $studentIndexNo=$sys->getStudentIDfromIndexno(@\Auth::user()->username);
            $array = $sys->getSemYear();
            $sem = $array[0]->SEMESTER;
            $year = $array[0]->YEAR;
            $studentDetail = Models\StudentModel::query()->where('STATUS', 'In School')->where('INDEXNO', $student)
                     
                    ->first();

            $query = Models\AcademicRecordsModel::where("student",  $studentIndexNo)->where("year", $year
                    )
                    ->where('sem',$sem)
                     ->paginate(100);
                   

            if (empty($query)) {
                abort(434, " No registration with this student  $student ");
            }

         
            return view("students.print_registration")->with("student", $studentDetail)->with('course', $query)->with('year', $year)->with('sem',$sem);
         
    }
    public function registeredCourses(Request $request,   SystemController $sys) {
        $studentIndexNo=$sys->getStudentIDfromIndexno(@\Auth::user()->username);
        $student=@\Auth::user()->username;
            $array = $sys->getSemYear();
            $sem = $array[0]->SEMESTER;
            $year = $array[0]->YEAR;
            $studentDetail = Models\StudentModel::query()->where('STATUS', 'In School')->where('INDEXNO', $student)
                     
                    ->first();

            $query = Models\AcademicRecordsModel::where("student",  $studentIndexNo)->where("year", $year
                    )
                    ->where('sem',$sem)
                     ->paginate(100);
                   

            if (empty($query)) {
                abort(434, " No registration with this student  $student ");
            }

         
            return view("students.print_registration")->with("student", $studentDetail)->with('course', $query)->with('year', $year)->with('sem',$sem);
         
    }
    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }
    public function generateIndexNumber(Request $request, SystemController $sys){

    }
}
