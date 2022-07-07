<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function shippingTrack()
    {
        $key=null;
        if(request()->search){
            $key=request()->search;
            $shipment=Shipment::whereLike(['shipment_id'],$key)
            ->first();
            // dd($shipment);
            return view('website.master',compact('shipment','key'));
        }

        return view('website.master');
    }
}
