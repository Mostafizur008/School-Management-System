<?php

namespace App\Http\Controllers\Backend\System\Dependence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Dependance\District;
use App\Models\System\Dependance\Country;

class DistrictController extends Controller
{
    public function DistrictView()
    {
        $district['dist'] = District::select('country_id')->groupBy('country_id')->get();
        return view('backend.main-section.page.system.dependence.district.view',$district);
    }

    public function DistrictAdd()
    {
        $country ['cnt'] = Country::all();
        return view('backend.main-section.page.system.dependence.district.add',$country);
    }

    public function DtStore(Request $request)
    {
        $countCountry = count($request->name);
        if ($countCountry !=NULL)
        {
            for ($i=0; $i <$countCountry ; $i++)
            {
                $dist = new District();
                $dist->country_id = $request->country_id;
                $dist->name = $request->name[$i];
                $dist->save();
            }
        }

        return redirect()->route('district.view');
    }

    public function DistrictEdit($country_id)
    {
        $data['editData'] = District::where('country_id',$country_id)->orderBy('name','asc')->get();
        $data['country'] = Country::all();
        return view('backend.main-section.page.system.dependence.district.edit',$data);
    }

    public function DistrictUpdate(Request $request,$country_id)
    {
        if($request->name == NULL)
        {
            return redirect()->route('dist.edit',$country_id);
        }else{
            $countCountry = count($request->name);
            District::where('country_id',$country_id)->delete();
            for ($i=0; $i <$countCountry ; $i++)
            {
                $dist = new District();
                $dist->country_id = $request->country_id;
                $dist->name = $request->name[$i];
                $dist->save();
            }
            return redirect()->route('district.view');
        }
    }

    public function DistrictDetail($country_id)
    {
        $data['detailData'] = District::where('country_id',$country_id)->orderBy('name','asc')->get();
        return view('backend.main-section.page.system.dependence.district.detail',$data);
    }
}
