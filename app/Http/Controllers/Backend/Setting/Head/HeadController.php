<?php

namespace App\Http\Controllers\Backend\Setting\Head;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\Head\Head;

class HeadController extends Controller
{
    public function HeadView()
    {
        return view('backend.main-section.page.setting.head.add')->with('heads',Head::first());
    }


    public function HeadUpdate(Request $request)
    {
        $validateData = $request->validate([
            'name' => '',
            'designation' => '',
            'description' => 'max:160',
            'contract' => 'max:11',
            'email' => '',
            'image' => '',
            'signature' => '',
        ]);


            $head = Head::first();
            $head->name = $request->name;
            $head->designation = $request->designation;
            $head->description = $request->description;
            $head->contract = $request->contract;
            $head->email = $request->email;
            
            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/all-images/web/head/'), $filename);
                $head['image']= $filename;
            }

            if($request->file('signature')){
                $file= $request->file('signature');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/all-images/web/head/signature/'), $filename);
                $head['signature']= $filename;
            }

            $head->save();

        return redirect()->route('head.view');
    }
}
