<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\Branch;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    public function create(){
        $branches=Branch::all();
        return view('admin.panel.pages.area_add',compact('branches'));
    }

    public function store(Request $request){

        Area::create([
            'branch_id'=>$request->branch,
            'area'=>$request->area,
        ]);

        Toastr::success(' Area added successfully.');
        return redirect()->route('area.list');
    }


    public function list(){


        $key=null;
        if(request()->search){
            $key=request()->search;
            $areas = Area::with('branch')
            ->whereLike(['branch.name','area'],$key)
            ->paginate(10);
            return view('admin.panel.pages.area_list',compact('areas','key'));
        }
        $areas = Area::with('branch')->paginate(10);
        return view('admin.panel.pages.area_list',compact('areas','key'));

    }

    public function edit($id){
        $area=Area::find($id);
        $branches=Branch::all();
        return view('admin.panel.pages.area_edit',compact('area','branches'));
    }

    public function update(Request $request, $id){
        $area=Area::find($id);

        $area->update([
            'branch_id'=>$request->branch,
            'area'=>$request->area,
        ]);

        Toastr::info('Area updated successfully.');
        return redirect()->route('area.list');
    }


    public function delete($area){
        Area::find($area)->delete();
     
        Toastr::warning('Area deleted successfully.');
        return redirect()->back();

    }

}
