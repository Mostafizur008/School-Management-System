<?php

namespace App\Http\Controllers\Backend\Setup\Building;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup\Building\Building;
use Illuminate\Support\Facades\Validator;

class BuildingController extends Controller
{
    public function BuildingView()
    {
        $data['allData'] = Building::all();
        return view('backend.main-section.page.setup.building.building_view',$data);
    }

        //-------------------------------------------Ajax----------------------------------------------

 
        public function fetchbuilding()
        {
            $all = Building::all();
            return response()->json([
                'building'=>$all,
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
                $data = new Building();
                $data->name = $request->input('name');
                $data->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Building Added Successfully.'
                ]);
            }
    
        }
    
        public function edit($id)
        {
            $building = Building::find($id);
            if($building)
            {
                return response()->json([
                    'status'=>200,
                    'building'=> $building,
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
                $building = Building::find($id);
                if($building)
                {
                $building->name = $request->input('name');
                $building->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Building Edit Successfully.'
                ]);
    
                }
                else
                {
                    return response()->json([
                        'status'=>404,
                        'message'=>'No Building Found.'
                    ]);
                }
            }
    
    
        }
    
    
        public function destroy($id)
        {
            $all = Building::find($id);
            if($all)
            {
                $all->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'Building Deleted Successfully.'
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
