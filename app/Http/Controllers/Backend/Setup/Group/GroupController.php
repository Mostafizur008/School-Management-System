<?php

namespace App\Http\Controllers\Backend\Setup\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup\Group\StudentGroup;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    public function GroupView()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.main-section.page.setup.group.group_view',$data);
    }

    public function GroupAdd()
    {
        return view('backend.page.setup.group.group_add');
    }
    public function GroupStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);
        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('group.view');
    }
    public function GroupEdit($id)
    {
        $editData = StudentGroup::find($id);
        return view('backend.page.setup.group.group_edit',compact('editData'));
    }

    public function GroupUpdate(Request $request,$id)
    {
        $data = StudentGroup::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('group.view');
    }
    public function GroupDelete($id)
    {
        $user = StudentGroup::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('group.view')->with($notification);
    }

        //-------------------------------------------Ajax----------------------------------------------

 
        public function fetchgroup()
        {
            $all = StudentGroup::all();
            return response()->json([
                'group'=>$all,
            ]);
        }
    
        public function Store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name'=> 'required|max:191',
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
                $data = new StudentGroup();
                $data->name = $request->input('name');
                $data->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Group Added Successfully.'
                ]);
            }
    
        }
    
        public function edit($id)
        {
            $group = StudentGroup::find($id);
            if($group)
            {
                return response()->json([
                    'status'=>200,
                    'group'=> $group,
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Session Found.'
                ]);
            }
    
        }
    
        public function update(Request $request, $id)
        {
           
            $validator = Validator::make($request->all(), [
                'name'=> 'required|max:191',
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
                $group = StudentGroup::find($id);
                if($group)
                {
                $group->name = $request->input('name');
                $group->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Group Edit Successfully.'
                ]);
    
                }
                else
                {
                    return response()->json([
                        'status'=>404,
                        'message'=>'No Group Found.'
                    ]);
                }
            }
    
    
        }
    
    
        public function destroy($id)
        {
            $all = StudentGroup::find($id);
            if($all)
            {
                $all->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'Group Deleted Successfully.'
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
