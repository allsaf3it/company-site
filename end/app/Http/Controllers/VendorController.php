<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function vendorDashboard(){
        return view('vendor.index');
    }//end method
    public function vendorLogin(){
        return view('vendor.vendor_login');
    }//end method
    
    public function vendorProfile(){
        $id = Auth::User()->id;
        $vendorData = User::find($id);
        return view('vendor.vendor_profile_view', compact('vendorData'));
    }//end method
    public function vendorProfileStore(Request $request){
        $id = Auth::User()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->vendor_join = $request->vendor_join;
        $data->vendor_short_info = $request->vendor_short_info;
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('uploads/vendor_images/' . $data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/vendor_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//end method
    public function vendorChangePassword(){
        return view('vendor.vendor_change_password');
    }//end method

    public function vendorUpdatePassword(Request $request){
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
    public function vendorDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }//end method
    
}
