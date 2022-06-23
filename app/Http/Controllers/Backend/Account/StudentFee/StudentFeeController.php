<?php

namespace App\Http\Controllers\Backend\Account\StudentFee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\AssignStudent\AssignStudent;
use App\Models\Category\FeeCategory\FeeCategory;
use App\Models\Student\DiscountStudent\DiscountStudent;
use App\Models\Category\FeeAmount\FeeAmount;
use App\Models\User;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Session\StudentSession;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Setup\Shift\StudentShift;
use App\Models\Exam\Exam\StudentExam;
use App\Models\Account\StudentFee\StudentFee;

class StudentFeeController extends Controller
{
    public function FeeView(){

    	$data['allData'] = StudentFee::all(); 
    	return view('backend.main-section.page.account.studentfee.view',$data);
    }

    public function FeeAdd(){
    	$data['session'] = StudentSession::all();
    	$data['class'] = StudentClass::all();
    	$data['fee_categories'] = FeeCategory::all();
    	return view('backend.main-section.page.account.studentfee.add',$data);
    }

    public function GetStudent(Request $request){

        $session_id = $request->session_id;
        $class_id = $request->class_id;
        $fee_category_id = $request->fee_category_id;
        $date = date('Y-m',strtotime($request->date));    	   
          
   $data = AssignStudent::with(['ds_name'])->where('session_id',$session_id)->where('class_id',$class_id)->get();
          
          $html['thsource']  = '<th>ID No</th>';
          $html['thsource'] .= '<th>Student Name</th>';
          $html['thsource'] .= '<th>Father Name</th>';
          $html['thsource'] .= '<th>Original Fee </th>';
          $html['thsource'] .= '<th>Discount Amount</th>';
          $html['thsource'] .= '<th>Fee (This Student)</th>';
          $html['thsource'] .= '<th>Select</th>';
 
          foreach ($data as $key => $std) {
          $registrationfee = FeeAmount::where('fee_category_id',$fee_category_id)->where('class_id',$std->class_id)->first();
          $accountstudentfees = StudentFee::where('student_id',$std->student_id)->where('session_id',$std->session_id)->where('class_id',$std->class_id)->where('fee_category_id',$fee_category_id)->where('date',$date)->first();
 
         if($accountstudentfees !=null) {
            $checked = 'checked';
           }else{
             $checked = '';
        }  	 	 
      $color = 'success';
      $html[$key]['tdsource']  = '<td>'.$std['st_name']['id_no']. '<input type="hidden" name="fee_category_id" value= " '.$fee_category_id.' " >'.'</td>';
 
      $html[$key]['tdsource']  .= '<td>'.$std['st_name']['name']. '<input type="hidden" name="session_id" value= " '.$std->session_id.' " >'.'</td>';
 
      $html[$key]['tdsource']  .= '<td>'.$std['st_name']['fathers_name']. '<input type="hidden" name="class_id" value= " '.$std->class_id.' " >'.'</td>';
 
      $html[$key]['tdsource']  .= '<td>'.$registrationfee->amount.'<input type="hidden" name="date" value= " '.$date.' " >'.'</td>';
 
      $html[$key]['tdsource'] .= '<td>'.$std['ds_name']['discount'].'%'.'</td>';
   
       $orginalfee = $registrationfee->amount;
       $discount = $std['ds_name']['discount'];
       $discountablefee = $discount/100*$orginalfee;
       $finalfee = (int)$orginalfee-(int)$discountablefee;    	 	 
 
      $html[$key]['tdsource'] .='<td>'. '<input type="text" name="amount[]" value="'.$finalfee.' " class="form-control" readonly'.'</td>';
       
      $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="student_id[]" value="'.$std->student_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>'; 
 
          }  
         return response()->json(@$html);
 
    }

  public function StudentFeeStore(Request $request){
    
    $date = date('Y-m',strtotime($request->date));

    StudentFee::where('session_id',$request->session_id)->where('class_id',$request->class_id)->where('fee_category_id',$request->fee_category_id)->where('date',$request->date)->delete();

    $checkdata = $request->checkmanage;

    if ($checkdata !=null) {
        for ($i=0; $i <count($checkdata) ; $i++) { 
            $data = new StudentFee();
            $data->session_id = $request->session_id;
            $data->class_id = $request->class_id;
            $data->date = $date;
            $data->fee_category_id = $request->fee_category_id;
            $data->student_id = $request->student_id[$checkdata[$i]];
            $data->amount = $request->amount[$checkdata[$i]];
            $data->save();
        } // end for loop
    } // end if 

    if (!empty(@$data) || empty($checkdata)) {

    $notification = array(
        'message' => 'Well Done Data Successfully Updated',
        'alert-type' => 'success'
    );

    return redirect()->route('fee.view')->with($notification);
    }else{

        $notification = array(
        'message' => 'Sorry Data not Saved',
        'alert-type' => 'error'
    );

    return redirect()->back()->with($notification);

    } 

   } 

}
