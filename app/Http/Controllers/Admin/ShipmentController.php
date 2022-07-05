<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Shipment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ShipmentController extends Controller
{

    public function getCustomer($branch)
    {
        $customers=Customer::where('branch_id',$branch)->get();
        return response()->json([
            'data'=>$customers
        ]);
    }

    public function getCustomerInfo($customer)
    {
        $info=Customer::where('id',$customer)->get();
        return response()->json([
            'data'=>$info
        ]);
    }


    public function create(){
        $branches=Branch::all();
        return view('admin.panel.pages.shipment_add',compact('branches'));
    }


public function store(Request $request){

    $request->validate([
        'shipment_id'=>'unique:shipments'
    ]);

    $ship_prefix=Branch::where('id',$request->branch)->pluck('ship_prefix');
        // dd($ship_prefix[0]);
        $prefix="NP".$ship_prefix[0];
        // dd($prefix);
        // $ship_id=IdGenerator::generate(['table' => 'shipments', 'length' => 6, 'prefix' => date('ymd')]);
        // $ymd=date('ymd');
        // dd($ymd);
        $shipping_id=$prefix.Str::random(3);
        // dd($shipping_id);

        Shipment::create([
          
            'type'=>$request->type,
            'branch_id'=>$request->branch,
            'date'=>$request->date,
            'time'=>$request->time,
            'customer_id'=>$request->customer,
            'receiver_name'=>$request->receiver_name,
            'receiver_phone'=>$request->receiver_phone,
            'receiver_address'=>$request->receiver_address,
            'to_branch_id'=>$request->to_branch,
            'to_area_id'=>$request->to_area,
            'from_area_id'=>$request->from_area,
            'payment_type'=>$request->payment_type,
            'pay_method'=>$request->pay_method,
            'pay_status'=>$request->pay_status,
            'shipment_id'=>$shipping_id,
            'product_description'=>$request->product_description,
            'quantity'=>$request->quantity,
            'shipping_cost'=>$request->shipping_cost,
            'status'=>"Pending",
        ]);

        Toastr::success(' Shipment added successfully.');
        return redirect()->route('shipment.list');
    }

    public function list(){
        $shipments=Shipment::with('branch','area','customer')->where('shipment_direction','on_delivery')->paginate(10);;
        return view('admin.panel.pages.shipment_list',compact('shipments'));
    }

    public function multiUpdate(Request $request){
        // print_r($request->ids);
        // dd($request->payment_status);
        $ids=$request->ids;
        // Shipment::whereIn('id',$ids)->delete();

        if($ids){
            $shipments=Shipment::whereIn('id',$ids);
            $shipments->update([
                'pay_status'=>$request->payment_status,
            ]);
            Toastr::success(' Shipments status are updated successfully.');
            return redirect()->back();
        }

        Toastr::warning(' Please select any item first.');
            return redirect()->back();
        
    }


    public function edit($id){
        $shipment=Shipment::find($id);
        $branches=Branch::all();
        $customers=Customer::all();
        $areas=Area::all();
        return view('admin.panel.pages.shipment_edit',compact('shipment','branches','customers','areas'));
    }

    public function update(Request $request, $id){
        $shipment=Shipment::find($id);

        $shipment->update([
            'type'=>$request->type,
            'branch_id'=>$request->branch,
            'date'=>$request->date,
            'time'=>$request->time,
            'customer_id'=>$request->customer,
            'receiver_name'=>$request->receiver_name,
            'receiver_phone'=>$request->receiver_phone,
            'receiver_address'=>$request->receiver_address,
            'to_branch_id'=>$request->to_branch,
            'to_area_id'=>$request->to_area,
            'from_area_id'=>$request->from_area,
            'payment_type'=>$request->payment_type,
            'pay_method'=>$request->pay_method,
            'product_description'=>$request->product_description,
            'quantity'=>$request->quantity,
            'shipping_cost'=>$request->shipping_cost,
            'shipment_direction'=>$request->shipment_direction,
        ]);

        Toastr::info('Shipment updated successfully.');
        return redirect()->route('shipment.list');
    }

    public function delete($id){
        Shipment::find($id)->delete();
     
        Toastr::warning('Shipment deleted successfully.');
        return redirect()->back();

    }


    public function returnList(){
        $shipments=Shipment::with('branch','area','customer')->where('shipment_direction','return')->paginate(10);;
        return view('admin.panel.pages.shipment_return_list',compact('shipments'));
    }

}
