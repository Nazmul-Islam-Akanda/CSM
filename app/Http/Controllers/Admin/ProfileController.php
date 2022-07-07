<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile($id){
        $user=User::find($id);
        $branches=Branch::all();
        return view('admin.panel.pages.profile_edit',compact('user','branches'));
    }

    public function profileUpdate(Request $request, $id){
        // dd($request->all());
        $user=User::find($id);
// dd($user);
$check=Hash::check(request('password'), $user->password);
// dd($check);

        $request->validate([
            'email'=>"required|unique:users,email,$id",
            'n_id'=>"required|unique:users,n_id,$id",
        ]);


        if($check==false){
            Toastr::warning('Your old password is invalid.');
        }

        else if($request->new_password==$request->confirm_password && $check==true){
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'role'=>$request->role,
                'password'=>bcrypt($request->new_password),
                'phone'=>$request->phone,
                'n_id'=>$request->n_id,
                'branch_id'=>$request->branch,
            ]);

            Toastr::success('Profile updated successfully.');
            
        }
        else{
            Toastr::warning('New password and confirm password not matched.');
        }
       
        return redirect()->back();
     
    }
}
