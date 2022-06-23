<?php

namespace App\Http\Controllers\Backend\System\Result\Designation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Result\Designation\Designation;
use Illuminate\Support\Facades\Validator;

class DesignationController extends Controller
{
    public function DsView()
    {
      $data['allData'] = Designation::all();
      return view('backend.main-section.page.system.result.designation.ds_view',$data);
    }

    public function fetchdesignation()
         {
             $all = Designation::all();
             return response()->json([
                 'designation'=>$all,
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
                 $data = new Designation();
                 $data->name = $request->input('name');
                 $data->save();
                 return response()->json([
                     'status'=>200,
                     'message'=>'Designation Added Successfully.'
                 ]);
             }
     
         }
     
         public function edit($id)
         {
             $designation = Designation::find($id);
             if($designation)
             {
                 return response()->json([
                     'status'=>200,
                     'designation'=> $designation,
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
                 $designation = Designation::find($id);
                 if($designation)
                 {
                 $designation->name = $request->input('name');
                 $designation->update();
                 return response()->json([
                     'status'=>200,
                     'message'=>'Designation Edit Successfully.'
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
             $all = Designation::find($id);
             if($all)
             {
                 $all->delete();
                 return response()->json([
                     'status'=>200,
                     'message'=>'Exam Deleted Successfully.'
                 ]);
             }
             else
             {
                 return response()->json([
                     'status'=>404,
                     'message'=>'No Exam Found.'
                 ]);
             }
         }
}
