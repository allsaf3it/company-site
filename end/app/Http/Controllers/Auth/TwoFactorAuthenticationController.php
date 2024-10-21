<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class TwoFactorAuthenticationController extends Controller
{

    public function index(){
        $user = auth()->user();
        return view('auth.two-factor-auth', compact('user'));
    }

}
