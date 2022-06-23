<?php

namespace App\Http\Controllers\Backend\Employee\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Result\Designation\Designation;
use App\Models\User;
use App\Models\Employee\Reg\EmployeeLog;
use App\Models\Employee\Attendance\EmployeeAttendance;
use DB;
use PDF;

class EmSalaryController extends Controller
{
    public function EmMonthlySalaryView(){
    	return view('backend.main-section.page.employee.monthly_salary.monthly_salary_view');

    }

    public function EmMonthlySalaryViewGet(Request $request){
		
        $date = date('Y-m',strtotime($request->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }
        
        $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>ID No</th>';
        $html['thsource'] .= '<th>Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>This Month</th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($data as $key => $attend) {
            $totalattend = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status','Absent'));

            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.$attend['user']['em_id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.'BDT.'.$attend['user']['salary'].'</td>';
             
            
            $salary = (float)$attend['user']['salary'];
            $salaryperday = (float)$salary/30;
            $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
            $totalsalary = (float)$salary-(float)$totalsalaryminus;

            $html[$key]['tdsource'] .='<td>'.'BDT.' .$totalsalary.'</td>';
            $html[$key]['tdsource'] .='<td style="width: 8%;">';
            $html[$key]['tdsource'] .='<a class="btn btn-xs btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("employee.monthly.salary.payslip",$attend->employee_id).'">Invoice</a>';
            $html[$key]['tdsource'] .= '</td>';

        }  
       return response()->json(@$html);
 }

 public function EmMonthlySalaryPayslip(Request $request,$employee_id){
    $id = EmployeeAttendance::where('employee_id',$employee_id)->first();
    $date = date('Y-m',strtotime($id->date));
   if ($date !='') {
       $where[] = ['date','like',$date.'%'];
   }

$data['detail'] = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$id->employee_id)->get();	 
$pdf = PDF::loadView('backend.main-section.page.employee.monthly_salary.monthly_salary_detail_pdf', $data);
return $pdf->stream('monthly_salary.pdf');

}

}
