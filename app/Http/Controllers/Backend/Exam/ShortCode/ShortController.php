<?php

namespace App\Http\Controllers\Backend\Exam\ShortCode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam\Shortcode\ShortCode;
use Illuminate\Support\Facades\Validator;


class ShortController extends Controller
{
    public function ShortView()
    {
        $data['allData'] = ShortCode::all();
        return view('backend.main-section.page.exam.shortcode.code_view',$data);
    }

           //-------------------------------------------Ajax----------------------------------------------

 
           public function fetchshortcode()
           {
               $all = ShortCode::all();
               return response()->json([
                   'shortcode'=>$all,
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
                   $data = new ShortCode();
                   $data->name = $request->input('name');
                   $data->save();
                   return response()->json([
                       'status'=>200,
                       'message'=>'Shortcode Added Successfully.'
                   ]);
               }
       
           }
       
           public function edit($id)
           {
               $shortcode = ShortCode::find($id);
               if($shortcode)
               {
                   return response()->json([
                       'status'=>200,
                       'shortcode'=> $shortcode,
                   ]);
               }
               else
               {
                   return response()->json([
                       'status'=>404,
                       'message'=>'No Shortcode Found.'
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
                   $shortcode = ShortCode::find($id);
                   if($shortcode)
                   {
                   $shortcode->name = $request->input('name');
                   $shortcode->update();
                   return response()->json([
                       'status'=>200,
                       'message'=>'Shortcode Edit Successfully.'
                   ]);
       
                   }
                   else
                   {
                       return response()->json([
                           'status'=>404,
                           'message'=>'No Shortcode Found.'
                       ]);
                   }
               }
       
       
           }
       
       
           public function destroy($id)
           {
               $all = ShortCode::find($id);
               if($all)
               {
                   $all->delete();
                   return response()->json([
                       'status'=>200,
                       'message'=>'Shortcode Deleted Successfully.'
                   ]);
               }
               else
               {
                   return response()->json([
                       'status'=>404,
                       'message'=>'No Shortcode Found.'
                   ]);
               }
           }
    
}
