<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use DB;
use Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin');
    }

    public function index()
    {
        //
        $users = User::where('role', '!=', 'user')->get();
        return view('backend.users.users_all',compact('users'));
    }
    public function create()
    {
        //
        $roles = Role::get();
        return view('backend.users.user_add',compact('roles'));
    }
    public function store(Request $request)
    {
        $token = Str::random(80);
        $add = new User();

        $add->name = $request->name;
        $add->username = $request->username;
        $add->email = $request->email;
        $add->phone = $request->phone;
        $add->password = bcrypt($request->password);
        $add->remember_token = $token;
        $add->role = 'admin';
        $add->save();
        if ($request->role){
            $roles=$request->role;
            foreach ($roles as $role) {
                $add->assignRole($role);
            }
        }
        $notification = array(
            'message' => trans('home.this_item_created_Successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.user')->with($notification);
    }
    public function edit($id)
    {
        $user=User::findOrFail($id);
        if($user){
            $roles = Role::get();
            $userRoles = $user->roles ->pluck('name') ->toArray();
            return view('backend.users.user_edit',compact('roles','userRoles', 'user'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $user_id = $request->id;
        $add = User::findOrFail($user_id);
        $add->name = $request->name;
        $add->username = $request->username;
        $add->email = $request->email;
        $add->phone = $request->phone;
        if ($request->password) {
            $add->password = bcrypt($request->password);
        }
        DB::table('model_has_roles')->where('model_id',$user_id)->delete();

        if ($request->role){
            $roles=$request->role;
            foreach ($roles as $role) {
                $add->assignRole($role);
            }
        }

        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.user')->with($notification);
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        $notification = array(
            'message' => trans('home.this_item_deleted_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method

    public function UserDashboard(){
        $id = Auth::User()->id;
        $userData = User::find($id);
        return view('dashboard', compact('userData'));
    }//end method
    public function userProfileStore(Request $request){
        $id = Auth::User()->id;
        $data = User::find($id);
        // validation 
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address' => 'required',
            'photo' => 'mimes:jpeg,jpg,png,gif,svg,webp',
        ]);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('uploads/user_images/' . $data->photo));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/user_images'),$fileName);
            $data['photo'] = $fileName;
        }
        $data->save();
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method

    public function userUpdatePassword(Request $request){
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
    public function userDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }//en method
}
