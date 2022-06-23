<?php

namespace App\Http\Controllers\Backend\Library\Publisher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\library\Publisher\Publisher;
use Illuminate\Support\Facades\Validator;

class PublisherController extends Controller
{
    public function PublisherView()
    {
        $data['allData'] = Publisher::all();
        return view('backend.main-section.page.library.publisher.publisher_view',$data);
    }

        //-------------------------------------------Ajax----------------------------------------------

 
        public function fetchpublisher()
        {
            $all = Publisher::all();
            return response()->json([
                'publisher'=>$all,
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
                $data = new Publisher();
                $data->name = $request->input('name');
                $data->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Publisher Added Successfully.'
                ]);
            }
    
        }
    
        public function edit($id)
        {
            $publisher = Publisher::find($id);
            if($publisher)
            {
                return response()->json([
                    'status'=>200,
                    'publisher'=> $publisher,
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Publisher Found.'
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
                $publisher = Publisher::find($id);
                if($publisher)
                {
                $publisher->name = $request->input('name');
                $publisher->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'publisher Edit Successfully.'
                ]);
    
                }
                else
                {
                    return response()->json([
                        'status'=>404,
                        'message'=>'No publisher Found.'
                    ]);
                }
            }
    
    
        }
    
    
        public function destroy($id)
        {
            $all = Publisher::find($id);
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
