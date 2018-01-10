<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Response;

class SearchController extends Controller
{
    function index(){
        return view('autocomplete');
    }

    public function autocomplete(){
       $student=@\Auth::user()->username;
	$term = Input::get('term');
	
	$results = array();
	
	 
	$queries = DB::table('tpoly_feedetails')
                ->where('INDEXNO',$student)
		->where('RECEIPTNO', 'LIKE', '%'.$term.'%')
		 
		->take(500)->get();
	
	foreach ($queries as $query)
	{
	    $results[] = [ 'id' => $query->ID, 'value' =>\Carbon\Carbon::createFromTimeStamp(strtotime($query->TRANSDATE))->diffForHumans().'-'.$query->RECEIPTNO ];
	}
return Response::json($results);
}
 
}