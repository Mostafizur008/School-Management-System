<?php

namespace App\Http\Controllers\Backend\Exam\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam\MarksGradePoint\MarksGradePoint;
use Illuminate\Support\Facades\Validator;
use DB;
use PDF;

class GradPointMarksController extends Controller
{
    public function MarksGradeView()
    {
    	$data['allData'] = MarksGradePoint::all();
    	return view('backend.main-section.page.exam.marks.grade.view',$data);
    }

    public function MarksGradeAdd(){
    	return view('backend.page.marks.grade.grade_marks_add');
    }

    public function MarksGradeStore(Request $request){

    	$data = new MarksGradePoint();
    	$data->grade_name = $request->grade_name;
    	$data->grade_point = $request->grade_point;
    	$data->start_marks = $request->start_marks;
    	$data->end_marks = $request->end_marks;
    	$data->start_point = $request->start_point;
    	$data->end_point = $request->end_point;
    	$data->remarks = $request->remarks;
    	$data->save();

    	return redirect()->route('marks.entry.grade');
    } 

    public function MarksGradeEdit($id){
    	$data['editData'] = MarksGradePoint::find($id);
    	return view('backend.page.marks.grade.grade_marks_edit',$data);
    }

    public function MarksGradeUpdate(Request $request, $id){

    	$data = MarksGradePoint::find($id);
    	$data->grade_name = $request->grade_name;
    	$data->grade_point = $request->grade_point;
    	$data->start_marks = $request->start_marks;
    	$data->end_marks = $request->end_marks;
    	$data->start_point = $request->start_point;
    	$data->end_point = $request->end_point;
    	$data->remarks = $request->remarks;
    	$data->save();

    	return redirect()->route('marks.entry.grade');

    }

    public function GradeDetail()
    {
        $data ['detail'] = MarksGradePoint::all();
        $pdf = PDF::loadView('backend.page.marks.grade.grade_marks_detail_pdf', $data);
        return  $pdf->stream('invoice.pdf');
    }

	
      //-------------------------------------------Ajax----------------------------------------------

 
      public function fetchgrade()
      {
          $all = MarksGradePoint::all();
          return response()->json([
              'grade'=>$all,
          ]);
      }
  
      public function Store(Request $request)
      {
		$validator = Validator::make($request->all(), [
			'grade_name'=> 'required',
			'grade_point'=> 'required',
			'start_marks'=> 'required',
			'end_marks'=> 'required',
			'start_point'=> 'required',
			'end_point'=> 'required',
			'remarks'=> 'required',
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
              $data = new MarksGradePoint();
              $data->grade_name = $request->input('grade_name');
			  $data->grade_point = $request->input('grade_point');
			  $data->start_marks = $request->input('start_marks');
			  $data->end_marks = $request->input('end_marks');
			  $data->start_point = $request->input('start_point');
			  $data->end_point = $request->input('end_point');
			  $data->remarks = $request->input('remarks');
              $data->save();
              return response()->json([
                  'status'=>200,
                  'message'=>'Grade Added Successfully.'
              ]);
          }
  
      }
  
      public function edit($id)
      {
          $grade = MarksGradePoint::find($id);
          if($grade)
          {
              return response()->json([
                  'status'=>200,
                  'grade'=> $grade,
              ]);
          }
          else
          {
              return response()->json([
                  'status'=>404,
                  'message'=>'No Grade Found.'
              ]);
          }
  
      }
  
      public function update(Request $request, $id)
      {
         
          $validator = Validator::make($request->all(), [
			'grade_name'=> 'required',
			'grade_point'=> 'required',
			'start_marks'=> 'required',
			'end_marks'=> 'required',
			'start_point'=> 'required',
			'end_point'=> 'required',
			'remarks'=> 'required',
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
              $grade = MarksGradePoint::find($id);
              if($grade)
              {
				$grade->grade_name = $request->input('grade_name');
			    $grade->grade_point = $request->input('grade_point');
			    $grade->start_marks = $request->input('start_marks');
			    $grade->end_marks = $request->input('end_marks');
			    $grade->start_point = $request->input('start_point');
			    $grade->end_point = $request->input('end_point');
			    $grade->remarks = $request->input('remarks');
                $grade->update();
                return response()->json([
                  'status'=>200,
                  'message'=>'Grade Edit Successfully.'
              ]);
  
              }
              else
              {
                  return response()->json([
                      'status'=>404,
                      'message'=>'No Grade Found.'
                  ]);
              }
          }
  
  
      }
  
  
      public function destroy($id)
      {
          $all = MarksGradePoint::find($id);
          if($all)
          {
              $all->delete();
              return response()->json([
                  'status'=>200,
                  'message'=>'Grade Deleted Successfully.'
              ]);
          }
          else
          {
              return response()->json([
                  'status'=>404,
                  'message'=>'No Grade Found.'
              ]);
          }
      }

}
