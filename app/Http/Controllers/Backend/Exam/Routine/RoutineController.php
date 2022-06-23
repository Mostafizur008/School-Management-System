<?php

namespace App\Http\Controllers\Backend\Exam\Routine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup\Subject\StudentSub;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Exam\Shortcode\ShortCode;
use App\Models\Exam\Routine\Routine;
use PDF;

class RoutineController extends Controller
{
    public function RtView()
    {
        $data['allData'] = Routine::select('class_id')->groupBy('class_id')->get();
        return view('backend.main-section.page.exam.routine.view',$data);
    }

    public function RtAdd()
    {
        $data['class'] = StudentClass::all();
        $data['group'] = StudentGroup::all();
        $data['subject'] = StudentSub::all();
        $data['shortcode'] = ShortCode::all();
        return view('backend.main-section.page.exam.routine.add',$data);
    }

    public function RtStore(Request $request)
    {

        $countClass = count($request->subject_id);
        if ($countClass !=NULL)
        {
            for ($i=0; $i <$countClass ; $i++)
            {
                $routine = new Routine();
                $routine->class_id = $request->class_id;
                $routine->group_id = $request->group_id[$i]??'0';
                $routine->subject_id = $request->subject_id[$i];
                $routine->shortcode_id = $request->shortcode_id[$i]??'0';
                $routine->date = $request->date[$i];
                $routine->start = $request->start[$i];
                $routine->end = $request->end[$i];
                $routine ->save();
            }
        }

        return redirect()->route('routine.view');
    }

    public function RtEdit($class_id)
    {
        $data['editData'] = Routine::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        //dd($data['editData']->toArray());
        $data['class'] = StudentClass::all();
        $data['group'] = StudentGroup::all();
        $data['subject'] = StudentSub::all();
        $data['shortcode'] = ShortCode::all();
        return view('backend.main-section.page.exam.routine.edit',$data);
    }
    public function RtUpdate(Request $request,$class_id)
    {
        if($request->subject_id == NULL)
        {
            //tostr notification
            return redirect()->route('routine.edit',$class_id);
        }else{
            $countSubject = count($request->subject_id);
            Routine::where('class_id',$class_id)->delete();
            for ($i=0; $i <$countSubject ; $i++)
            {
                $routine = new Routine();
                $routine->class_id = $request->class_id;
                $routine->group_id = $request->group_id[$i]??'0';
                $routine->subject_id = $request->subject_id[$i];
                $routine->shortcode_id = $request->shortcode_id[$i]??'0';
                $routine->date = $request->date[$i];
                $routine->start = $request->start[$i];
                $routine->end = $request->end[$i];
                $routine ->save();
            }
            return redirect()->route('routine.view');
        }
    }
    public function RtDetail($class_id)
    {
        $data['detailData'] = Routine::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        return view('backend.main-section.page.exam.routine.detail',$data);
    }

    public function RtPdf($class_id)
    {
        $data ['pdf'] = Routine::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        $pdf = PDF::loadView('backend.main-section.page.exam.routine.pdf', $data);
        return  $pdf->stream('exam_routine.pdf','A4');
    }

}
