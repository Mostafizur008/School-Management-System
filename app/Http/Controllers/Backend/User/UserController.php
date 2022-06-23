<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\System\Dependance\{Country, District, Upazila};
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function UserView()
    {
        $allData = User::all();
        $all = User::all();
        $roles = Role::all();
        $data = Country::get(["name", "id"]);
        return view('backend.main-section.page.user.user_view',compact('allData','all','roles','data'));
    }

    public function UserAdd()
    {
        $roles = Role::all();
        $data = Country::get(["name", "id"]);
        return view('backend.main-section.page.user.user_add',compact('roles','data'));
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

    public function UserStore(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);
        $data = new User();
        $code = rand(0000,9999);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->dob = date('Y-m-d',strtotime($request->dob));
        $data->mobile = $request->mobile;
        $data->nid = $request->nid;
        $data->marital = $request->marital;
        $data->religion = $request->religion;
        $data->address = $request->address;
        $data->upazila = $request->upazila;
        $data->district = $request->district;
        $data->country = $request->country;
        $data->city = $request->city;
        $data->zip_code = $request->zip_code;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code;

        if($request->file('image'))
        {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('backend/img/user/'),$filename);
            $data['image'] = $filename;
        }

        if ($request->roles) {
            $data->assignRole($request->roles);
        }

        $data->save();

        return redirect()->route('user.view');
    }

    public function UserEdit($id)
    {
        $editData = User::find($id);
        return view('backend.page.user.user_edit',compact('editData'));
    }
    
    public function UserUpdate(Request $request,$id)
    {
        $data = User::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->name = $request->name;
        $data->fathers_name = $request->fathers_name;
        $data->mothers_name = $request->mothers_name;
        $data->gender = $request->gender;
        $data->dob = date('Y-m-d',strtotime($request->dob));
        $data->mobile = $request->mobile;
        $data->religion = $request->religion;
        $data->address = $request->address;
        $data->country = $request->country;
        $data->city = $request->city;
        $data->zip_code = $request->zip_code;
        $data->email = $request->email;
        $data->role = $request->role;
        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink(public_path('backend/img/user/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('backend/img/user/'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Delete Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('user.view')->with($notification);
    }


    //-------------------------------------------Ajax----------------------------------------------

 
    public function fetchuser()
    {
        $all = User::all();
        return response()->json([
            'users'=>$all,
        ]);
    }

    public function Store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'=> 'required|max:191',
            'last_name'=>'required|max:191',
            'name'=>'required|max:191',
            'gender'=>'required',
            'dob'=> 'required|max:191',
            'mobile'=>'required|max:191',
            'nid'=> 'required|max:191',
            'marital'=> 'required|max:191',
            'religion'=> 'required|max:191',
            'address'=>'required|max:191',
            'upazila'=> 'required|max:191',
            'district'=> 'required|max:191',
            'country'=>'required',
            'city'=> 'required|max:191',
            'zip_code'=>'required|max:191',
            'email'=>'required|email|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $data = new User();
            $code = rand(0000,9999);
            $data->first_name = $request->input('first_name');
            $data->last_name = $request->input('last_name');
            $data->name = $request->input('name');
            $data->fathers_name = $request->input('fathers_name');
            $data->mothers_name = $request->input('mothers_name');
            $data->gender = $request->input('gender');
            $data->dob = date('Y-m-d',strtotime ($request->input('dob')));
            $data->mobile = $request->input('mobile');
            $data->nid = $request->input('nid');
            $data->marital = $request->input('marital');
            $data->religion = $request->input('religion');
            $data->address = $request->input('address');
            $data->upazila = $request->input('upazila');
            $data->district = $request->input('district');
            $data->country = $request->input('country');
            $data->city = $request->input('city');
            $data->zip_code = $request->input('zip_code');
            $data->email = $request->input('email');
            $data->password = bcrypt($code);
            $data->code = $code;
            if ($request->roles) {
                $data->assignRole($request->roles);
            }
            $data->save();
            return response()->json([
                'status'=>200,
                'message'=>'User Added Successfully.'
            ]);
        }

    }

    public function edit($id)
    {
        $user = User::find($id);
        if($user)
        {
            return response()->json([
                'status'=>200,
                'user'=> $user,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No User Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'first_name'=> 'required|max:191',
            'last_name'=>'required|max:191',
            'name'=>'required|max:191',
            'gender'=>'required',
            'dob'=> 'required|max:191',
            'mobile'=>'required|max:191',
            'religion'=>'required|max:191',
            'nid'=> 'required|max:191',
            'marital'=> 'required|max:191',
            'address'=>'required|max:191',
            'upazila'=> 'required|max:191',
            'district'=> 'required|max:191',
            'country'=>'required',
            'city'=> 'required|max:191',
            'zip_code'=>'required|max:191',
            'email'=>'required|email|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $user = User::find($id);
            if($user)
            {
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->name = $request->input('name');
            $user->fathers_name = $request->input('fathers_name');
            $user->mothers_name = $request->input('mothers_name');
            $user->gender = $request->input('gender');
            $user->dob = date('Y-m-d',strtotime ($request->input('dob')));
            $user->mobile = $request->input('mobile');
            $user->religion = $request->input('religion');
            $user->nid = $request->input('nid');
            $user->marital = $request->input('marital');
            $user->address = $request->input('address');
            $user->country = $request->input('country');
            $user->upazila = $request->input('upazila');
            $user->district = $request->input('district');
            $user->city = $request->input('city');
            $user->zip_code = $request->input('zip_code');
            $user->email = $request->input('email');
            $user->roles()->detach();
            if ($request->roles) {
                $user->assignRole($request->roles);
            }
            $user->update();
            return response()->json([
                'status'=>200,
                'message'=>'User Edit Successfully.'
            ]);

            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No User Found.'
                ]);
            }
        }


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
}
