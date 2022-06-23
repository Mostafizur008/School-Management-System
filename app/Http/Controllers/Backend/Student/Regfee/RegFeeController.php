<?php

namespace App\Http\Controllers\Backend\Student\Regfee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\FeeAmount\FeeAmount;
use App\Models\Student\AssignStudent\AssignStudent;
use App\Models\Student\DiscountStudent\DiscountStudent;
use App\Models\User;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Session\StudentSession;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Setup\Shift\StudentShift;
use DB;
use PDF;

class RegFeeController extends Controller
{
    public function RegFeeView()
    {
        $data ['class'] = StudentClass::all();
        $data ['session'] = StudentSession::all();

        return view('backend.main-section.page.student.reg.fee_view',$data);
    }

    public function RegFeeClassData(Request $request){
        $session_id = $request->session_id;
        $class_id = $request->class_id;
        if ($session_id !='') {
            $where[] = ['session_id','like',$session_id.'%'];
        }
        if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
        }
        $allStudent = AssignStudent::with(['ds_name'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Reg Fee</th>';
        $html['thsource'] .= '<th>Discount </th>';
        $html['thsource'] .= '<th>Student Fee </th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($allStudent as $key => $v) {
            $registrationfee = FeeAmount::where('fee_category_id','1')->where('class_id',$v->class_id)->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['st_name']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['st_name']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['ds_name']['discount'].'%'.'</td>';
            
            $originalfee = $registrationfee->amount;
            $discount = $v['ds_name']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.'BDT.'.$finalfee.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.registration.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'">Invoice</a>';
            $html[$key]['tdsource'] .= '</td>';

        }  
       return response()->json(@$html);

   }// end method 





   public function RegFeePayslip(Request $request){
       $student_id = $request->student_id;
       $class_id = $request->class_id;

       $allStudent['detail'] = AssignStudent::with(['st_name','ds_name'])->where('student_id',$student_id)->where('class_id',$class_id)->first();

       $pdf = PDF::loadView('backend.main-section.page.student.reg.fee_detail_pdf', $allStudent);
       return  $pdf->stream('invoice.pdf');

   }
}
