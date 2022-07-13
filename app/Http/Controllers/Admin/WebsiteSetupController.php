<?php

namespace App\Http\Controllers\Admin;

use App\Models\WebsiteSetup;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class WebsiteSetupController extends Controller
{
    public function setupInfo(){
        $webInfo=WebsiteSetup::first();
        // dd($webInfo);
        return view('admin.panel.pages.website_setup_info',compact('webInfo'));
    }

    public function setupEdit($id){
        $webInfo=WebsiteSetup::find($id);
        return view('admin.panel.pages.website_setup_edit',compact('webInfo'));
    }

    public function setupUpdate(Request $request,$id){
        $webInfo=WebsiteSetup::find($id);

        $filename=$webInfo->logo;

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $filename=date('Ymdhms').'.'.$file->getClientOriginalExtension();
            $file->storeAs('/uploads',$filename);
        }

        // dd($filename);

        $webInfo->update([
            //field name for DB || field name for form
            'name'=>$request->name,
             'contact'=>$request->contact,
             'email'=>$request->email,
             'address'=>$request->address,
             'logo'=>$filename
        ]);
        
        Toastr::success('Website Setup Updated successfully.');
        return redirect()->route('website.setup.info');
    }
}
