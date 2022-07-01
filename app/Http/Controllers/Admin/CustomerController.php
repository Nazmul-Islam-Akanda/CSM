<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\Branch;
use App\Models\Customer;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{

    public function getArea($branch)
    {
        $areas=Area::where('branch_id',$branch)->get();
        return response()->json([
            'data'=>$areas
        ]);
    }

    public function create(){
        $branches=Branch::all();
        return view('admin.panel.pages.customer_add',compact('branches'));
    }

    public function store(Request $request){

        $request->validate([
            'email'=>'unique:customers',
            'n_id'=>'unique:customers'
        ]);

        // dd($request->all());

        Customer::create([
            'branch_id'=>$request->branch,
            'area_id'=>$request->area,
            'name'=>$request->name,
            'email'=>$request->email,
            'n_id'=>$request->n_id,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);

        Toastr::success(' Customer added successfully.');
        return redirect()->back();
    }
}
