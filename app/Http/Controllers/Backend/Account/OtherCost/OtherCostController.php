<?php

namespace App\Http\Controllers\Backend\Account\OtherCost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account\OtherCost\AccountOtherCost;

class OtherCostController extends Controller
{
    public function OtherCostView(){
    	$data['allData'] = AccountOtherCost::orderBy('id','desc')->get();
    	return view('backend.main-section.page.account.other_cost.view', $data);
    }


    public function OtherCostAdd(){
    	return view('backend.main-section.page.account.other_cost.view');
    }


    public function OtherCostStore(Request $request){

    	$cost = new AccountOtherCost();
    	$cost->date = date('Y-m-d', strtotime($request->date));
    	$cost->amount = $request->amount;

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('backend/all-images/others/cost'),$filename);
    		$cost['image'] = $filename;
    	}
    	$cost->description = $request->description;
    	$cost->save();

    	$notification = array(
    		'message' => 'Other Cost Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('other.cost.view')->with($notification);

    }  // end method


    public function OtherCostEdit($id){
        $data['editData'] = AccountOtherCost::find($id);
    	return view('backend.main-section.page.account.other_cost.edit', $data);
    }



    public function OtherCostUpdate(Request $request, $id){

    	$cost = AccountOtherCost::find($id);
    	$cost->date = date('Y-m-d', strtotime($request->date));
    	$cost->amount = $request->amount;

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('backend/all-images/others/cost/'.$cost->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('backend/all-images/others/cost'),$filename);
    		$cost['image'] = $filename;
    	}
    	$cost->description = $request->description;
    	$cost->save();

    	$notification = array(
    		'message' => 'Other Cost Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('other.cost.view')->with($notification);

    }
}
