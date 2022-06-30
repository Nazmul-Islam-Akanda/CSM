<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShipmentController extends Controller
{
    public function create(){
        $branches=Branch::all();
        return view('admin.panel.pages.shipment_add',compact('branches'));
    }
}
