<?php

namespace App\Http\Controllers\Backend\Setup\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup\Session\StudentSession;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    public function YearView()
    {
        $data['allData'] = StudentSession::all();
        return view('backend.main-section.page.setup.session.session_view',$data);
    }

    public function YearAdd()
    {
        return view('backend.page.setup.year.year_add');
    }
    public function YearStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);
        $data = new StudentSession();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('year.view');
    }
    public function YearEdit($id)
    {
        $editData = StudentYear::find($id);
        return view('backend.page.setup.year.year_edit',compact('editData'));
    }

    public function YearUpdate(Request $request,$id)
    {
        $data = StudentYear::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('year.view');
    }
    public function YearDelete($id)
    {
        $user = StudentYear::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('year.view')->with($notification);
    }


       //-------------------------------------------Ajax----------------------------------------------

 
       public function fetchsession()
       {
           $all = StudentSession::all();
           return response()->json([
               'session'=>$all,
           ]);
       }
   
       public function SessionStore(Request $request)
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
               $data = new StudentSession();
               $data->name = $request->input('name');
               $data->save();
               return response()->json([
                   'status'=>200,
                   'message'=>'Session Added Successfully.'
               ]);
           }
   
       }
   
       public function edit($id)
       {
           $session = StudentSession::find($id);
           if($session)
           {
               return response()->json([
                   'status'=>200,
                   'session'=> $session,
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
               $session = StudentSession::find($id);
               if($session)
               {
               $session->name = $request->input('name');
               $session->update();
               return response()->json([
                   'status'=>200,
                   'message'=>'Session Edit Successfully.'
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
           $all = StudentSession::find($id);
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
