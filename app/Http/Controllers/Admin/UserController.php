<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function create(){
        $branches=Branch::all();
        return view('admin.panel.pages.user_add',compact('branches'));
    }

    public function store(Request $request){

        $request->validate([
            'email'=>'unique:users',
            'n_id'=>'unique:users'
        ]);

        // dd($request->all());

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->owner_nid),
            'role'=>$request->role,
            'phone'=>$request->phone,
            'n_id'=>$request->n_id,
            'branch_id'=>$request->branch,
        ]);

        Toastr::success(' User added successfully.');
        return redirect()->back();
    }

    public function list(){
        $users=User::with('branch')->get();
        return view('admin.panel.pages.user_list',compact('users'));
    }
}
