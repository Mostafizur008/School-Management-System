<?php

namespace App\Http\Controllers\Backend\Teacher\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher\Teacher;
use App\Models\System\Result\Designation\Designation;
use App\Models\Teacher\Reg\TeacherLog;
use App\Models\Teacher\Leave\TeacherLeave;
use App\Models\Teacher\Leave\LeavePurpose;
use App\Models\Teacher\Attendance\TeacherAttendance;
use DB;
use PDF;

class AttendanceController extends Controller
{
    public function AttendanceView(){
        $data['allData'] = TeacherAttendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();
        return view('backend.main-section.page.teacher.attendance.attendance_view',$data);
    }

    public function AttendanceAdd(){
    	$data['teacher'] = User::where('usertype','teacher')->get();
    	return view('backend.main-section.page.teacher.attendance.attendance_add',$data);

    }

    public function AttendanceStore(Request $request){

    	TeacherAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
    	$countuser = count($request->teacher_id);
    	for ($i=0; $i <$countuser ; $i++) { 
    		$attend_status = 'attend_status'.$i;
    		$attend = new TeacherAttendance();
    		$attend->date = date('Y-m-d',strtotime($request->date));
    		$attend->teacher_id = $request->teacher_id[$i];
    		$attend->attend_status = $request->$attend_status;
    		$attend->save();
    	}
    	return redirect()->route('attendance.view');
    }

    public function AttendanceEdit($date){
    	$data['editData'] = TeacherAttendance::where('date',$date)->get();
    	$data['teacher'] = User::where('usertype','teacher')->get();
    	return view('backend.main-section.page.teacher.attendance.attendance_edit',$data);
    }

    public function AttendanceDetail($date){
    	$data['detail'] = TeacherAttendance::where('date',$date)->get();
    	$pdf = PDF::loadView('backend.main-section.page.teacher.attendance.attendance_detail_pdf', $data);
        return  $pdf->stream('attendance.pdf');

    }
}
