<?php

namespace App\Http\Controllers\Backend\Teacher\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Result\Designation\Designation;
use App\Models\User;
use App\Models\Teacher\TeacherLog;
use App\Models\Teacher\Attendance\TeacherAttendance;
use DB;
use PDF;

class SalaryController extends Controller
{
    public function MonthlySalaryView(){
    	return view('backend.main-section.page.teacher.monthly_salary.monthly_salary_view');

    }

    public function MonthlySalaryViewGet(Request $request){
		
        $date = date('Y-m',strtotime($request->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }
        
        $data = TeacherAttendance::select('teacher_id')->groupBy('teacher_id')->with(['user'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>ID No</th>';
        $html['thsource'] .= '<th>Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>This Month</th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($data as $key => $attend) {
            $totalattend = TeacherAttendance::with(['user'])->where($where)->where('teacher_id',$attend->teacher_id)->get();
            $absentcount = count($totalattend->where('attend_status','Absent'));

            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.$attend['user']['th_id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.'BDT.'.$attend['user']['salary'].'</td>';
             
            
            $salary = (float)$attend['user']['salary'];
            $salaryperday = (float)$salary/30;
            $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
            $totalsalary = (float)$salary-(float)$totalsalaryminus;

            $html[$key]['tdsource'] .='<td>'.'BDT.' .$totalsalary.'</td>';
            $html[$key]['tdsource'] .='<td style="width: 8%;">';
            $html[$key]['tdsource'] .='<a class="btn btn-xs btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("teacher.monthly.salary.payslip",$attend->teacher_id).'">Invoice</a>';
            $html[$key]['tdsource'] .= '</td>';

        }  
       return response()->json(@$html);
 }

 public function MonthlySalaryPayslip(Request $request,$teacher_id){
    $id = TeacherAttendance::where('teacher_id',$teacher_id)->first();
    $date = date('Y-m',strtotime($id->date));
   if ($date !='') {
       $where[] = ['date','like',$date.'%'];
   }

$data['detail'] = TeacherAttendance::with(['user'])->where($where)->where('teacher_id',$id->teacher_id)->get();	 
$pdf = PDF::loadView('backend.main-section.page.teacher.monthly_salary.monthly_salary_detail_pdf', $data);
return $pdf->stream('monthly_salary.pdf');

}

}
