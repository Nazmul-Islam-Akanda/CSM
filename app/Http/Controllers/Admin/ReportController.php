<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Exports\IncomeExport;
use App\Exports\ExpenseExport;
use App\Exports\ShipmentExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{

//income report
    public function incomeReport(){

        $branches=Branch::all();

        $reports=[];
        if(request()->has('fromdate'))
        {
            $from_date=request()->fromdate;
            $to_date=request()->todate;
            $branch_id=request()->branch;
        // with branch
        if($branch_id){
            $reports=Income::with('branch','from_branch','customer','shipment')->whereBetween('created_at',[$from_date,$to_date])->where('beneficiary_branch_id',$branch_id)->get();
        }
       // without branch
       if(!$branch_id){
    $reports=Income::with('branch','from_branch','customer','shipment')->whereBetween('created_at',[$from_date,$to_date])->get();
       } 
  
        }
        return view('admin.panel.pages.income_report',compact('reports','branches'));

    }



//income report download
    public function incomeReportExcel(){

        $branches=Branch::all();

        $reports=[];
        if(request()->has('fromdate'))
        {
            $from_date=request()->fromdate;
            $to_date=request()->todate;
            $branch_id=request()->branch;
        // with branch
        if($branch_id){
            $reports=Income::with('branch','from_branch','customer','shipment')->whereBetween('created_at',[$from_date,$to_date])->where('beneficiary_branch_id',$branch_id)->get();
            // dd($reports);
            // return (new IncomeExport($reports));
           return Excel::download(new IncomeExport($reports), 'incomes.xlsx');
        }
       // without branch
      if(!$branch_id){
    $reports=Income::with('branch','from_branch','customer','shipment')->whereBetween('created_at',[$from_date,$to_date])->get();
    return Excel::download(new IncomeExport($reports), 'incomes.xlsx');
    } 
  
        }

    }




    //expense report
    public function expenseReport(){

        $branches=Branch::all();

        $reports=[];
        if(request()->has('fromdate'))
        {
            $from_date=request()->fromdate;
            $to_date=request()->todate;
            $branch_id=request()->branch;
        // with branch
        if($branch_id){
            $reports=Expense::with('branch')->whereBetween('date',[$from_date,$to_date])->where('branch_id',$branch_id)->get();
        }
       // without branch
       if(!$branch_id){
    $reports=Expense::with('branch')->whereBetween('date',[$from_date,$to_date])->get();
       } 
  
        }
        return view('admin.panel.pages.expense_report',compact('reports','branches'));

    }



    //expense report download
    public function expenseReportExcel(){

        $branches=Branch::all();

        $reports=[];
        if(request()->has('fromdate'))
        {
            $from_date=request()->fromdate;
            $to_date=request()->todate;
            $branch_id=request()->branch;
        // with branch
        if($branch_id){
            $reports=Expense::with('branch')->whereBetween('date',[$from_date,$to_date])->where('branch_id',$branch_id)->get();
            return Excel::download(new ExpenseExport($reports), 'expenses.xlsx');
        }
       // without branch
       if(!$branch_id){
    $reports=Expense::with('branch')->whereBetween('date',[$from_date,$to_date])->get();
    return Excel::download(new ExpenseExport($reports), 'expenses.xlsx');
       } 
  
        }

    }



//shipment report to branch
public function shipmentReportToBranch(){

    $branches=Branch::all();

    $reports=[];

    
    if(request()->has('fromdate'))
    {
        $from_date=request()->fromdate;
        $to_date=request()->todate;
        $branch_id=request()->branch;
        $to_branch_id=request()->to_branch;
    // with branch
    if($branch_id){
        if(request()->shipment_direction == "on_delivery"){
            $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('branch_id',$branch_id)->where('to_branch_id',$to_branch_id)->where('shipment_direction','on_delivery')->get();
        }
        if(request()->shipment_direction == "return"){
            $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('branch_id',$branch_id)->where('to_branch_id',$to_branch_id)->where('shipment_direction','return')->get();
        }
        
    }
   // without branch
   if(!$branch_id){
    if(request()->shipment_direction == "on_delivery"){
        $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('shipment_direction','on_delivery')->get();
    }
    if(request()->shipment_direction == "return"){
        $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('shipment_direction','return')->get();
    }

   } 

    }
    return view('admin.panel.pages.shipment_report',compact('reports','branches'));

}




//shipment report to branch download
public function shipmentReportToBranchExcel(){

    $branches=Branch::all();

    $reports=[];
    if(request()->has('fromdate'))
    {
        $from_date=request()->fromdate;
        $to_date=request()->todate;
        $branch_id=request()->branch;
    // with branch
    if($branch_id){
        if(request()->shipment_direction == "on_delivery"){
            $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('branch_id',$branch_id)->where('shipment_direction','on_delivery')->get();
            return Excel::download(new ShipmentExport($reports), 'shipments_to_branch_on_delivery.xlsx');
        }
        if(request()->shipment_direction == "return"){
            $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('branch_id',$branch_id)->where('shipment_direction','return')->get();
            return Excel::download(new ShipmentExport($reports), 'shipments_to_branch_return.xlsx');
        }
        
    }
   // without branch
   if(!$branch_id){
    if(request()->shipment_direction == "on_delivery"){
        $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('shipment_direction','on_delivery')->get();
        return Excel::download(new ShipmentExport($reports), 'shipments_all_branch_on_delivery.xlsx');
    }
    if(request()->shipment_direction == "return"){
        $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('shipment_direction','return')->get();
        return Excel::download(new ShipmentExport($reports), 'shipments_all_branch_return.xlsx');
    }

   } 

    }


}



//shipment report from branch
public function shipmentReportFromBranch(){

    $branches=Branch::all();

    $reports=[];
    if(request()->has('fromdate'))
    {
        $from_date=request()->fromdate;
        $to_date=request()->todate;
        $branch_id=request()->branch;
        $from_branch_id=request()->from_branch;
    // with branch
    if($branch_id){
        if(request()->shipment_direction == "on_delivery"){
            $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('to_branch_id',$branch_id)->where('branch_id',$from_branch_id)->where('shipment_direction','on_delivery')->get();
        }
        if(request()->shipment_direction == "return"){
            $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('to_branch_id',$branch_id)->where('branch_id',$from_branch_id)->where('shipment_direction','return')->get();
        }
        
    }
   // without branch
   if(!$branch_id){
    if(request()->shipment_direction == "on_delivery"){
        $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('shipment_direction','on_delivery')->get();
    }
    if(request()->shipment_direction == "return"){
        $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('shipment_direction','return')->get();
    }

   } 

    }
    return view('admin.panel.pages.shipment_report',compact('reports','branches'));

}


//shipment report from branch download
public function shipmentReportFromBranchExcel(){

    $branches=Branch::all();

    $reports=[];
    if(request()->has('fromdate'))
    {
        $from_date=request()->fromdate;
        $to_date=request()->todate;
        $branch_id=request()->branch;
        $from_branch_id=request()->from_branch;
    // with branch
    if($branch_id){
        if(request()->shipment_direction == "on_delivery"){
            $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('to_branch_id',$branch_id)->where('branch_id',$from_branch_id)->where('shipment_direction','on_delivery')->get();
            return Excel::download(new ShipmentExport($reports), 'shipments_from_branch_on_delivery.xlsx');
        }
        if(request()->shipment_direction == "return"){
            $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('to_branch_id',$branch_id)->where('branch_id',$from_branch_id)->where('shipment_direction','return')->get();
            return Excel::download(new ShipmentExport($reports), 'shipments_from_branch_return.xlsx');
        }
    }
   // without branch
   if(!$branch_id){
    if(request()->shipment_direction == "on_delivery"){
        $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('shipment_direction','on_delivery')->get();
        return Excel::download(new ShipmentExport($reports), 'shipments_all_branch_on_delivery.xlsx');
    }
    if(request()->shipment_direction == "return"){
        $reports=Shipment::with('branch','tobranch','toarea','fromarea','customer')->whereBetween('date',[$from_date,$to_date])->where('shipment_direction','return')->get();
        return Excel::download(new ShipmentExport($reports), 'shipments_all_branch_return.xlsx');
    }
   } 

    }

}




}
