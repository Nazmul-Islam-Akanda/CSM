<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
            'password'=>bcrypt($request->password),
            'role'=>$request->role,
            'phone'=>$request->phone,
            'n_id'=>$request->n_id,
            'branch_id'=>$request->branch,
        ]);

        Toastr::success(' User added successfully.');
        return redirect()->route('user.list');
    }

    public function list(){


        $key=null;
        if(request()->search){
            $key=request()->search;
            $users = User::with('branch')
            ->whereLike(['branch.name','name','email','role','phone','n_id'],$key)
            ->get();
            return view('admin.panel.pages.user_list',compact('users','key'));
        }
        $users = User::with('branch')->get();
        return view('admin.panel.pages.user_list',compact('users','key'));

    }

    public function edit($id){
        $user=User::find($id);
        $branches=Branch::all();
        return view('admin.panel.pages.user_edit',compact('user','branches'));
    }

    public function update(Request $request, $id){
         // dd($request->all());
         $user=User::find($id);
         // dd($user);
         
                 $request->validate([
                     'email'=>"required|unique:users,email,$id",
                     'n_id'=>"required|unique:users,n_id,$id",
                 ]);
         
         
                 if($request->new_password==$request->confirm_password){
                     $user->update([
                         'name'=>$request->name,
                         'email'=>$request->email,
                         'role'=>$request->role,
                         'password'=>bcrypt($request->new_password),
                         'phone'=>$request->phone,
                         'n_id'=>$request->n_id,
                         'branch_id'=>$request->branch,
                     ]);
         
                     Toastr::success('User updated successfully.');
                     
                 }
                 else{
                     Toastr::warning('New password and confirm password not matched.');
                 }
                
                 return redirect()->back();
    }

    public function delete($user){
        User::find($user)->delete();
     
        Toastr::warning('User deleted successfully.');
        return redirect()->back();

    }
}
