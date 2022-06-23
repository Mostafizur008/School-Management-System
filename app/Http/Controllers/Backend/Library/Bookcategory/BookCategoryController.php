<?php

namespace App\Http\Controllers\Backend\Library\Bookcategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\library\Bookcategory\BookCategory;
use Illuminate\Support\Facades\Validator;

class BookCategoryController extends Controller
{
    public function BookCategoryView()
    {
        $data['allData'] = BookCategory::all();
        return view('backend.main-section.page.library.bookcategory.bookcategory_view',$data);
    }

        //-------------------------------------------Ajax----------------------------------------------

 
        public function fetchbookcategory()
        {
            $all = BookCategory::all();
            return response()->json([
                'bookcategory'=>$all,
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
                $data = new BookCategory();
                $data->name = $request->input('name');
                $data->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Book category Added Successfully.'
                ]);
            }
    
        }
    
        public function edit($id)
        {
            $bookcategory = BookCategory::find($id);
            if($bookcategory)
            {
                return response()->json([
                    'status'=>200,
                    'bookcategory'=> $bookcategory,
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No book category Found.'
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
                $bookcategory = BookCategory::find($id);
                if($bookcategory)
                {
                $bookcategory->name = $request->input('name');
                $bookcategory->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'book category Edit Successfully.'
                ]);
    
                }
                else
                {
                    return response()->json([
                        'status'=>404,
                        'message'=>'No book category Found.'
                    ]);
                }
            }
    
    
        }
    
    
        public function destroy($id)
        {
            $all = BookCategory::find($id);
            if($all)
            {
                $all->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'book category Deleted Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No book category Found.'
                ]);
            }
        }
}
