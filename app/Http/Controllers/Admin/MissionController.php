<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shipment;

class MissionController extends Controller
{

    public function getDriver($branch)
    {
        $drivers=Driver::where('branch_id',$branch)->get();
        return response()->json([
            'data'=>$drivers
        ]);
    }

    public function getDriverInfo($driver)
    {
        $info=Driver::where('id',$driver)->get();
        return response()->json([
            'data'=>$info
        ]);
    }

    public function create(){
        $branches=Branch::all();
        $shipments=Shipment::all();
        return view('admin.panel.pages.mission_add',compact('branches','shipments'));
    }
}
