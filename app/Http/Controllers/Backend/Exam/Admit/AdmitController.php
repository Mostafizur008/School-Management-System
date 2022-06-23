<?php

namespace App\Http\Controllers\Backend\Exam\Admit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup\Subject\StudentSub;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Student\AssignStudent\AssignStudent;
use App\Models\Exam\AssignSubject\AssignSub;
use App\Models\DiscountStudent\DiscountStudent;
use App\Models\User;
use App\Models\Setup\Session\StudentSession;
use App\Models\Setup\Shift\StudentShift;
use App\Models\Exam\StudentExam;
use App\Models\Exam\StudentMarks\StudentMarks;
use App\Models\Exam\MarksGradePoint\MarksGradePoint;
use DB;
use PDF;

class AdmitController extends Controller
{
    public function AdmitView(){

    	$data['session'] = StudentSession::orderBy('id','desc')->get();
    	$data['class'] = StudentClass::all();
    	$data['shift'] = StudentShift::all();
        return view('backend.main-section.page.exam.admit.admit_view',$data);
    }

    public function AdmitGet(Request $request){

    	$session_id = $request->session_id;
    	$class_id = $request->class_id;
    	$shift_id = $request->shift_id;
    	$id_no = $request->id_no;
        


    $singleStudent = User::where('id_no',$id_no)->first();
    
    if ($singleStudent == true) {
    
        $data = User::where('id_no',$id_no)->get();
        $admit = AssignStudent::where('session_id',$session_id)->where('class_id',$class_id)->where('shift_id',$shift_id)->get();
    	
    
    $pdf = PDF::loadView('backend.main-section.page.exam.admit.admit_detail', compact('data','admit'))->setPaper('a4');
    return  $pdf->stream('result.pdf');

    }else{
    	return redirect()->back();
       }
    } 

}