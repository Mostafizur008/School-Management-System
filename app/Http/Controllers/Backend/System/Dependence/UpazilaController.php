<?php

namespace App\Http\Controllers\Backend\System\Dependence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Dependance\District;
use App\Models\System\Dependance\Upazila;

class UpazilaController extends Controller
{
    public function UpView()
    {
        $upazila['zila'] = Upazila::select('district_id')->groupBy('district_id')->get();
        return view('backend.main-section.page.system.dependence.upazila.view',$upazila);
    }

    public function UpAdd()
    {
        $district ['dist'] = District::all();
        return view('backend.main-section.page.system.dependence.upazila.add',$district);
    }

    public function Store(Request $request)
    {
        $countDistrict = count($request->name);
        if ($countDistrict !=NULL)
        {
            for ($i=0; $i <$countDistrict ; $i++)
            {
                $up = new Upazila();
                $up->district_id = $request->district_id;
                $up->name = $request->name[$i];
                $up->save();
            }
        }

        return redirect()->route('up.view');
    }

    public function UpEdit($district_id)
    {
        $data['editData'] = Upazila::where('district_id',$district_id)->orderBy('name','asc')->get();
        $data['district'] = District::all();
        return view('backend.main-section.page.system.dependence.upazila.edit',$data);
    }

    public function UpUpdate(Request $request,$district_id)
    {
        if($request->name == NULL)
        {
            return redirect()->route('up.edit',$district_id);
        }else{
            $countDistrict = count($request->name);
            Upazila::where('district_id',$district_id)->delete();
            for ($i=0; $i <$countDistrict ; $i++)
            {
                $up = new Upazila();
                $up->district_id = $request->district_id;
                $up->name = $request->name[$i];
                $up->save();
            }
            return redirect()->route('up.view');
        }
    }

    public function UpDetail($district_id)
    {
        $data['detailData'] = Upazila::where('district_id',$district_id)->orderBy('name','asc')->get();
        return view('backend.main-section.page.system.dependence.upazila.detail',$data);
    }
}
