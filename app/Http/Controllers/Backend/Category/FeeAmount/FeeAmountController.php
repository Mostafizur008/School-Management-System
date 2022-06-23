<?php

namespace App\Http\Controllers\Backend\Category\FeeAmount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\FeeCategory\FeeCategory;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Category\FeeAmount\FeeAmount;

class FeeAmountController extends Controller
{
    public function AmountView()
    {
        $data['allData'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.main-section.page.category.fee_amount.view',$data);
    }
    public function AmountAdd()
    {
        $data['fee'] = FeeCategory::all();
        $data['class'] = StudentClass::all();
        return view('backend.main-section.page.category.fee_amount.add',$data);
    }
    public function AmountStore(Request $request)
    {
        $countClass = count($request->class_id);
        if ($countClass !=NULL)
        {
            for ($i=0; $i <$countClass ; $i++)
            {
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }

        return redirect()->route('amount.view');
    }
    public function AmountEdit($fee_category_id)
    {
        $data['editData'] = FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        //dd($data['editData']->toArray());
        $data['fee'] = FeeCategory::all();
        $data['class'] = StudentClass::all();
        return view('backend.main-section.page.category.fee_amount.edit',$data);
    }
    public function AmountUpdate(Request $request,$fee_category_id)
    {
        if($request->class_id == NULL)
        {
            //tostr notification
            return redirect()->route('amount.edit',$fee_category_id);
        }else{
            $countClass = count($request->class_id);
            FeeAmount::where('fee_category_id',$fee_category_id)->delete();
            for ($i=0; $i <$countClass ; $i++)
            {
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
            return redirect()->route('amount.view');
        }
    }
    public function AmountDetail($fee_category_id)
    {
        $data['detailData'] = FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        return view('backend.main-section.page.category.fee_amount.detail',$data);
    }
}
