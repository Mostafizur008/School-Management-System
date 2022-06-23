<?php

namespace App\Http\Controllers\Backend\Exam\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam\Exam\StudentExam;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function ExamView()
    {
        $data['allData'] = StudentExam::all();
        return view('backend.main-section.page.exam.exam.exam_view',$data);
    }

    public function ExamAdd()
    {
        return view('backend.page.setup.exam.exam_add');
    }
    public function ExamStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_exams,name',
        ]);
        $data = new StudentExam();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('exam.view');
    }
    public function ExamEdit($id)
    {
        $editData = StudentExam::find($id);
        return view('backend.page.setup.exam.exam_edit',compact('editData'));
    }

    public function ExamUpdate(Request $request,$id)
    {
        $data = StudentExam::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_exams,name,'.$data->id,
        ]);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('exam.view');
    }
    public function ExamDelete($id)
    {
        $user = StudentExam::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('exam.view')->with($notification);
    }

    
         //-------------------------------------------Ajax----------------------------------------------

 
         public function fetchexam()
         {
             $all = StudentExam::all();
             return response()->json([
                 'exam'=>$all,
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
                 $data = new StudentExam();
                 $data->name = $request->input('name');
                 $data->save();
                 return response()->json([
                     'status'=>200,
                     'message'=>'Exam Added Successfully.'
                 ]);
             }
     
         }
     
         public function edit($id)
         {
             $exam = StudentExam::find($id);
             if($exam)
             {
                 return response()->json([
                     'status'=>200,
                     'exam'=> $exam,
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
                 $exam = StudentExam::find($id);
                 if($exam)
                 {
                 $exam->name = $request->input('name');
                 $exam->update();
                 return response()->json([
                     'status'=>200,
                     'message'=>'Exam Edit Successfully.'
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
             $all = StudentExam::find($id);
             if($all)
             {
                 $all->delete();
                 return response()->json([
                     'status'=>200,
                     'message'=>'Exam Deleted Successfully.'
                 ]);
             }
             else
             {
                 return response()->json([
                     'status'=>404,
                     'message'=>'No Exam Found.'
                 ]);
             }
         }


}
