<?php

namespace App\Http\Controllers\Backend\System\Result\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Result\Type\Type;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    public function TypeView()
    {
        $data ['allData'] = Type::all();
        return view('backend.main-section.page.system.result.type.type_view',$data);
    }

        //-------------------------------------------Ajax----------------------------------------------

 
        public function fetchtype()
        {
            $all = Type::all();
            return response()->json([
                'type'=>$all,
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
                $data = new Type();
                $data->name = $request->input('name');
                $data->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Type Added Successfully.'
                ]);
            }
    
        }
    
        public function edit($id)
        {
            $type = Type::find($id);
            if($type)
            {
                return response()->json([
                    'status'=>200,
                    'type'=> $type,
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Type Found.'
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
                $type = Type::find($id);
                if($type)
                {
                $type->name = $request->input('name');
                $type->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Type Edit Successfully.'
                ]);
    
                }
                else
                {
                    return response()->json([
                        'status'=>404,
                        'message'=>'No Type Found.'
                    ]);
                }
            }
    
    
        }
    
    
        public function destroy($id)
        {
            $all = Type::find($id);
            if($all)
            {
                $all->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'Type Deleted Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Type Found.'
                ]);
            }
        }
}
