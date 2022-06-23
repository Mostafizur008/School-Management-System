<?php

namespace App\Http\Controllers\Backend\Setup\Class;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup\Class\StudentClass;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller
{
    public function ClassView()
    {
        $data['allData'] = StudentClass::all();
        return view('backend.main-section.page.setup.class.class_view',$data);
    }

    public function ClassAdd()
    {
        return view('backend.page.setup.class.class_add');
    }
    public function ClassStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);
        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('class.view');
    }
    public function ClassEdit($id)
    {
        $allData= StudentClass::find($id);
        return view('backend.page.setup.class.class_edit',compact('allData'));
    }

    public function ClassUpdate(Request $request,$id)
    {
        $data = StudentClass::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('class.view');
    }
    public function ClassDelete($id)
    {
        $user = StudentClass::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('class.view')->with($notification);
    }

      //-------------------------------------------Ajax----------------------------------------------

 
      public function fetchclass()
      {
          $all = StudentClass::all();
          return response()->json([
              'class'=>$all,
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
              $data = new StudentClass();
              $data->name = $request->input('name');
              $data->save();
              return response()->json([
                  'status'=>200,
                  'message'=>'Class Added Successfully.'
              ]);
          }
  
      }
  
      public function edit($id)
      {
          $class = StudentClass::find($id);
          if($class)
          {
              return response()->json([
                  'status'=>200,
                  'class'=> $class,
              ]);
          }
          else
          {
              return response()->json([
                  'status'=>404,
                  'message'=>'No User Found.'
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
              $class = StudentClass::find($id);
              if($class)
              {
              $class->name = $request->input('name');
              $class->update();
              return response()->json([
                  'status'=>200,
                  'message'=>'Class Edit Successfully.'
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
          $all = StudentClass::find($id);
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
