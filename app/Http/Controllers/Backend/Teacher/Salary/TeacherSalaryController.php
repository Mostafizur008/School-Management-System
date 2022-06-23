<?php

namespace App\Http\Controllers\Backend\Teacher\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher\Teacher;
use App\Models\Teacher\TeacherLog;
use App\Models\System\Result\Designation\Designation;
use DB;
use PDF;

class TeacherSalaryController extends Controller
{
    public function SalaryView()
    {
        $data ['allData'] = User::where('usertype','Teacher')->get();
        return view('backend.main-section.page.teacher.salary.salary_view',$data);
    }


    public function SalaryIncrement($id)
    {
        $data ['editData'] = User::find($id);
        return view('backend.main-section.page.teacher.salary.salary_increment',$data);
    }

    public function SalaryIncrementStore (Request $request,$id)
    {
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary + (float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();

        $salaryData = new TeacherLog();
        $salaryData->teacher_id = $id;
        $salaryData->previous_salary = $previous_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->effected_salary = date('Y-m-d',strtotime($request->effected_salary));
        $salaryData->save();

        return redirect()->route('salary.view');
    }

    public function SalaryDetail($id)
    {
        $data ['detail'] = User::find($id);
        $data ['salary_id'] = Teacherlog::where('teacher_id',$data['detail']->id)->get();
        $pdf = PDF::loadView('backend.main-section.page.teacher.salary.salary_detail_pdf', $data);
        return  $pdf->stream('increment.pdf');
    }

}
