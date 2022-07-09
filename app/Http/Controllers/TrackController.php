<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TrackController extends Controller
{
    public function shippingTrack()
    {
        $key=null;
        $shipment=null;
        if(request()->search){
            $key=request()->search;
            $shipment=Shipment::whereLike(['shipment_id'],$key)
            ->first();
            // dd($shipment);
            return view('website.master',compact('shipment','key'));
        }
// dd($shipment);
        return view('website.master',compact('shipment','key'));
    }
}
