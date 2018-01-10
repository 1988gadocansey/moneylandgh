<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgrammeModel;
 
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
 
class ProgrammeController extends Controller
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
 
    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function getIndex(Request $request)
    {
        
        return view('programme.index');
    }
    public function anyData(Request $request)
    {
         
        $program = ProgrammeModel::select([  'ID','DEPTCODE', 'PROGRAMMECODE','PROGRAMME','AFFILAITION','DURATION','MINCREDITS','MAXI_CREDIT']);


        return Datatables::of($program)
              
             ->addColumn('action', function ($programme_) {
                 return "<a href=\"edit_programme/$programme_->ID/id\" class=\"md-btn md-btn-primary md-btn-small md-btn-wave-light waves-effect waves-button waves-light\"><i title='click to edit' class=\"sidebar-menu-icon material-icons md-18\">edit</a>";
            
                //return' <td> <a href=" "><img class="" style="width:70px;height: auto" src="public/Albums/students/'.$student->INDEXNO.'.JPG" alt=" Picture of Employee Here"    /></a>df</td>';
                          
                                         
            })
            ->setRowId('id')
            ->setRowClass(function ($programme_) {
                return $programme_->ID % 2 == 0 ? 'uk-text-success' : 'uk-text-warning';
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

     
    public function create(SystemController $sys) {
        $department=$sys->department();
         return view('programme.create')->with('department', $department);
    }
    public function show(Request $request) {
        
    }
    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
         
        $this->validate($request, [
            'name' => 'required',
            'department'=>'required',
            'code'=>'required',
            'duration'=>'required',
            'credit'=>'required'
        ]);

      
      $total=count($request->input('code'));
      $name=$request->input('name');
      $department=$request->input('department');
      $duration=$request->input('duration');
      $credit=$request->input('credit');
      $code=$request->input('code');
       
      for($i=0;$i<$total;$i++){
         $program=new ProgrammeModel();
         $program->DEPTCODE=$department[$i];
         $program->PROGRAMMECODE=$code[$i];
         $program->PROGRAMME=$name[$i];
         $program->DURATION=$duration[$i];
         $program->MINCREDITS=$credit[$i];
           
         $program->save();
          
      }
       if(!$program){
      
          return redirect("/programmes")->withErrors("Following programmes N<u>o</u> :<span style='font-weight:bold;font-size:13px;'>$name could not be added </span>could not be added!");
          }else{
           return redirect("/programmes")->with("success","Following programme:<span style='font-weight:bold;font-size:13px;'> $name added </span>successfully added! ");
              
              
          }
       
          
       
    }
    // show form for edit resource
    public function edit($id){
        $programme_ = BankModel::where("ID", $id)->firstOrFail();
        return view('banks.edit')->with('bank', $programme_);
    }

    public function update(Request $request, $id){
         $query=  BankModel::where("ID",$id)->update(array("NAME"=>$request->input('bank'),"ACCOUNT_NUMBER"=>$request->input('account')));
         $programme_s=$request->input('bank');
         if(!$query){
      
          return redirect("/banks")->withErrors("Following banks N<u>o</u> :<span style='font-weight:bold;font-size:13px;'> $programme_s </span>could not be updated!");
          }else{
           return redirect("/banks")->with("success","Following banks:<span style='font-weight:bold;font-size:13px;'> $programme_s</span>successfully updated! ");
              
              
          }
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
}
