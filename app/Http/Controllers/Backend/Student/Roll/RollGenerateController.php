<?php

namespace App\Http\Controllers\Backend\Student\Roll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\AssignStudent\AssignStudent;
use App\Models\Student\DiscountStudent\DiscountStudent;
use App\Models\User;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Session\StudentSession;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Setup\Shift\StudentShift;
use DB;
use PDF;

class RollGenerateController extends Controller
{
    public function RollView()
    {
        $data ['class'] = StudentClass::all();
        $data ['session'] = StudentSession::all();

        return view('backend.main-section.page.student.roll.roll_view',$data);
    }

    public function GetStudent(Request $request)
    {
        $allData = AssignStudent::with(['st_name'])->where('class_id',$request->class_id)->where('session_id',$request->session_id)->get();

        return response()->json($allData);
    }

    public function RollStore(Request $request)
    {
        $class_id = $request->class_id;
        $session_id = $request->session_id;

        if($request->student_id !=null)
        {
            for ($i=0; $i < count($request->student_id); $i++)
            {
                AssignStudent::where('class_id',$class_id)->where('session_id',$session_id)->where('student_id',$request->student_id[$i])->update(['roll'=>$request->roll[$i]]);
            } //End lop
        }else{

            //tostrr Notification

            return redirect()->back();
        }

        return redirect()->route('roll.generate');
        
    } // End Method

}
