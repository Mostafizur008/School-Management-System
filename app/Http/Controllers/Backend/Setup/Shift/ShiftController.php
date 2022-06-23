<?php

namespace App\Http\Controllers\Backend\Setup\Shift;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup\Shift\StudentShift;
use Illuminate\Support\Facades\Validator;

class ShiftController extends Controller
{
    public function ShiftView()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.main-section.page.setup.shift.shift_view',$data);
    }

    public function ShiftAdd()
    {
        return view('backend.page.setup.shift.shift_add');
    }
    public function ShiftStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);
        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('shift.view');
    }
    public function ShiftEdit($id)
    {
        $editData = StudentShift::find($id);
        return view('backend.page.setup.shift.shift_edit',compact('editData'));
    }

    public function ShiftUpdate(Request $request,$id)
    {
        $data = StudentShift::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('shift.view');
    }
    public function ShiftDelete($id)
    {
        $user = StudentShift::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('shift.view')->with($notification);
    }


         //-------------------------------------------Ajax----------------------------------------------

 
         public function fetchshift()
         {
             $all = StudentShift::all();
             return response()->json([
                 'shift'=>$all,
             ]);
         }
     
         public function Store(Request $request)
         {
             $validator = Validator::make($request->all(), [
                 'name'=> 'required|max:191',
                 'start'=> 'max:191',
                 'end'=> 'max:191',
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
                 $data = new StudentShift();
                 $data->name = $request->input('name');
                 $data->start = $request->input('start');
                 $data->end = $request->input('end');
                 $data->save();
                 return response()->json([
                     'status'=>200,
                     'message'=>'Shift Added Successfully.'
                 ]);
             }
     
         }
     
         public function edit($id)
         {
             $shift = StudentShift::find($id);
             if($shift)
             {
                 return response()->json([
                     'status'=>200,
                     'shift'=> $shift,
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
                 'start'=> 'max:191',
                 'end'=> 'max:191',
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
                 $shift = StudentShift::find($id);
                 if($shift)
                 {
                 $shift->name = $request->input('name');
                 $shift->start = $request->input('start');
                 $shift->end = $request->input('end');
                 $shift->update();
                 return response()->json([
                     'status'=>200,
                     'message'=>'Shift Edit Successfully.'
                 ]);
     
                 }
                 else
                 {
                     return response()->json([
                         'status'=>404,
                         'message'=>'No Class Found.'
                     ]);
                 }
             }
     
     
         }
     
     
         public function destroy($id)
         {
             $all = StudentShift::find($id);
             if($all)
             {
                 $all->delete();
                 return response()->json([
                     'status'=>200,
                     'message'=>'Shift Deleted Successfully.'
                 ]);
             }
             else
             {
                 return response()->json([
                     'status'=>404,
                     'message'=>'No Shift Found.'
                 ]);
             }
         }

}
