<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BranchController extends Controller
{
    public function create(){
        return view('admin.panel.pages.branch_add');
    }

    public function store(Request $request){

        $request->validate([
            'email'=>'unique:branches',
            'owner_nid'=>'unique:branches',
            'ship_prefix' => 'max:3'
        ]);

        Branch::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'owner_nid'=>$request->owner_nid,
            'address'=>$request->address,
            'owner_name'=>$request->owner_name,
            'owner_phone'=>$request->owner_phone,
            'ship_prefix'=>$request->ship_prefix,
        ]);

        Toastr::success(' Branch added successfully.');
        return redirect()->route('branch.list');
    }

    public function list(){
        $branches=Branch::all();
        return view('admin.panel.pages.branch_list',compact('branches'));
    }

    public function edit($id){
        $branch=Branch::find($id);
        // dd($branch);
        return view('admin.panel.pages.branch_edit',compact('branch'));
    }

    public function update(Request $request, $id){
        $branch=Branch::find($id);

        $request->validate([
            'email'=>"required|unique:branches,email,$id",
            'owner_nid'=>"required|unique:branches,owner_nid,$id",
            'ship_prefix' => 'max:3'
        ]);

        $branch->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'owner_nid'=>$request->owner_nid,
            'address'=>$request->address,
            'owner_name'=>$request->owner_name,
            'owner_phone'=>$request->owner_phone,
            'ship_prefix'=>$request->ship_prefix,
        ]);

        Toastr::info('Branch updated successfully.');
        return redirect()->route('branch.list');
    }

    public function delete($branch){
        Branch::find($branch)->delete();
     
        Toastr::warning('Branch deleted successfully.');
        return redirect()->back();

    }
}
