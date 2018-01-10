<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use App\Models;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class QualityAssuranceController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SystemController $sys)
    {

        $this->middleware('auth');


    }

    public function getCourse(Request $request,SystemController $sys)
    {

        $array = $sys->getSemYear();

        $qa= $array[0]->QA;

        $data=explode(",",$qa);

        $year=$data[0];

        $sem=$data[1];


        /*if($sem==1){
            $level=substr($level,0,3);
            $level=$level-100;
        }*/



        $programme = @\Auth::user()->programme;
        $course = \DB::table('tpoly_mounted_courses')->join('tpoly_courses', function($join)
        {
            $join->on('tpoly_mounted_courses.COURSE','=','tpoly_courses.ID');
        })
            ->where("tpoly_mounted_courses.LECTURER",$request->lecturer_id)
            ->where("tpoly_mounted_courses.COURSE_SEMESTER",$sem)
            ->where("tpoly_mounted_courses.COURSE_YEAR",$year)
            ->where("tpoly_mounted_courses.COURSE_LEVEL",$request->level)
            ->where("tpoly_mounted_courses.PROGRAMME",$programme)
            ->pluck("tpoly_courses.COURSE_NAME","tpoly_mounted_courses.COURSE_CODE");


        return response()->json($course);
    }

    public function showForm(Request $request, SystemController $sys)
    {

        $studentSessionId = @\Auth::user()->username;
        $programme = @\Auth::user()->programme;
        $array = $sys->getSemYear();
        $sem = $array[0]->SEMESTER;
        $year = $array[0]->YEAR;

        $status = $array[0]->QAOPEN;
        if ($status == 1) {

            // make sure only students who are currently in school can update their data
            $query = Models\QAquestionModel::where('indexno', $studentSessionId)->where('academic_year', $year)->first();

            $lecturers = $sys->getLectureListQA($programme);
            $zone = $sys->getZones();
            $address = $sys->getAddress();
            return view('QA.lecture_course_selector')->with('data', $query)
                ->with('lecturer', $lecturers)
                ->with('years', $sys->years())
                ->with('level', $sys->getLevelList())
                ;

        } else {
            return redirect("/dashboard")->with("error", "QA form has been closed.Please contact Quality Assurance OfIsIJJDDDDDDDDDDDDDDFFFfice");

        }
    }
    public function processStep1(Request $request){
        $request->session()->put('lecturer', $request->lecturer);
        $request->session()->put('course', $request->course);
        $request->session()->put('level', $request->level);

        return redirect("lecturer/assessment/wizzad");
    }
    public function showFormWizzard(Request $request, SystemController $sys)
    {

        //$request->session()->pull('course', 'default');

        $studentSessionId = @\Auth::user()->username;
        $programme = @\Auth::user()->programme;
        $array = $sys->getSemYear();
        $sem = $array[0]->SEMESTER;
        $year = $array[0]->YEAR;

        $status = $array[0]->QAOPEN;
        if ($status == 1) {

            // make sure only students who are currently in school can update their data
            $query = Models\QAquestionModel::where('indexno', $studentSessionId)->where('academic_year', $year)->first();


            $zone = $sys->getZones();
            $address = $sys->getAddress();
            return view('QA.form')->with('data', $query)

                ->with('level', $sys->getLevelList())
                ;

        } else {
            return redirect("/dashboard")->with("error", "QA form has been closed.Please contact Industrial Liaison Office");

        }
    }
    public function processForm(Request $request, SystemController $sys)
    {
        //dd($request);
        //dd( $request->session()->pull('lecturer' ));
        $this->validate($request, [
            'comprehensive_outline' => 'required',
            'created_friendly_atmosphere' => 'required',
            'sold_handout' => 'required',
            'expectations_communicated' => 'required',
            'course_objective_achieved' => 'required',
            'variety_assignment_used' => 'required',
            'communicate_effectively' => 'required',
            'mark_assignment' => 'required',


        ]);
        $array = $sys->getSemYear();

        $qa= $array[0]->QA;

        $data=explode(",",$qa);

        $year=$data[0];

        $sem=$data[1];

        $program = @\Auth::user()->programme;
        $indexno = @\Auth::user()->username;
        $lecturer = $request->session()->pull('lecturer');
        $course = $request->session()->pull('course');
        $level= $request->session()->pull('level');


        $courseID= $sys->getCourseByIDAQ($course,$program);


        $comprehensive_outline =$request->comprehensive_outline;
        $outline_based_on_sylla =$request->outline_based_on_sylla;
        $outline_recommended_books=$request->outline_recommended_books;
        $lecturer_person_details =$request->lecturer_person_details;
        $course_objective_spelt=$request->course_objective_spelt;
        $course_material_list =$request->course_material_list;
        $class_start_week=$request->class_start_week;
        $class_met_regularly=$request->class_met_regularly;
        $lecturer_punctual=$request->lecturer_punctual;
        $lecturer_missed_reason=$request->lecturer_missed_reason;

        $lecturer_stays_period=$request->lecturer_stays_period;   //added recently
        $demonstrate_knowledge=$request->demonstrate_knowledge;
        $well_organised_delivery=$request->well_organised_delivery;
        $communicate_effectively=$request->communicate_effectively;
        $class_time_prom_learn=$request->class_time_prom_learn;
        $varying_teaching_meth = $request->varying_teaching_meth;
        $encourage_stud_participation=$request->encourage_stud_participation;
        $encourage_problem_solving=$request->encourage_problem_solving;
        $respond_to_stud_concerns=$request->respond_to_stud_concerns;
        $other_media_delivery=$request->other_media_delivery;
        $room_for_question=$request->room_for_question;
        $adequate_assignment=$request->adequate_assignment;
        $state_feedback_time=$request->state_feedback_time;
        $mark_assignment=$request->mark_assignment;
        $discuss_in_class=$request->discuss_in_class;
        $stud_progress_concern=$request->stud_progress_concern;
        $stud_responsibility=$request->stud_responsibility;
        $deadline_assignment=$request->deadline_assignment;
        $disclose_marks =$request->disclose_marks;
        $late_submission_policy=$request->late_submission_policy;
        $variety_assignment_used = $request->variety_assignment_used;
        $course_objective_achieved =$request->course_objective_achieved;
        $expectations_communicated =$request->expectations_communicated;
        $sold_handout=$request->sold_handout;
        $created_friendly_atmosphere=$request->created_friendly_atmosphere;

        $checkQuery = Models\QAquestionModel::where("indexno", $indexno)
            ->where("academic_year", $year)->where("semester", $sem)->where("lecturer", $sem)
            ->where("course", $sem)->first();
        if (empty($checkQuery)) {
            $data = new Models\QAquestionModel();
            $data->comprehensive_outline=$comprehensive_outline;
            //$data->outline_based_on_sylla=$outline_based_on_sylla;
            $data->outline_recommended_books=$outline_recommended_books;
            $data->lecturer_person_details=$lecturer_person_details;
            $data->course_objective_spelt=$course_objective_spelt;
            $data->course_material_list=$course_material_list;
            $data->class_start_week=$class_start_week;
            $data->class_met_regularly=$class_met_regularly;
            $data->lecturer_punctual=$lecturer_punctual;
            $data->lecturer_missed_reason=$lecturer_missed_reason;
            $data->lecturer_stays_period=$lecturer_stays_period;
            $data->demonstrate_knowledge=$demonstrate_knowledge;
            $data->well_organised_delivery=$well_organised_delivery;
            $data->communicate_effectively=$communicate_effectively;
            $data->class_time_prom_learn=$class_time_prom_learn;
            $data->varying_teaching_meth=$varying_teaching_meth;
            $data->encourage_stud_participation=$encourage_stud_participation;
            $data->encourage_problem_solving=$encourage_problem_solving;
            $data->respond_to_stud_concerns=$respond_to_stud_concerns;
            $data->other_media_delivery=$other_media_delivery;
            $data->room_for_question=$room_for_question;
            $data->adequate_assignment=$adequate_assignment;
            $data->state_feedback_time=$state_feedback_time;
            $data->mark_assignment=$mark_assignment;
            $data->discuss_in_class=$mark_assignment;
            $data->stud_progress_concern=$stud_progress_concern;
            $data->stud_responsibility=$stud_responsibility;
            $data->deadline_assignment=$deadline_assignment;
            $data->disclose_marks=$disclose_marks;
            $data->late_submission_policy=$late_submission_policy;
            $data->variety_assignment_used=$variety_assignment_used;
            $data->course_objective_achieved=$course_objective_achieved;
            $data->expectations_communicated=$expectations_communicated;
            $data->sold_handout=$sold_handout;
            $data->created_friendly_atmosphere=$created_friendly_atmosphere;

            $data->discuss_in_class=$discuss_in_class;
            //$data->programmecode=$program;
            $data->course=$courseID;
           $data->coursecode=$course;
           $data->semester=$sem;
           $data->lecturer=$lecturer;
           $data->indexno=$indexno;
           $data->level=$level;

            $data->academic_year=$year;

 
            $sql = $data->save();
            $request->session()->forget('lecturer');
            $request->session()->forget('course');
            $request->session()->forget('level');

        } else {

            Models\QAquestionModel::where("indexno", $indexno)
                ->where("academic_year", $year)->where("semester", $sem)
            ->where("lecturer", $sem)
                ->where("course", $sem)->delete();

        }
        @Models\StudentModel::where("INDEXNO",$indexno)->update(array("QUALITY_ASSURANCE"=>1));

            return response()->json(['status' => 'success', 'message' => ' Data sent to Quality Assurance Office.. Going to print page... ']);


    }

    public function printForm(Request $request, SystemController $sys)
    {
        $studentSessionId = @\Auth::user()->username;
        $array = $sys->getSemYear();

        $qa= $array[0]->QA;

        $data=explode(",",$qa);

        $year=$data[0];

        $sem=$data[1];

        $program = @\Auth::user()->programme;
        $indexno = @\Auth::user()->username;
        $lecturer = $request->session()->pull('lecturer');
        $course = $request->session()->pull('course');
        $level= $request->session()->pull('level');


        $courseID= $sys->getCourseByIDAQ($course,$program);

        $status = $array[0]->QAOPEN;
        if ($status == 1) {

            // make sure only students who are currently in school can update their data
            $query = Models\QAquestionModel::where("indexno", $indexno)
                ->where("academic_year", $year)->where("semester", $sem) ->get();
             $studentData=Models\StudentModel::where("INDEXNO",$indexno)->first();

            return view('QA.print')->with('data', $query)
                ->with("studentDetials",$studentData)
                ->with("year",$year)
                ->with("sem",$sem)
                 ;

        } else {
            return redirect("/dashboard")->with("error", "Quality assurance has been closed");

        }
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request,   SystemController $sys, Models\CourseModel $course)
    {


        $studentSessionId = @\Auth::user()->username;
        $array = $sys->getSemYear();

        $qa= $array[0]->QA;

        $data=explode(",",$qa);

        $year=$data[0];

        $sem=$data[1];

        $program = @\Auth::user()->programme;
        $indexno = @\Auth::user()->username;

                $query= Models\QAquestionModel::where('lecturer',$request->id)
                    ->where("academic_year",$year)
                    ->where("semester",$sem)
                    ->where("indexno",$indexno)
                    ->delete();



            if($query){
                echo "<script>alert('Lecturer deleted')</script>";
            }


            return redirect()->back();

    }


}