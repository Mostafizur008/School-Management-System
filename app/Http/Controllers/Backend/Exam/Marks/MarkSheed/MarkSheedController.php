<?php

namespace App\Http\Controllers\Backend\Exam\Marks\MarkSheed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent\AssignStudent;
use App\Models\Exam\AssignSubject\AssignSub;
use App\Models\DiscountStudent\DiscountStudent;
use App\Models\User;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Session\StudentSession;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Setup\Shift\StudentShift;
use App\Models\Exam\Exam\StudentExam;
use App\Models\Setup\Subject\StudentSub;
use App\Models\Exam\StudentMarks\StudentMarks;
use App\Models\Exam\MarksGradePoint\MarksGradePoint;
use DB;
use PDF;

class MarkSheedController extends Controller
{
    public function MarkSheetView(){

    	$data['session'] = StudentSession::orderBy('id','asc')->get();
    	$data['class'] = StudentClass::all();
    	$data['exam'] = StudentExam::all();
        return view('backend.main-section.page.exam.marks.marksheet.marksheet_view',$data);
    }

    public function MarkSheetGet(Request $request){

    	$session_id = $request->session_id;
    	$class_id = $request->class_id;
    	$exam_id = $request->exam_id;
    	$id_no = $request->id_no;
        

    $count_fail = StudentMarks::where('session_id',$session_id)->where('class_id',$class_id)->where('exam_id',$exam_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();
    	// dd($count_fail)
    $singleStudent = StudentMarks::where('session_id',$session_id)->where('class_id',$class_id)->where('exam_id',$exam_id)->where('id_no',$id_no)->first();
    if ($singleStudent == true) {
    
    $allMarks = StudentMarks::with(['assign_sub','session'])->where('session_id',$session_id)->where('class_id',$class_id)->where('exam_id',$exam_id)->where('id_no',$id_no)->get();
    	// dd($allMarks->toArray());
    $allGrades = MarksGradePoint::all();
   // return view('backend.page.marks.marksheet.marksheet_detail',compact('allMarks','allGrades','count_fail'));
    $pdf = PDF::loadView('backend.main-section.page.exam.marks.marksheet.marksheet_detail', compact('allMarks','allGrades','count_fail'))->setPaper('a4');
    return  $pdf->stream('result.pdf');

    }else{
    	return redirect()->back();
       }
    } 

}
