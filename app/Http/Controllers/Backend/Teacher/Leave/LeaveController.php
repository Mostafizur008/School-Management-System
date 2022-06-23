<?php

namespace App\Http\Controllers\Backend\Teacher\Leave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\System\Result\Designation\Designation;
use App\Models\Teacher\Reg\TeacherLog;
use App\Models\Teacher\Leave\TeacherLeave;
use App\Models\Teacher\Leave\LeavePurpose;


class LeaveController extends Controller
{
    public function LeaveView()
    {
        $data ['allData'] = TeacherLeave::orderBy('id','desc')->get();
        return view('backend.main-section.page.teacher.leave.leave_view',$data);
    }

    public function LeaveAdd()
    {
        $data ['teachers'] = User::where('usertype','Teacher')->get();
        $data ['leave_purpose'] = LeavePurpose::all();
        return view('backend.main-section.page.teacher.leave.teacher_leave_add',$data);
    }

    public function LeaveStore(Request $request){

    	if ($request->leave_purpose_id == "0") {
    		$leave_purpose = new LeavePurpose();
    		$leave_purpose->name = $request->name;
    		$leave_purpose->save();
    		$leave_purpose_id = $leave_purpose->id;
    	}else{
    		$leave_purpose_id = $request->leave_purpose_id;
    	}

    	$data = new TeacherLeave();
    	$data->teacher_id = $request->teacher_id;
    	$data->leave_purpose_id = $leave_purpose_id;
    	$data->start_date = date('Y-m-d',strtotime($request->start_date));
    	$data->end_date = date('Y-m-d',strtotime($request->end_date));
    	$data->save();

    	return redirect()->route('leave.view');

    }

    public function LeaveEdit($id){
    	$data['editData'] = TeacherLeave::find($id);
    	$data['teachers'] = User::where('usertype','teacher')->get();
    	$data['leave_purpose'] = LeavePurpose::all();
    	return view('backend.main-section.page.teacher.leave.teacher_leave_edit',$data);

    }

    public function LeaveUpdate(Request $request,$id){

    	if ($request->leave_purpose_id == "0") {
    		$leave_purpose = new LeavePurpose();
    		$leave_purpose->name = $request->name;
    		$leave_purpose->save();
    		$leave_purpose_id = $leave_purpose->id;
    	}else{
    		$leave_purpose_id = $request->leave_purpose_id;
    	}

    	$data = TeacherLeave::find($id);
    	$data->teacher_id = $request->teacher_id;
    	$data->leave_purpose_id = $leave_purpose_id;
    	$data->start_date = date('Y-m-d',strtotime($request->start_date));
    	$data->end_date = date('Y-m-d',strtotime($request->end_date));
    	$data->save();

    	return redirect()->route('leave.view');

    }

    public function LeaveDelete($id){
    	$leave = TeacherLeave::find($id);
    	$leave->delete();

    	return redirect()->route('leave.view');
    }


	public function destroy($id)
    {
        $all = TeacherLeave::find($id);
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
