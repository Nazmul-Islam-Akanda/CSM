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

    $request->validate([
        'shipment_id' => 'required|exists:shipments,shipment_id',
    ]);

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


    public function close(Request $request, $id){
        $mission=Mission::with('mission_details')->find($id);
// dd($mission);
        $mission->update([
            'status'=>"Closed",
        ]);


//         $mission_details[]=MissionDetail::whereIn('mission_id',$mission->id)->pluck('shipping_id');
// dd($mission_details[]);
        // shipment status update
    // $shipments=Shipment::whereIn('shipment_id',$mission->);

    // $shipments->update([
    //     'status'=>"On The Way",
    // ]);

    foreach($mission->mission_details as $mission_detail){
        $shipment=Shipment::where('shipment_id',$mission_detail->shipping_id);
        $shipment->update([
                'status'=>"Delivered",
            ]);
    }

        Toastr::info('Mission Closed successfully.');
        return redirect()->route('mission.list');
    }


    public function delete($id){
        Mission::find($id)->delete();
     
        Toastr::warning('Mission deleted successfully.');
        return redirect()->back();

    }
}
