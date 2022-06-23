<?php

namespace App\Http\Controllers\Backend\System\Result\Institution;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Result\Institution\Institution;
use Illuminate\Support\Facades\Validator;

class InstitutionController extends Controller
{
    public function InstitutionView()
    {
        $data['allData'] = Institution::all();
        return view('backend.main-section.page.system.result.institution.institution_view',$data);
    }

        //-------------------------------------------Ajax----------------------------------------------

 
        public function fetchinstitution()
        {
            $all = Institution::all();
            return response()->json([
                'institution'=>$all,
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
                $data = new Institution();
                $data->name = $request->input('name');
                $data->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Institution Added Successfully.'
                ]);
            }
    
        }
    
        public function edit($id)
        {
            $institution = Institution::find($id);
            if($institution)
            {
                return response()->json([
                    'status'=>200,
                    'institution'=> $institution,
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Institution Found.'
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
                $institution = Institution::find($id);
                if($institution)
                {
                $institution->name = $request->input('name');
                $institution->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Institution Edit Successfully.'
                ]);
    
                }
                else
                {
                    return response()->json([
                        'status'=>404,
                        'message'=>'No Institution Found.'
                    ]);
                }
            }
    
    
        }
    
    
        public function destroy($id)
        {
            $all = Institution::find($id);
            if($all)
            {
                $all->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'Institution Deleted Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Institution Found.'
                ]);
            }
        }
}
