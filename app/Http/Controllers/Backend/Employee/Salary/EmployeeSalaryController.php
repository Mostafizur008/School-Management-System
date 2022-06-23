<?php

namespace App\Http\Controllers\Backend\Employee\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee\EmployeeLog;
use App\Models\System\Result\Designation\Designation;
use DB;
use PDF;

class EmployeeSalaryController extends Controller
{
    public function EmpView()
    {
        $data ['allData'] = User::where('usertype','Employee')->get();
        return view('backend.main-section.page.employee.salary.salary_view',$data);
    }


    public function EmpSalaryIncrement($id)
    {
        $data ['editData'] = User::find($id);
        return view('backend.main-section.page.employee.salary.salary_increment',$data);
    }

    public function EmpSalaryIncrementStore (Request $request,$id)
    {
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary + (float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();

        $salaryData = new EmployeeLog();
        $salaryData->employee_id = $id;
        $salaryData->previous_salary = $previous_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->effected_salary = date('Y-m-d',strtotime($request->effected_salary));
        $salaryData->save();

        return redirect()->route('ems.view');
    }

    public function EmpSalaryDetail($id)
    {
        $data ['detail'] = User::find($id);
        $data ['salary_id'] = Employeelog::where('employee_id',$data['detail']->id)->get();
        $pdf = PDF::loadView('backend.main-section.page.employee.salary.salary_detail_pdf', $data);
        return  $pdf->stream('increment.pdf');
    }

}
