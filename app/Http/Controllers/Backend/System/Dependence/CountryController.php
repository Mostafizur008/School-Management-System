<?php

namespace App\Http\Controllers\Backend\System\Dependence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Dependance\Country;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function CountryView()
    {
        $country ['ct'] = Country::all();
        return view('backend.main-section.page.system.dependence.country.view',$country);
    }

    public function fetchcountry()
    {
        $all = Country::all();
        return response()->json([
            'countrys'=>$all,
        ]);
    }

    public function Store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
            'sortname'=>'required|max:191',
            'phonecode'=>'required|max:191',
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
            $data = new Country();
            $data->name = $request->input('name');
            $data->sortname = $request->input('sortname');
            $data->phonecode = $request->input('phonecode');
            $data->save();
            return response()->json([
                'status'=>200,
                'message'=>'Country Added Successfully.'
            ]);
        }
    }


    public function edit($id)
    {
        $country = Country::find($id);
        if($country)
        {
            return response()->json([
                'status'=>200,
                'country'=> $country,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No country Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
            'sortname'=>'required|max:191',
            'phonecode'=>'required|max:191',
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
            $country = Country::find($id);
            if($country)
            {
            $country->name = $request->input('name');
            $country->sortname = $request->input('sortname');
            $country->phonecode = $request->input('phonecode');
            $country->update();
            return response()->json([
                'status'=>200,
                'message'=>'Country Edit Successfully.'
            ]);

            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Country Found.'
                ]);
            }
        }


    }

    public function destroy($id)
    {
        $all = Country::find($id);
        if($all)
        {
            $all->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Country Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Country Found.'
            ]);
        }
    }

}
