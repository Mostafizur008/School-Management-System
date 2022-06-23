<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Dependance\{Country, District, Upazila};
use App\Models\Student\AssignStudent\AssignStudent;
use App\Models\Student\DiscountStudent\DiscountStudent;
use App\Models\User;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Session\StudentSession;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Setup\Shift\StudentShift;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use PDF;

class StudentRegController extends Controller
{
    public function RegView()
    {
        $data ['class'] = StudentClass::all();
        $data ['session'] = StudentSession::all();
        $data ['session_id'] = StudentSession::orderBy('id','desc')->first()->id;
        $data ['class_id'] = StudentClass::orderBy('id','desc')->first()->id;
        //dd($data['year_id']);
        $data ['mrs'] = AssignStudent::where('session_id',$data['session_id'])->where('class_id',$data['class_id'])->get();
        return view('backend.main-section.page.student.reg_view',$data);
    }

    public function StudentSear(Request $request)
    {
        $data ['class'] = StudentClass::all();
        $data ['session'] = StudentSession::all();
        $data ['session_id'] = $request->session_id;
        $data ['class_id'] = $request->class_id;
        //dd($data['year_id']);
        $data ['mrs'] = AssignStudent::where('session_id',$request->session_id)->where('class_id',$request->class_id)->get();
        return view('backend.main-section.page.student.reg_view',$data);
    }

    public function StudentAdd()
    {
        $data ['class'] = StudentClass::all();
        $data ['session'] = StudentSession::all();
        $data ['group'] = StudentGroup::all();
        $data ['shift'] = StudentShift::all();
        $data ['country'] = Country::get(["name", "id"]);
        $data ['roles'] = Role::all();
        return view('backend.main-section.page.student.student_add',$data);
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

    public function RegStore(Request $request)
    {
        DB::transaction(function() use($request) {
            $checkYear = StudentSession::find($request->session_id)->name;
            $student = User::where('usertype','Student')->orderBy('id','DESC')->first();

            if($student == NULL)
            {
                $firstReg = 0;
                $studentId = $firstReg+1;

                if($studentId < 10)
                {
                    $id_no = '000' .$studentId;
                }elseif ($studentId < 100)
                {
                    $id_no = '00'.$studentId;
                }elseif ($studentId < 1000)
                {
                    $id_no = '0'.$studentId;
                }
                }else{
                    $student = User::where('usertype','Student')->orderBy('id','DESC')->first()->id;
                    $studentId = $student+1;
                    if($studentId < 10)
                    {
                        $id_no = '000' .$studentId;
                    }elseif ($studentId < 100)
                    {
                        $id_no = '00'.$studentId;
                    }elseif ($studentId < 1000)
                    {
                        $id_no = '0'.$studentId;
                    }
            }

            $final_id_no = $checkYear.$id_no;
            $student = new User();
            $code = rand(0000,9999);
            $student->id_no = $final_id_no;
            $student->password = bcrypt($code);
            $student->usertype = 'Student';
            $student->code = $code;
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->name = $request->name;
            $student->mobile = $request->mobile;
            $student->religion = $request->religion;
            $student->gender = $request->gender;
            $student->dob = date('Y-m-d',strtotime($request->dob));
            $student->fathers_name = $request->fathers_name;
            $student->mothers_name = $request->mothers_name;
            $student->profession_1 = $request->profession_1;
            $student->profession_2 = $request->profession_2;
            $student->mobile_1 = $request->mobile_1;
            $student->nid = $request->nid;
            $student->blood = $request->blood;
            $student->nationality = $request->nationality;
            $student->marital = $request->marital;
            $student->address = $request->address;
            $student->upazila = $request->upazila;
            $student->district = $request->district;
            $student->country = $request->country;
            $student->city = $request->city;
            $student->zip_code = $request->zip_code;
            $student->email = $request->email;

            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('backend/all-images/database/student'),$filename);
                $student['image'] = $filename;
            }

            if ($request->roles) {
                $student->assignRole($request->roles);
            }
     
            $student->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $student->id;
            $assign_student->session_id = $request->session_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id ? : NULL;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_id = '1';
            $discount_student->discount = $request->discount ? : NULL;
            $discount_student->save();
        });

        return redirect()->route('student.reg.view');

    }

    public function RegEdit($student_id)
    {
        $data ['class'] = StudentClass::all();
        $data ['session'] = StudentSession::all();
        $data ['group'] = StudentGroup::all();
        $data ['shift'] = StudentShift::all();
        $data ['country'] = Country::get(["name", "id"]);
        $data ['roles'] = Role::all();
        $data ['editData'] = AssignStudent::with(['st_name','ds_name'])->where('student_id',$student_id)->first();
        return view('backend.main-section.page.student.reg_edit',$data);
    }

    public function RegUpdate(Request $request,$student_id)
    {
        DB::transaction(function() use($request,$student_id) {
           
            $student = User::where('id',$student_id)->first();
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->name = $request->name;
            $student->mobile = $request->mobile;
            $student->religion = $request->religion;
            $student->gender = $request->gender;
            $student->dob = date('Y-m-d',strtotime($request->dob));
            $student->fathers_name = $request->fathers_name;
            $student->mothers_name = $request->mothers_name;
            $student->profession_1 = $request->profession_1;
            $student->profession_2 = $request->profession_2;
            $student->mobile_1 = $request->mobile_1;
            $student->nid = $request->nid;
            $student->blood = $request->blood;
            $student->nationality = $request->nationality;
            $student->marital = $request->marital;
            $student->address = $request->address;
            $student->upazila = $request->upazila;
            $student->district = $request->district;
            $student->country = $request->country;
            $student->city = $request->city;
            $student->zip_code = $request->zip_code;
            $student->email = $request->email;

            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('backend/all-images/database/student/'.$student->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('backend/all-images/database/student'),$filename);
                $student['image'] = $filename;
            }
     
            $student->save();

            $assign_student = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
            $assign_student->session_id = $request->session_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id ? : NULL;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = DiscountStudent::where('assign_student_id',$request->id)->first();
            $discount_student->discount = $request->discount ? : NULL;
            $discount_student->save();
        });

        return redirect()->route('student.reg.view');

    }

    public function StudentPromotion($student_id)
    {
        $data ['class'] = StudentClass::all();
        $data ['session'] = StudentSession::all();
        $data ['group'] = StudentGroup::all();
        $data ['shift'] = StudentShift::all();
        $data ['editData'] = AssignStudent::with(['st_name','ds_name'])->where('student_id',$student_id)->first();
        return view('backend.main-section.page.student.student_promotion',$data);
    }

    public function StudentPromotionUpdate(Request $request,$student_id)
    {
        DB::transaction(function() use($request,$student_id) {
           
            $student = User::where('id',$student_id)->first();
         
           /* $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->gendar = $request->gendar;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->country = $request->country;
            $user->mobile = $request->mobile;
            $user->address = $request->address;*/

            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('backend/all-images/database/student/'.$student->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('backend/all-images/database/student'),$filename);
                $student['image'] = $filename;
            }
     
            $student->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $request->student_id;
            $assign_student->session_id = $request->session_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id ? : NULL;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_id = '1';
            $discount_student->discount = $request->discount ? : NULL;
            $discount_student->save();
        });

        return redirect()->route('student.reg.view');

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

    public function StudentDetail($student_id)
    {
        $data ['detail'] = AssignStudent::with(['st_name','ds_name'])->where('student_id',$student_id)->first();
        $pdf = PDF::loadView('backend.main-section.page.student.student_detail_pdf', $data);
        return  $pdf->stream('Student_detail.pdf');
    }
}
