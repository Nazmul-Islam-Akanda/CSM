<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteSetupController extends Controller
{
    public function setupInfo(){
        // $users=User::with('branch')->get();
        return view('admin.panel.pages.website_setup_info');
    }
}
