<?php

namespace App\Http\Controllers\Backend\Exam\AssignSubject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup\Subject\StudentSub;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Exam\Shortcode\ShortCode;
use App\Models\Exam\AssignSubject\AssignSub;
use App\Models\Exam\Exam\StudentExam;
use Illuminate\Support\Facades\Validator;

class AssignSubController extends Controller
{
    public function AssignView()
    {
        $data['allData'] = AssignSub::select('class_id')->groupBy('class_id')->get();
        return view('backend.main-section.page.exam.assign.assign_view',$data);
    }
    public function AssignAdd()
    {
        $data['exam'] = StudentExam::all();
        $data['class'] = StudentClass::all();
        $data['group'] = StudentGroup::all();
        $data['subject'] = StudentSub::all();
        $data['shortcode'] = ShortCode::all();
        return view('backend.main-section.page.exam.assign.assign_add',$data);
    }
    public function AssignStore(Request $request)
    {

        $countClass = count($request->subject_id);
        if ($countClass !=NULL)
        {
            for ($i=0; $i <$countClass ; $i++)
            {
                $assign_sub = new AssignSub();
                $assign_sub->class_id = $request->class_id;
                $assign_sub->exam_id = $request->exam_id[$i];
                $assign_sub->group_id = $request->group_id[$i]??'0';
                $assign_sub->subject_id = $request->subject_id[$i];
                $assign_sub->shortcode_id = $request->shortcode_id[$i]??'0';
                $assign_sub->full_mark = $request->full_mark[$i];
                $assign_sub->pass_mark = $request->pass_mark[$i];
                $assign_sub->save();
            }
        }

        return redirect()->route('assign.view');
    }

    public function AssignEdit($class_id)
    {
        $data['editData'] = AssignSub::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        //dd($data['editData']->toArray());
        $data['exam'] = StudentExam::all();
        $data['class'] = StudentClass::all();
        $data['group'] = StudentGroup::all();
        $data['subject'] = StudentSub::all();
        $data['shortcode'] = ShortCode::all();
        return view('backend.main-section.page.exam.assign.assign_edit',$data);
    }
    public function AssignUpdate(Request $request,$class_id)
    {
        if($request->subject_id == NULL)
        {
            //tostr notification
            return redirect()->route('assign.edit',$class_id);
        }else{
            $countSubject = count($request->subject_id);
            AssignSub::where('class_id',$class_id)->delete();
            for ($i=0; $i <$countSubject ; $i++)
            {
                $assign_sub = new AssignSub();
                $assign_sub->class_id = $request->class_id;
                $assign_sub->exam_id = $request->exam_id[$i];
                $assign_sub->group_id = $request->group_id[$i]??'0';
                $assign_sub->subject_id = $request->subject_id[$i];
                $assign_sub->shortcode_id = $request->shortcode_id[$i]??'0';
                $assign_sub->full_mark = $request->full_mark[$i];
                $assign_sub->pass_mark = $request->pass_mark[$i];
                $assign_sub->save();
            }
            return redirect()->route('assign.view');
        }
    }
    public function AssignDetail($class_id)
    {
        $data['detailData'] = AssignSub::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        return view('backend.main-section.page.exam.assign.assign_detail',$data);
    }
}
