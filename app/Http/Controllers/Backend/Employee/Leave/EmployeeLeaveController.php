<?php

namespace App\Http\Controllers\Backend\Employee\Leave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\System\Result\Designation\Designation;
use App\Models\Employee\Reg\EmployeeLog;
use App\Models\Employee\Leave\EmployeeLeave;
use App\Models\Employee\Leave\EmployeeLeavePurpose;


class EmployeeLeaveController extends Controller
{
    public function EmpLeaveView()
    {
        $data ['allData'] = EmployeeLeave::orderBy('id','desc')->get();
        return view('backend.main-section.page.employee.leave.leave_view',$data);
    }

    public function EmpLeaveAdd()
    {
        $data ['teachers'] = User::where('usertype','Employee')->get();
        $data ['leave_purpose'] = EmployeeLeavePurpose::all();
        return view('backend.main-section.page.employee.leave.teacher_leave_add',$data);
    }

    public function EmpLeaveStore(Request $request){

    	if ($request->employee_leave_purpose_id == "0") {
    		$employee_leave_purpose = new EmployeeLeavePurpose();
    		$employee_leave_purpose->name = $request->name;
    		$employee_leave_purpose->save();
    		$employee_leave_purpose_id = $employee_leave_purpose->id;
    	}else{
    		$employee_leave_purpose_id = $request->employee_leave_purpose_id;
    	}

    	$data = new EmployeeLeave();
    	$data->employee_id = $request->employee_id;
    	$data->employee_leave_purpose_id = $employee_leave_purpose_id;
    	$data->start_date = date('Y-m-d',strtotime($request->start_date));
    	$data->end_date = date('Y-m-d',strtotime($request->end_date));
    	$data->save();

    	return redirect()->route('emp.leave.view');

    }

    public function EmpLeaveEdit($id){
    	$data['editData'] = EmployeeLeave::find($id);
    	$data['teachers'] = User::where('usertype','Employee')->get();
    	$data['leave_purpose'] = EmployeeLeavePurpose::all();
    	return view('backend.main-section.page.employee.leave.teacher_leave_edit',$data);

    }

    public function EmpLeaveUpdate(Request $request,$id){

		if ($request->employee_leave_purpose_id == "0") {
    		$employee_leave_purpose = new EmployeeLeavePurpose();
    		$employee_leave_purpose->name = $request->name;
    		$employee_leave_purpose->save();
    		$employee_leave_purpose_id = $employee_leave_purpose->id;
    	}else{
    		$employee_leave_purpose_id = $request->employee_leave_purpose_id;
    	}

    	$data = EmployeeLeave::find($id);
    	$data->employee_id = $request->employee_id;
    	$data->employee_leave_purpose_id = $employee_leave_purpose_id;
    	$data->start_date = date('Y-m-d',strtotime($request->start_date));
    	$data->end_date = date('Y-m-d',strtotime($request->end_date));
    	$data->save();

    	return redirect()->route('emp.leave.view');

    }

    public function EmpLeaveDelete($id){
    	$leave = EmployeeLeave::find($id);
    	$leave->delete();

    	return redirect()->route('emp.leave.view');
    }


	public function destroy($id)
    {
        $all = EmployeeLeave::find($id);
        if($all)
        {
            $all->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Student Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Student Found.'
            ]);
        }
    }

}
