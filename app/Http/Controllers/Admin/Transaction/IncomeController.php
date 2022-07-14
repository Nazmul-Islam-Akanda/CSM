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

        $key=null;
        if(request()->search){
            $key=request()->search;
            $incomes = Income::with('branch','from_branch','customer','shipment')
            ->whereLike(['branch.name','from_branch.name','customer.name','shipment.shipment_id','income','description','from','created_at'],$key)
            ->paginate(10);
            return view('admin.panel.pages.income_list',compact('incomes','key'));
        }
        $incomes = Income::with('branch','from_branch','customer','shipment')->paginate(10);
        return view('admin.panel.pages.income_list',compact('incomes','key'));

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
            'from'=>$request->from,
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
        if($income->from=="customer"){
            return view('admin.panel.pages.income_via.income_from_customer_edit',compact('income','branches'));
        }

        elseif($income->from=="branch"){
            return view('admin.panel.pages.income_via.income_from_branch_edit',compact('income','branches'));
        }
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
