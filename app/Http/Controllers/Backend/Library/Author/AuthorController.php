<?php

namespace App\Http\Controllers\Backend\Library\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\library\Author\Author;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function AuthorView()
    {
        $data['allData'] = Author::all();
        return view('backend.main-section.page.library.author.author_view',$data);
    }

        //-------------------------------------------Ajax----------------------------------------------

 
        public function fetchauthor()
        {
            $all = Author::all();
            return response()->json([
                'author'=>$all,
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
                $data = new Author();
                $data->name = $request->input('name');
                $data->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Author Added Successfully.'
                ]);
            }
    
        }
    
        public function edit($id)
        {
            $author = Author::find($id);
            if($author)
            {
                return response()->json([
                    'status'=>200,
                    'author'=> $author,
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Author Found.'
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
                $author = Author::find($id);
                if($author)
                {
                $author->name = $request->input('name');
                $author->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'author Edit Successfully.'
                ]);
    
                }
                else
                {
                    return response()->json([
                        'status'=>404,
                        'message'=>'No author Found.'
                    ]);
                }
            }
    
    
        }
    
    
        public function destroy($id)
        {
            $all = Author::find($id);
            if($all)
            {
                $all->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'author Deleted Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No author Found.'
                ]);
            }
        }

}
