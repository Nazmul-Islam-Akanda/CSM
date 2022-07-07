<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Models\Branch;
use App\Models\Expense;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Nette\Schema\Expect;

class ExpenseController extends Controller
{
    public function list(){
        $expenses=Expense::with('branch')->get();
        return view('admin.panel.pages.expense_list',compact('expenses'));
    }

    public function create(){
        $branches=Branch::all();
        return view('admin.panel.pages.expense_add',compact('branches'));
    }

    public function store(Request $request){
        // dd($request->all());
        Expense::create([
            'branch_id'=>$request->branch,
            'date'=>$request->date,
            'time'=>$request->time,
            'expense'=>$request->amount,
            'description'=>$request->description,
        ]);

        Toastr::success(' Expense added successfully.');
        return redirect()->back();
    }

    public function edit($id){
        $expense=Expense::find($id);
        $branches=Branch::all();
        return view('admin.panel.pages.expense_edit',compact('branches','expense'));
    }

    public function update(Request $request, $id){
        $expense=Expense::find($id);

        $expense->update([
            'branch_id'=>$request->branch,
            'date'=>$request->date,
            'time'=>$request->time,
            'expense'=>$request->amount,
            'description'=>$request->description,
        ]);

        Toastr::info('Expense updated successfully.');
        return redirect()->route('transaction.expense.list');
    }

    public function delete($id){
        Expense::find($id)->delete();
     
        Toastr::warning('Expense deleted successfully.');
        return redirect()->back();

    }
    
}
