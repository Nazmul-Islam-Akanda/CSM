<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    public function list(){
        // $incomes=Income::with('branch','customer','shipment')->get();
        return view('admin.panel.pages.expense_list');
    }

    public function create(){
        $branches=Branch::all();
        return view('admin.panel.pages.expense_add',compact('branches'));
    }
}
