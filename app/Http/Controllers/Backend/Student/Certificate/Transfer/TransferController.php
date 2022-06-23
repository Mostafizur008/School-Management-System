<?php

namespace App\Http\Controllers\Backend\Student\Certificate\Transfer;

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

class TransferController extends Controller
{
    public function TransferView(){

    	$data['session'] = StudentSession::orderBy('id','asc')->get();
    	$data['class'] = StudentClass::all();
    	$data['exam'] = StudentExam::all();
        return view('backend.main-section.page.student.certificate.transfer.view',$data);
    }

    public function TransferGet(Request $request){

    	$session_id = $request->session_id;
    	$class_id = $request->class_id;
    	$id_no = $request->id_no;
        

    
    $count_fail = StudentMarks::where('session_id',$session_id)->where('class_id',$class_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();
    	// dd($count_fail)
    $singleStudent = StudentMarks::where('session_id',$session_id)->where('class_id',$class_id)->where('id_no',$id_no)->first();
    if ($singleStudent == true) {
    
    $admit = StudentMarks::with(['assign_sub','session'])->where('session_id',$session_id)->where('class_id',$class_id)->where('id_no',$id_no)->get();
    	// dd($allMarks->toArray());
        $allGrades = MarksGradePoint::all();
   // return view('backend.page.marks.marksheet.marksheet_detail',compact('allMarks','allGrades','count_fail'));
    $pdf = PDF::loadView('backend.main-section.page.student.certificate.transfer.detail', compact('admit','allGrades','count_fail'))->setPaper('A5','landscape');
    return  $pdf->stream('testimonal.pdf');

    }else{
    	return redirect()->back();
       }
    } 
}
