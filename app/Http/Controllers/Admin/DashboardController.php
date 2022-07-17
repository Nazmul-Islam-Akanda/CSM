<?php

namespace App\Http\Controllers\Admin;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Customer;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(){
        $count['shipments']=Shipment::all()->count();
        $count['customers']=Customer::all()->count();
        // $count['income']= Income::whereDate('created_at',today())->sum('income');
        $count['income']= Income::whereMonth('created_at', Carbon::now()->month)->sum('income');
        // $count['expense']= Expense::whereDate('created_at',today())->sum('expense');
        $count['expense']= Expense::whereMonth('date',Carbon::now()->month)->sum('expense');
        $count['profit']=$count['income']- $count['expense'];
        return view('admin.panel.pages.dashboard',compact('count'));
    }
}
