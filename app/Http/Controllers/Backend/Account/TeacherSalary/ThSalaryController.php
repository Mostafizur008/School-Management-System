<?php

namespace App\Http\Controllers\Backend\Account\TeacherSalary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account\Teacher\AccountTeacherSalary;
use App\Models\Teacher\TeacherLog;
use App\Models\System\Result\Designation\Designation;
use App\Models\Teacher\Attendance\TeacherAttendance;

class ThSalaryController extends Controller
{
    public function TeacherSalaryView(){

    	$data['allData'] = AccountTeacherSalary::all();
    	return view('backend.main-section.page.account.teacher_salary.view',$data);

    }


    public function TeacherSalaryAdd(){

      return view('backend.main-section.page.account.teacher_salary.add');
    }
 

    public function TeacherSalaryGetTeacher(Request $request){

    	$date = date('Y-m',strtotime($request->date));
    	 if ($date !='') {
    	 	$where[] = ['date','like',$date.'%'];
    	    }
    	 
    	 $data = TeacherAttendance::select('teacher_id')->groupBy('teacher_id')->with(['user'])->where($where)->get();
    	 // dd($allStudent);
    	 $html['thsource']  = '<th>SL</th>';
    	 $html['thsource'] .= '<th>ID NO</th>';
    	 $html['thsource'] .= '<th>Teacher Name</th>';
    	 $html['thsource'] .= '<th>Basic Salary</th>';
    	 $html['thsource'] .= '<th>Salary This Month</th>';
    	 $html['thsource'] .= '<th>Select</th>';


    	 foreach ($data as $key => $attend) {

    	 	$account_salary = AccountTeacherSalary::where('teacher_id',$attend->teacher_id)->where('date',$date)->first();

    	 	if($account_salary !=null) {
			 	$checked = 'checked';
			 }else{
			 	$checked = '';
			 }   

    	 	$totalattend = TeacherAttendance::with(['user'])->where($where)->where('teacher_id',$attend->teacher_id)->get();
    	 	$absentcount = count($totalattend->where('attend_status','Absent'));

    	 	 
 	$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['th_id_no'].'<input type="hidden" name="date" value="'.$date.'" >'.'</td>';

 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';
 	 
 	
 	$salary = (float)$attend['user']['salary'];
 	$salaryperday = (float)$salary/30;
 	$totalsalaryminus = (float)$absentcount*(float)$salaryperday;
 	$totalsalary = (float)$salary-(float)$totalsalaryminus;

 	$html[$key]['tdsource'] .='<td>'.$totalsalary.'<input type="hidden" name="amount[]" value="'.$totalsalary.'" >'.'</td>';

 	 
 	$html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="teacher_id[]" value="'.$attend->teacher_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>'; 
            }
    	return response()->json(@$html);

    }



    public function TeacherSalaryStore(Request $request){

    	$date = date('Y-m', strtotime($request->date));

    	AccountTeacherSalary::where('date',$date)->delete();

    	$checkdata = $request->checkmanage;

    	if ($checkdata !=null) {
    		for ($i=0; $i <count($checkdata) ; $i++) { 
    			$data = new AccountTeacherSalary(); 
    			$data->date = $date; 
    			$data->teacher_id = $request->teacher_id[$checkdata[$i]];
    			$data->amount = $request->amount[$checkdata[$i]];
    			$data->save();
    		} 
    	} // end if 

    	if (!empty(@$data) || empty($checkdata)) {

    	$notification = array(
    		'message' => 'Well Done Data Successfully Updated',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('th.salary.view')->with($notification);
    	}else{

    		$notification = array(
    		'message' => 'Sorry Data not Saved',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);

    	} 

    }
}
