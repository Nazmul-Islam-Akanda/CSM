<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Models\Driver;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    public function create(){
        $branches=Branch::all();
        return view('admin.panel.pages.driver_add',compact('branches'));
    }

    public function store(Request $request){

        $request->validate([
            'n_id'=>'unique:drivers'
        ]);

        // dd($request->all());

        Driver::create([
            'branch_id'=>$request->branch,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'n_id'=>$request->n_id,
            'address'=>$request->address,
        ]);

        Toastr::success(' Driver added successfully.');
        return redirect()->route('driver.list');
    }

    public function list(){

        $key=null;
        if(request()->search){
            $key=request()->search;
            $drivers = Driver::with('branch')
            ->whereLike(['branch.name','name','phone','n_id','address'],$key)
            ->paginate(10);
            return view('admin.panel.pages.driver_list',compact('drivers','key'));
        }
        $drivers = Driver::with('branch')->paginate(10);
        return view('admin.panel.pages.driver_list',compact('drivers','key'));
    }

    public function edit($id){
        $driver=Driver::find($id);
        $branches=Branch::all();
        return view('admin.panel.pages.driver_edit',compact('driver','branches'));
    }

    public function update(Request $request, $id){
        $driver=Driver::find($id);

        $request->validate([
            'n_id'=>"required|unique:drivers,n_id,$id",
        ]);

        $driver->update([
           
            'branch_id'=>$request->branch,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'n_id'=>$request->n_id,
            'address'=>$request->address,
        ]);

        Toastr::info('Driver updated successfully.');
        return redirect()->route('driver.list');
    }


    public function delete($id){
        Driver::find($id)->delete();
     
        Toastr::warning('Driver deleted successfully.');
        return redirect()->back();

    }
}
