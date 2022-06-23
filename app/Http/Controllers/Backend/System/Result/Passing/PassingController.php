<?php

namespace App\Http\Controllers\Backend\System\Result\Passing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Result\Passing\Passing;
use Illuminate\Support\Facades\Validator;

class PassingController extends Controller
{
    public function PassingView()
    {
        $data['allData'] = Passing::all();
        return view('backend.main-section.page.system.result.passing.passing_view',$data);
    }

        //-------------------------------------------Ajax----------------------------------------------

 
        public function fetchpassing()
        {
            $all = Passing::all();
            return response()->json([
                'passing'=>$all,
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
                $data = new Passing();
                $data->name = $request->input('name');
                $data->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Passing Added Successfully.'
                ]);
            }
    
        }
    
        public function edit($id)
        {
            $passing = Passing::find($id);
            if($passing)
            {
                return response()->json([
                    'status'=>200,
                    'passing'=> $passing,
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Passing Found.'
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
                $passing = Passing::find($id);
                if($passing)
                {
                $passing->name = $request->input('name');
                $passing->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Passing Edit Successfully.'
                ]);
    
                }
                else
                {
                    return response()->json([
                        'status'=>404,
                        'message'=>'No Passing Found.'
                    ]);
                }
            }
    
    
        }
    
    
        public function destroy($id)
        {
            $all = Passing::find($id);
            if($all)
            {
                $all->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'Passing Deleted Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Passing Found.'
                ]);
            }
        }
}
