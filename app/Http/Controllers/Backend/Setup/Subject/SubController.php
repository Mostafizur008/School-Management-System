<?php

namespace App\Http\Controllers\Backend\Setup\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup\Subject\StudentSub;
use Illuminate\Support\Facades\Validator;

class SubController extends Controller
{
    public function SubView()
    {
        $data['allData'] = StudentSub::all();
        return view('backend.main-section.page.setup.subject.sub_view',$data);
    }

    public function SubAdd()
    {
        return view('backend.page.setup.subject.sub_add');
    }
    public function SubStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_subs,name',
        ]);
        $data = new StudentSub();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('subject.view');
    }
    public function SubEdit($id)
    {
        $editData = StudentSub::find($id);
        return view('backend.page.setup.subject.sub_edit',compact('editData'));
    }

    public function SubUpdate(Request $request,$id)
    {
        $data = StudentSub::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_subs,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('subject.view');
    }
    public function SubDelete($id)
    {
        $user = StudentSub::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('subject.view')->with($notification);
    }

       //-------------------------------------------Ajax----------------------------------------------

 
       public function fetchsubject()
       {
           $all = StudentSub::all();
           return response()->json([
               'subject'=>$all,
           ]);
       }
   
       public function Store(Request $request)
       {
           $validator = Validator::make($request->all(), [
               'name'=> 'required|max:191',
               'code'=> 'required|max:191',
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
               $data = new StudentSub();
               $data->name = $request->input('name');
               $data->code = $request->input('code');
               $data->save();
               return response()->json([
                   'status'=>200,
                   'message'=>'Subject Added Successfully.'
               ]);
           }
   
       }
   
       public function edit($id)
       {
           $sub = StudentSub::find($id);
           if($sub)
           {
               return response()->json([
                   'status'=>200,
                   'sub'=> $sub,
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
               'code'=> 'required|max:191',
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
               $sub= StudentSub::find($id);
               if($sub)
               {
               $sub->name = $request->input('name');
               $sub->code = $request->input('code');
               $sub->update();
               return response()->json([
                   'status'=>200,
                   'message'=>'Subject Edit Successfully.'
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
           $all = StudentSub::find($id);
           if($all)
           {
               $all->delete();
               return response()->json([
                   'status'=>200,
                   'message'=>'Subject Deleted Successfully.'
               ]);
           }
           else
           {
               return response()->json([
                   'status'=>404,
                   'message'=>'No Subject Found.'
               ]);
           }
       }
}
