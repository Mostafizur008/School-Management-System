<?php

namespace App\Http\Controllers\Backend\Category\FeeCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\FeeCategory\FeeCategory;
use Illuminate\Support\Facades\Validator;

class FeeCategoryController extends Controller
{
    public function CategoryView()
    {
        $data['allData'] = FeeCategory::all();
        return view('backend.main-section.page.category.fee_category.view',$data);
    }

       //-------------------------------------------Ajax----------------------------------------------

 
       public function fetchfeecategory()
       {
           $all = FeeCategory::all();
           return response()->json([
               'feecategory'=>$all,
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
               $data = new FeeCategory();
               $data->name = $request->input('name');
               $data->save();
               return response()->json([
                   'status'=>200,
                   'message'=>'Fee category Added Successfully.'
               ]);
           }
   
       }
   
       public function edit($id)
       {
           $feecategory = FeeCategory::find($id);
           if($feecategory)
           {
               return response()->json([
                   'status'=>200,
                   'feecategory'=> $feecategory,
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
               $feecategory = FeeCategory::find($id);
               if($feecategory)
               {
               $feecategory->name = $request->input('name');
               $feecategory->update();
               return response()->json([
                   'status'=>200,
                   'message'=>'Fee category Edit Successfully.'
               ]);
   
               }
               else
               {
                   return response()->json([
                       'status'=>404,
                       'message'=>'No fee category Found.'
                   ]);
               }
           }
   
   
       }
   
   
       public function destroy($id)
       {
           $all = FeeCategory::find($id);
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
