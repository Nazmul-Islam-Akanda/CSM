<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class ShipmentController extends Controller
{

    public function getCustomer($branch)
    {
        $customers=Customer::where('branch_id',$branch)->get();
        return response()->json([
            'data'=>$customers
        ]);
    }

    public function getCustomerPhone($customer)
    {
        $phone=Customer::where('id',$customer)->get();
        return response()->json([
            'data'=>$phone
        ]);
    }

    public function create(){
        $branches=Branch::all();
        return view('admin.panel.pages.shipment_add',compact('branches'));
    }


}
