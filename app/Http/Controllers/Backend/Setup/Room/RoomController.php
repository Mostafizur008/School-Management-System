<?php

namespace App\Http\Controllers\Backend\Setup\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Setup\Building\Building;
use App\Models\Floor\Floor;
use App\Models\Setup\Room\Room;

class RoomController extends Controller
{
    public function RoomView()
    {
        $data['allData'] = Room::select('building_id')->groupBy('building_id')->get();
        return view('backend.main-section.page.setup.room.room_view',$data);
    }
    public function RoomAdd()
    {
        $data['building'] = Building::all();
        $data['floor'] = Floor::all();
        return view('backend.page.setup.room.room_add',$data);
    }

    public function FloorStore(Request $request)
    {
        $countBuilding = count($request->floor_name);
        if ($countBuilding !=NULL)
        {
            for ($i=0; $i <$countBuilding ; $i++)
            {
                $build = new Floor();
                $build->building_id = $request->building_id;
                $build->floor_name = $request->floor_name[$i];
                $build->save();
            }

        }

        return redirect()->route('floor.view');
    }
    public function FloorEdit($building_id)
    {
        $data['editData'] = Floor::where('building_id',$building_id)->orderBy('floor_name','asc')->get();
        //dd($data['editData']->toArray());
        $data['building'] = Building::all();
        return view('backend.page.setup.floor.floor_edit',$data);
    }
    public function FloorUpdate(Request $request,$building_id)
    {
        if($request->floor_name == NULL)
        {
            //tostr notification
            return redirect()->route('floor.edit',$building_id);
        }else{
            $countBuilding = count($request->floor_name);
            Floor::where('building_id',$building_id)->delete();
            for ($i=0; $i <$countBuilding ; $i++)
            {
                $build = new Floor();
                $build->building_id = $request->building_id;
                $build->floor_name = $request->floor_name[$i];
                $build->save();
            }
            return redirect()->route('floor.view');
        }
    }
    public function FloorDetail($building_id)
    {
        $data['detailData'] = Floor::where('building_id',$building_id)->orderBy('floor_name','asc')->get();
        return view('backend.page.setup.floor.floor_detail',$data);
    }

    public function GetRoom($id){
        $floor = Floor::where('building_id',$id)->get();
        return response()->json($floor);

    }
}