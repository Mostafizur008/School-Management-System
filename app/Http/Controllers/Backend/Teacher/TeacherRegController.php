<?php

namespace App\Http\Controllers\Backend\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Dependance\{Country, District, Upazila};
use App\Models\System\Result\Type\Type;
use App\Models\System\Result\Institution\Institution;
use App\Models\System\Result\Passing\Passing;
use App\Models\System\Result\Designation\Designation;
use App\Models\User;
use App\Models\Teacher\Teacher;
use App\Models\Teacher\TeacherLog;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use DB;
use PDF;


class TeacherRegController extends Controller
{
    public function TeacherView()
    {
        $data ['allData'] = User::where('usertype','Teacher')->get();
        return view('backend.main-section.page.teacher.teacher_view',$data);
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

    public function TeacherAdd()
    {
        $designation = Designation::all();
        $type = Type::all();
        $institution = Institution::all();
        $passing = Passing::all();
        $country = Country::get(["name", "id"]);
        $roles = Role::all();
        return view('backend.main-section.page.teacher.teacher_add',compact('roles','designation','type','institution','passing','country'));
    }

    public function TeacherRegStore(Request $request)
    {
        DB::transaction(function() use($request) {
            $checkYear = date('Ym',strtotime($request->join_date));
            $teacher = User::where('usertype','teacher')->orderBy('id','DESC')->first();

            if($teacher == NULL)
            {
                $firstReg = 0;
                $teacherId = $firstReg+1;

                if($teacherId < 10)
                {
                    $th_id_no = '000' .$teacherId;
                }elseif ($teacherId < 100)
                {
                    $th_id_no = '00'.$teacherId;
                }elseif ($teacherId < 1000)
                {
                    $th_id_no = '0'.$teacherId;
                }
                }else{
                    $teacher = User::where('usertype','teacher')->orderBy('id','DESC')->first()->id;
                    $teacherId = $teacher+1;
                    if($teacherId < 10)
                    {
                        $th_id_no = '000' .$teacherId;
                    }elseif ($teacherId < 100)
                    {
                        $th_id_no = '00'.$teacherId;
                    }elseif ($teacherId < 1000)
                    {
                        $th_id_no = '0'.$teacherId;
                    }
            }

            $final_th_id_no = $checkYear.$th_id_no;
            $teacher = new User();
            $code = rand(0000,9999);
            $teacher->th_id_no = $final_th_id_no;
            $teacher->password = bcrypt($code);
            $teacher->usertype = 'Teacher';
            $teacher->code = $code;
            $teacher->first_name = $request->first_name;
            $teacher->last_name = $request->last_name;
            $teacher->name = $request->name;
            $teacher->fathers_name = $request->fathers_name;
            $teacher->mothers_name = $request->mothers_name;
            $teacher->gender = $request->gender;
            $teacher->dob = date('Y-m-d',strtotime($request->dob));
            $teacher->join_date = date('Y-m-d',strtotime($request->join_date));
            $teacher->religion = $request->religion;
            $teacher->marital = $request->marital;
            $teacher->nationality = $request->nationality;
            $teacher->district = $request->district;
            $teacher->nid = $request->nid;
            $teacher->salary = $request->salary;
            $teacher->designation_id = $request->designation_id;
            $teacher->mobile = $request->mobile;
            $teacher->address = $request->address;
            $teacher->country= $request->country;
            $teacher->city = $request->city;
            $teacher->zip_code = $request->zip_code;
            $teacher->type_1 = $request->type_1;
            $teacher->type_2 = $request->type_2;
            $teacher->type_3 = $request->type_3;
            $teacher->type_4 = $request->type_4;
            $teacher->institution_1 = $request->institution_1;
            $teacher->institution_2 = $request->institution_2;
            $teacher->institution_3 = $request->institution_3;
            $teacher->institution_4 = $request->institution_4;
            $teacher->passing_1 = $request->passing_1;
            $teacher->passing_2 = $request->passing_2;
            $teacher->passing_3 = $request->passing_3;
            $teacher->passing_4 = $request->passing_4;
            $teacher->point_1 = $request->point_1;
            $teacher->point_2 = $request->point_2;
            $teacher->point_3 = $request->point_3;
            $teacher->point_4 = $request->point_4;
            $teacher->roll_4 = $request->roll_4;
            $teacher->roll_1 = $request->roll_1;
            $teacher->roll_2 = $request->roll_2;
            $teacher->roll_3 = $request->roll_3;
            $teacher->email = $request->email;

            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('backend/all-images/database/teacher'),$filename);
                $teacher['image'] = $filename;
            }

            if ($request->roles) {
               $teacher->assignRole($request->roles);
            }
     
            $teacher->save();

            $teacher_salary = new TeacherLog();
            $teacher_salary->teacher_id = $teacher->id;
            $teacher_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
            $teacher_salary->previous_salary = $request->salary;
            $teacher_salary->present_salary = $request->salary;
            $teacher_salary->increment_salary ='0';
            $teacher_salary->save();

        });

        return redirect()->route('teacher.view');

    }

    public function TeacherEdit($id)
    {
        $data ['editData'] = User::find($id);
        $data ['type'] = Type::all();
        $data ['institution'] = Institution::all();
        $data ['passing'] = Passing::all();
        $data ['designation'] = Designation::all();
        $data ['ct'] = Country::get(["name", "id"]);
        $data ['roles'] = Role::all();
        return view('backend.main-section.page.teacher.teacher_edit',$data);
    }

    public function TeacherUpdate(Request $request,$id)
    {
            $user = User::find($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->name = $request->name;
            $user->fathers_name = $request->fathers_name;
            $user->mothers_name = $request->mothers_name;
            $user->gender = $request->gender;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->country = $request->country;
            $user->city = $request->city;
            $user->zip_code = $request->zip_code;
            $user->type_1 = $request->type_1;
            $user->type_2 = $request->type_2;
            $user->type_3 = $request->type_3;
            $user->type_4 = $request->type_4;
            $user->institution_1 = $request->institution_1;
            $user->institution_2 = $request->institution_2;
            $user->institution_3 = $request->institution_3;
            $user->institution_4 = $request->institution_4;
            $user->passing_1 = $request->passing_1;
            $user->passing_2 = $request->passing_2;
            $user->passing_3 = $request->passing_3;
            $user->passing_4 = $request->passing_4;
            $user->point_1 = $request->point_1;
            $user->point_2 = $request->point_2;
            $user->point_3 = $request->point_3;
            $user->point_4 = $request->point_4;
            $user->roll_4 = $request->roll_4;
            $user->roll_1 = $request->roll_1;
            $user->roll_2 = $request->roll_2;
            $user->roll_3 = $request->roll_3;
            $user->email = $request->email;

            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('backend/all-images/database/teacher'.$data->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('backend/all-images/database/teacher'),$filename);
                $user['image'] = $filename;
            }
     
            $user->save();

        return redirect()->route('teacher.view');
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


    public function TeacherDetail($id)
    {
        $data ['detail'] = User::find($id);
        $pdf = PDF::loadView('backend.main-section.page.teacher.teacher_detaill_pdf', $data);
        return  $pdf->stream('Teacher-Detail.pdf');
    }

    // Teacher Id Card Section ----------------------------

    public function IdView(){
    	$data['teacher'] = User::all();
        return view('backend.main-section.page.teacher.id_card.id',$data);
    }

    public function IdGet(Request $request){

    	$th_id_no = $request->th_id_no;
        
    
    $singleTeacher = User::where('th_id_no',$th_id_no)->first();
    if ($singleTeacher == true) {
    
    $data ['allData'] = User::where('th_id_no',$th_id_no)->get();

    $pdf = PDF::loadView('backend.main-section.page.teacher.id_card.id_detail',$data)->setPaper('A4');
    return  $pdf->stream('id.pdf');

    }else{
    	return redirect()->back();
       }
    } 
}
