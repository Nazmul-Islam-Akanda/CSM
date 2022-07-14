<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Income;
use Illuminate\Http\Request;

class ReportController extends Controller
{
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
            $reports=Income::whereBetween('created_at',[$from_date,$to_date])->where('beneficiary_branch_id',$branch_id)->get();
        }
// without branch
if(!$branch_id){
    $reports=Income::whereBetween('created_at',[$from_date,$to_date])->get();
} 
  
        }
        return view('admin.panel.pages.income_report',compact('reports','branches'));

    }
}
