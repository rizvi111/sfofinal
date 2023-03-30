<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvestorDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $page_name = 'Dashboard';
        $form_list = InvestorDetails::all();

        return view('pages.form-list',compact('page_name', 'form_list'))->with('no',1);
    }

    public function profile(){
        $page_name = 'Profile';
        $user = Auth::user();

        return view('pages.profile',compact('page_name','user'));
    }
    
    public function form_view($id){
        $client_details = InvestorDetails::findOrFail($id);
        $page_name = $client_details->fname . ' ' . $client_details->sname;
        
        return view('pages.form-view',compact('page_name', 'client_details'));
    }

    public function profile_update(Request $request){
        
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return redirect()->back()->with('success', 'Profile Information Update Successfully!');
    }

    public function update_password(Request $request){
        $this->validate($request, [
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();
        $user->password = $request->password;
        $user->update();
        

        return redirect()->back()->with('success', 'Password Update Successfully!');
    }
}
