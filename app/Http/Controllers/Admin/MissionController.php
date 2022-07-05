<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Models\Driver;
use App\Models\Mission;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Models\MissionDetail;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

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
        return view('admin.panel.pages.mission_add',compact('branches'));
    }

    public function store(Request $request){

    //  dd($request->all());

    $shipment_ids=$request->shipment_id;
    // dd($shipment_ids);

    //shipment status update
    $shipments=Shipment::whereIn('shipment_id',$shipment_ids);

    $shipments->update([
        'status'=>"On The Way",
    ]);



//mission create
        $mission=Mission::create([
            'branch_id'=>$request->branch,
            'date'=>$request->date,
            'time'=>$request->time,
            'driver_id'=>$request->driver,
            'car_no'=>$request->car_no,
            'to_branch_id'=>$request->to_branch,
        ]);



//mission details
    foreach($shipment_ids as $key=>$shipment){
            // dd($shipment_id[$key]);

            MissionDetail::create([
                'mission_id'=>$mission->id,
                'shipping_id'=>$request->shipment_id[$key],
            ]);

        
    }

    Toastr::success('Misiion Added Successfully');
    return redirect()->back();

    }



    public function list(){
        $missions=Mission::with('branch','driver','to_branch','mission_details')->paginate(10);
        return view('admin.panel.pages.mission_list',compact('missions'));
    }
}
