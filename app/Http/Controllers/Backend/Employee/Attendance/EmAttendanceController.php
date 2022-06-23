<?php

namespace App\Http\Controllers\Backend\Employee\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\System\Result\Designation\Designation;
use App\Models\Employee\Reg\EmployeeLog;
use App\Models\Employee\Leave\EmployeeLeave;
use App\Models\Employee\Leave\EmployeeLeavePurpose;
use App\Models\Employee\Attendance\EmployeeAttendance;
use DB;
use PDF;

class EmAttendanceController extends Controller
{
    public function EmAttendanceView(){
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();
        return view('backend.main-section.page.employee.attendance.attendance_view',$data);
    }

    public function EmAttendanceAdd(){
    	$data['teacher'] = User::where('usertype','Employee')->get();
    	return view('backend.main-section.page.employee.attendance.attendance_add',$data);

    }

    public function EmAttendanceStore(Request $request){

    	EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
    	$countemployee = count($request->employee_id);
    	for ($i=0; $i <$countemployee ; $i++) { 
    		$attend_status = 'attend_status'.$i;
    		$attend = new EmployeeAttendance();
    		$attend->date = date('Y-m-d',strtotime($request->date));
    		$attend->employee_id = $request->employee_id[$i];
    		$attend->attend_status = $request->$attend_status;
    		$attend->save();
    	}
    	return redirect()->route('em.attendance.view');
    }

    public function EmAttendanceEdit($date){
    	$data['editData'] = EmployeeAttendance::where('date',$date)->get();
    	$data['teacher'] = User::where('usertype','Employee')->get();
    	return view('backend.main-section.page.employee.attendance.attendance_edit',$data);
    }

    public function EmAttendanceDetail($date){
    	$data['detail'] = EmployeeAttendance::where('date',$date)->get();
    	$pdf = PDF::loadView('backend.main-section.page.teacher.attendance.attendance_detail_pdf', $data);
        return  $pdf->stream('attendance.pdf');

    }
}
