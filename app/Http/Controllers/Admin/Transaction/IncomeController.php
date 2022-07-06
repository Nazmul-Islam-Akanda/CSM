<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Models\Branch;
use App\Models\Income;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class IncomeController extends Controller
{

    public function select(Request $request){
        // dd($request->via);

        if($request->via=='customer')
        {
            return redirect()->route('income.via.customer');
        }

        // if($request->via=="branch")
        // {
        //     return view('admin.panel.pages.income_via.income_from_branch_add');
        // }
    }

    public function list(){
        $incomes=Income::with('branch','customer','shipment')->get();
        return view('admin.panel.pages.income_list',compact('incomes'));
    }


    public function getShipment($from_branch)
    {
        $shipments=Shipment::where('branch_id',$from_branch)->get();
        return response()->json([
            'data'=>$shipments
        ]);
    }

    public function create(){
        return view('admin.panel.pages.income_add');
    }

    public function select_customer(){
        return view('admin.panel.pages.income_via.income_from_customer_add');
    }


    public function store(Request $request){
        // dd($request->all());
        Income::create([
            'beneficiary_branch_id'=>$request->branch,
            'customer_id'=>$request->customer,
            'from_branch_id'=>$request->from_branch,
            'shipment_id'=>$request->shipment_id,
            'income'=>$request->amount,
            'description'=>$request->description,
        ]);

        Toastr::success(' Income added successfully.');
        return redirect()->back();
    }

    public function edit($id){
        $income=Income::find($id);
        $branches=Branch::all();
        return view('admin.panel.pages.income_edit',compact('income','branches'));
    }

    public function update(Request $request, $id){
        $income=Income::find($id);

        $income->update([
            'beneficiary_branch_id'=>$request->branch,
            'customer_id'=>$request->customer,
            'from_branch_id'=>$request->from_branch,
            'shipment_id'=>$request->shipment_id,
            'income'=>$request->amount,
            'description'=>$request->description,
        ]);

        Toastr::info('Income updated successfully.');
        return redirect()->route('transaction.income.list');
    }

    public function delete($id){
        Income::find($id)->delete();
     
        Toastr::warning('Income deleted successfully.');
        return redirect()->back();

    }
    
}
