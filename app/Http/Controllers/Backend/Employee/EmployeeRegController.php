<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Dependance\{Country, District, Upazila};
use App\Models\System\Result\Type\Type;
use App\Models\System\Result\Institution\Institution;
use App\Models\System\Result\Passing\Passing;
use App\Models\System\Result\Designation\Designation;
use App\Models\User;
use App\Models\Employee\EmployeeLog;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use DB;
use PDF;


class EmployeeRegController extends Controller
{
    public function EmView()
    {
        $data ['allData'] = User::where('usertype','Employee')->get();
        return view('backend.main-section.page.employee.employee_view',$data);
    }

    // Dependence Country
    public function fetchDistrict(Request $request)
    {
        $data['districts'] = District::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchUpazila(Request $request)
    {
        $data['upazilas'] = Upazila::where("district_id",$request->district_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function EmAdd()
    {
        $designation = Designation::all();
        $type = Type::all();
        $institution = Institution::all();
        $passing = Passing::all();
        $country = Country::get(["name", "id"]);
        $roles = Role::all();
        return view('backend.main-section.page.employee.employee_add',compact('roles','designation','type','institution','passing','country'));
    }

    public function EmRegStore(Request $request)
    {
        DB::transaction(function() use($request) {
            $checkYear = date('Ym',strtotime($request->join_date));
            $employee = User::where('usertype','Employee')->orderBy('id','DESC')->first();

            if($employee == NULL)
            {
                $firstReg = 0;
                $employeeId = $firstReg+1;

                if($employeeId < 10)
                {
                    $em_id_no = '000' .$employeeId;
                }elseif ($employeeId < 100)
                {
                    $em_id_no = '00'.$employeeId;
                }elseif ($employeeId < 1000)
                {
                    $em_id_no = '0'.$employeeId;
                }
                }else{
                    $employee = User::where('usertype','Employee')->orderBy('id','DESC')->first()->id;
                    $employeeId = $employee+1;
                    if($employeeId < 10)
                    {
                        $em_id_no = '000' .$employeeId;
                    }elseif ($employeeId < 100)
                    {
                        $em_id_no = '00'.$employeeId;
                    }elseif ($employeeId < 1000)
                    {
                        $em_id_no = '0'.$employeeId;
                    }
            }

            $final_em_id_no = $checkYear.$em_id_no;
            $employee = new User();
            $code = rand(0000,9999);
            $employee->em_id_no = $final_em_id_no;
            $employee->password = bcrypt($code);
            $employee->usertype = 'employee';
            $employee->code = $code;
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->name = $request->name;
            $employee->fathers_name = $request->fathers_name;
            $employee->mothers_name = $request->mothers_name;
            $employee->gender = $request->gender;
            $employee->dob = date('Y-m-d',strtotime($request->dob));
            $employee->join_date = date('Y-m-d',strtotime($request->join_date));
            $employee->religion = $request->religion;
            $employee->marital = $request->marital;
            $employee->nationality = $request->nationality;
            $employee->district = $request->district;
            $employee->nid = $request->nid;
            $employee->salary = $request->salary;
            $employee->designation_id = $request->designation_id;
            $employee->mobile = $request->mobile;
            $employee->address = $request->address;
            $employee->country= $request->country;
            $employee->city = $request->city;
            $employee->zip_code = $request->zip_code;
            $employee->type_1 = $request->type_1;
            $employee->type_2 = $request->type_2;
            $employee->type_3 = $request->type_3;
            $employee->type_4 = $request->type_4;
            $employee->institution_1 = $request->institution_1;
            $employee->institution_2 = $request->institution_2;
            $employee->institution_3 = $request->institution_3;
            $employee->institution_4 = $request->institution_4;
            $employee->passing_1 = $request->passing_1;
            $employee->passing_2 = $request->passing_2;
            $employee->passing_3 = $request->passing_3;
            $employee->passing_4 = $request->passing_4;
            $employee->point_1 = $request->point_1;
            $employee->point_2 = $request->point_2;
            $employee->point_3 = $request->point_3;
            $employee->point_4 = $request->point_4;
            $employee->roll_4 = $request->roll_4;
            $employee->roll_1 = $request->roll_1;
            $employee->roll_2 = $request->roll_2;
            $employee->roll_3 = $request->roll_3;
            $employee->email = $request->email;

            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('backend/all-images/database/employee'),$filename);
                $employee['image'] = $filename;
            }

            if ($request->roles) {
                $employee->assignRole($request->roles);
             }
     
            $employee->save();

            $employee_salary = new EmployeeLog();
            $employee_salary->employee_id = $employee->id;
            $employee_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary ='0';
            $employee_salary->save();

        });

        return redirect()->route('emp.view');

    }

    public function EmEdit($id)
    {
        $data ['editData'] = User::find($id);
        $data ['type'] = Type::all();
        $data ['institution'] = Institution::all();
        $data ['passing'] = Passing::all();
        $data ['designation'] = Designation::all();
        $data ['ct'] = Country::get(["name", "id"]);
        $data ['roles'] = Role::all();
        return view('backend.main-section.page.employee.employee_edit',$data);
    }

    public function EmUpdate(Request $request,$id)
    {
            $employee = User::find($id);
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->name = $request->name;
            $employee->fathers_name = $request->fathers_name;
            $employee->mothers_name = $request->mothers_name;
            $employee->gender = $request->gender;
            $employee->dob = date('Y-m-d',strtotime($request->dob));
            $employee->join_date = date('Y-m-d',strtotime($request->join_date));
            $employee->religion = $request->religion;
            $employee->marital = $request->marital;
            $employee->nationality = $request->nationality;
            $employee->district = $request->district;
            $employee->nid = $request->nid;
            $employee->salary = $request->salary;
            $employee->designation_id = $request->designation_id;
            $employee->mobile = $request->mobile;
            $employee->address = $request->address;
            $employee->country= $request->country;
            $employee->city = $request->city;
            $employee->zip_code = $request->zip_code;
            $employee->type_1 = $request->type_1;
            $employee->type_2 = $request->type_2;
            $employee->type_3 = $request->type_3;
            $employee->type_4 = $request->type_4;
            $employee->institution_1 = $request->institution_1;
            $employee->institution_2 = $request->institution_2;
            $employee->institution_3 = $request->institution_3;
            $employee->institution_4 = $request->institution_4;
            $employee->passing_1 = $request->passing_1;
            $employee->passing_2 = $request->passing_2;
            $employee->passing_3 = $request->passing_3;
            $employee->passing_4 = $request->passing_4;
            $employee->point_1 = $request->point_1;
            $employee->point_2 = $request->point_2;
            $employee->point_3 = $request->point_3;
            $employee->point_4 = $request->point_4;
            $employee->roll_4 = $request->roll_4;
            $employee->roll_1 = $request->roll_1;
            $employee->roll_2 = $request->roll_2;
            $employee->roll_3 = $request->roll_3;
            $employee->email = $request->email;


            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('backend/all-images/database/employee'.$data->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('backend/all-images/database/employee'),$filename);
                $employee['image'] = $filename;
            }
     
            $employee->save();

        return redirect()->route('emp.view');
    }

    public function destroy($id)
    {
        $all = User::find($id);
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


    public function EmDetail($id)
    {
        $data ['detail'] = User::find($id);
        $pdf = PDF::loadView('backend.main-section.page.employee.employee_detaill_pdf', $data);
        return  $pdf->stream('Employee-Detail.pdf');
    }

    // Teacher Id Card Section ----------------------------

    public function IdView(){
    	$data['employee'] = User::all();
        return view('backend.main-section.page.employee.id_card.id',$data);
    }

    public function IdGet(Request $request){

    	$em_id_no = $request->em_id_no;
        
    
    $singleEmployee = User::where('em_id_no',$em_id_no)->first();
    if ($singleEmployee == true) {
    
    $data ['allData'] = User::where('em_id_no',$em_id_no)->get();

    $pdf = PDF::loadView('backend.main-section.page.employee.id_card.id_detail',$data)->setPaper('A4');
    return  $pdf->stream('id.pdf');

    }else{
    	return redirect()->back();
       }
    } 
}
