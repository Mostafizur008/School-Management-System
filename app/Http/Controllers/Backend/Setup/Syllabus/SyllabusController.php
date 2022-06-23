<?php

namespace App\Http\Controllers\Backend\Setup\Syllabus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup\Syllabus\Syllabus;
use DB;

class SyllabusController extends Controller
{
    public function SyllabusView()
    {
        $data = DB::table('syllabi')->get();
        return view('backend.main-section.page.setup.syllabus.syllabus_view',compact('data'));
    }

    public function Store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:191',
            'file_path' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);
        $data = new Syllabus();
        $data->title = $request->title;

        if($request->file('file_path')) {
            $file = $request->file('file_path');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('backend/all-images/web/file/'),$filename);
            $data['file_path'] = $filename;
        }

        $data->save();
        return redirect()->route('syl.view');
    }

    public function destroy($id)
    {
        $all = Syllabus::find($id);
        if($all)
        {
            $all->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Syllabus Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Syllabus Found.'
            ]);
        }
    }


}
