<?php

namespace App\Http\Controllers\Backend\Exam\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\AssignStudent\AssignStudent;
use App\Models\Exam\AssignSubject\AssignSub;
use App\Models\User;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Session\StudentSession;
use App\Models\setup\Group\StudentGroup;
use App\Models\Setup\Shift\StudentShift;
use App\Models\Exam\Exam\StudentExam;
use App\Models\Exam\StudentMarks\StudentMarks;
use DB;
use PDF;

class MarksController extends Controller
{
    public function MarksAdd(){
    	$data['session'] = StudentSession::all();
    	$data['class'] = StudentClass::all();
    	$data['exam'] = StudentExam::all();

    	return view('backend.main-section.page.exam.marks.marks_add',$data);

    }

    public function GetSubject(Request $request){
    	$class_id = $request->class_id;
    	$allData = AssignSub::with(['subject'])->where('class_id',$class_id)->get();
    	return response()->json($allData);

    }

    public function GetStudents(Request $request){
    	$session_id = $request->session_id;
    	$class_id = $request->class_id;
    	$allData = AssignStudent::with(['st_name'])->where('session_id',$session_id)->where('class_id',$class_id)->get();
    	return response()->json($allData);
    }

    public function MarksStore(Request $request){

    	$studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) { 
    		$data = New StudentMarks();
    		$data->session_id = $request->session_id;
    		$data->class_id = $request->class_id;
    		$data->assign_subject_id = $request->assign_subject_id;
    		$data->exam_id = $request->exam_id;
    		$data->student_id = $request->student_id[$i];
    		$data->id_no = $request->id_no[$i];
    		$data->marks = $request->marks[$i];
    		$data->save();

    		}
    	}
    	return redirect()->back();
    }

	// Marks Edit

	public function MarksEdit(){
    	$data['session'] = StudentSession::all();
    	$data['class'] = StudentClass::all();
    	$data['exam'] = StudentExam::all();

    	return view('backend.main-section.page.exam.marks.marks_edit',$data);
    }

	public function MarksEditGetStudents(Request $request){
    	$session_id = $request->session_id;
    	$class_id = $request->class_id;
    	$assign_subject_id = $request->assign_subject_id;
    	$exam_id = $request->exam_id;

    	$getStudent = StudentMarks::with(['st_name'])->where('session_id',$session_id)->where('class_id',$class_id)->where('assign_subject_id',$assign_subject_id)->where('exam_id',$exam_id)->get();

    	return response()->json($getStudent);
    }

	public function MarksUpdate(Request $request){

		StudentMarks::where('session_id',$request->session_id)->where('class_id',$request->class_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_id',$request->exam_id)->delete();
	
			$studentcount = $request->student_id;
			if ($studentcount) {
				for ($i=0; $i <count($request->student_id) ; $i++) { 
				$data = New StudentMarks();
				$data->session_id = $request->session_id;
				$data->class_id = $request->class_id;
				$data->assign_subject_id = $request->assign_subject_id;
				$data->exam_id = $request->exam_id;
				$data->student_id = $request->student_id[$i];
				$data->id_no = $request->id_no[$i];
				$data->marks = $request->marks[$i];
				$data->save();
	
				}
			}
			return redirect()->back();
		}
}
