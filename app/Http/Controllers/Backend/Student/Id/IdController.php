<?php

namespace App\Http\Controllers\Backend\Student\Id;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\AssignStudent\AssignStudent;
use App\Models\User;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Session\StudentSession;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Setup\Shift\StudentShift;
use DB;
use PDF;


class IdController extends Controller
{
    public function IdView(){

    	$data['session'] = StudentSession::orderBy('id','asc')->get();
    	$data['class'] = StudentClass::all();
        return view('backend.main-section.page.student.id.id_view',$data);
    }

    public function IdGet(Request $request){

    	$session_id = $request->session_id;
    	$class_id = $request->class_id;
    	$id_no = $request->id_no;
        
        $singleStudent = User::where('id_no',$id_no)->first();
        if ($singleStudent == true) {
        
        $data ['all'] = AssignStudent::where('session_id',$session_id)->where('class_id',$class_id)->get();
        $data ['db'] = User::where('id_no',$id_no)->get();
    
        $pdf = PDF::loadView('backend.main-section.page.student.id.id_detail',$data)->setPaper('A4');
        return  $pdf->stream('id.pdf');
    
        }else{
            return redirect()->back();
           }
        } 
  
}
