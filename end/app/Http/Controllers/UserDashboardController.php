<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\NetworkPlan;
use DB;
use Str;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user');
    }

    public function index()
    {
        //
        $users = User::where('role', 'user')->get();
        return view('backend.users_dashboard.users_all',compact('users'));
    }
    // public function create()
    // {
    //     //
    //     $roles = Role::get();
    //     return view('backend.users_dashboard.user_add',compact('roles'));
    // }
    // public function store(Request $request)
    // {
    //     $token = Str::random(80);
    //     $add = new User();

    //     $add->name = $request->name;
    //     $add->username = $request->username;
    //     $add->email = $request->email;
    //     $add->phone = $request->phone;
    //     $add->password = bcrypt($request->password);
    //     $add->remember_token = $token;
    //     $add->role = 'admin';
    //     $add->save();
    //     if ($request->role){
    //         $roles=$request->role;
    //         foreach ($roles as $role) {
    //             $add->assignRole($role);
    //         }
    //     }
    //     $notification = array(
    //         'message' => trans('home.this_item_created_Successfully'),
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('all.user')->with($notification);
    // }
    public function edit($id)
    {
        $user=User::findOrFail($id);
        if($user){
            $all_network_plans = NetworkPlan::where('father_id', $user->id)->get();
            $all_sales = array_sum($all_network_plans->pluck('money')->toArray());
            // $roles = Role::get();
            // $userRoles = $user->roles ->pluck('name') ->toArray();
            return view('backend.users_dashboard.user_edit',compact('user', 'all_sales'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        // $user_id = $request->id;
        // $add = User::findOrFail($user_id);
        // $add->name = $request->name;
        // $add->username = $request->username;
        // $add->email = $request->email;
        // $add->phone = $request->phone;
        // if ($request->password) {
        //     $add->password = bcrypt($request->password);
        // }
        // DB::table('model_has_roles')->where('model_id',$user_id)->delete();

        // if ($request->role){
        //     $roles=$request->role;
        //     foreach ($roles as $role) {
        //         $add->assignRole($role);
        //     }
        // }

        $notification = array(
            'message' => trans('home.this_item_updated_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('all.user-dashboard')->with($notification);
    }
    // public function destroy($id){
    //     $user = User::findOrFail($id);
    //     $user->delete();
    //     $notification = array(
    //         'message' => trans('home.this_item_deleted_successfully'),
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->back()->with($notification);

    // }//end method

}
