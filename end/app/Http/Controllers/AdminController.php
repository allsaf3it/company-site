<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin.index');
    }//end method

    public function adminLogin(){
        return view('admin.admin_login');
    }//end method

    public function adminProfile(){
        $id = Auth::User()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }//end method
    public function adminProfileStore(Request $request){
        $id = Auth::User()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('uploads/admin_images/' . $data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//end method
    public function adminChangePassword(){
        return view('admin.admin_change_password');
    }//end method

    public function adminUpdatePassword(Request $request){
        // validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        //Math the Old Password
        if(!Hash::check($request->old_password, Auth::user()->password)){
            return back()->with('error', 'Old Password Dosen\'t Match!!');
        }
        // update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with('status' ,'Password Changed Successfully');


    }//end method

    public function adminDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }//end method


}

