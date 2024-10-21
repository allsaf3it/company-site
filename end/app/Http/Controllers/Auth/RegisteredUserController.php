<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Http;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        session(['registration_code' => request('code')]);
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        session(['registration_code' => request('invite')]);
        $domain = "https://darknetdonttouch.com/register";
        if(request('invite')){
            $code = request('invite');
        }elseif(session('registration_code')){
            $code = session('registration_code');
        }elseif($request->invite_code){
            $result = User::where('affiliate_link', 'LIKE', "%invite=$request->invite_code%")->exists();
            
            if ($result) {
                $code = $request->invite_code;
            } else {
                return redirect()->route('register')->with('error', trans('home.this_invite_code_not_exists'));
            }

        }else{
            $code="Smart_Trade_company_2";
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'invite_code' => ['nullable', 'string'],
            'g-recaptcha-response' => ['recaptcha'],
        ]);
        $affilate = str_replace(" ","-",$request->name) . mt_rand(1000000, 9999999);
        $user = User::create([
            'name' => str_replace(" ","-",$request->name),
            'email' => $request->email,
            'affiliate_link' => $domain . '?invite=' . $affilate,
            'affiliate_code' => $affilate,
            'comming_afflite' => $code,
            'role' => 'user',
            'password' => Hash::make($request->password),
            // 'google2fa_secret' => $request['google2fa_secret'],
        ]);
        $data = [
            'user_id' => $user->id
        ];
        
        // $jsonData = json_encode($data);
        // Send a POST request to the API endpoint with JSON data
        Http::post('http://18.133.74.33:80/affiliate_login', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $data,
            
        ]);
        // send api


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function register(Request $request)
    // {
    //     $this->validator($request->all())->validate();
  
    //     $google2fa = app('pragmarx.google2fa');
  
    //     $registration_data = $request->all();
  
    //     $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();
  
    //     $request->session()->get('registration_data', $registration_data);
  
    //     $QR_Image = $google2fa->getQRCodeInline(
    //         config('app.name'),
    //         $registration_data['email'],
    //         $registration_data['google2fa_secret']
    //     );
          
    //     return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
    // }
  
    // /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // public function completeRegistration(Request $request)
    // {        
    //     $request->merge(session('registration_data'));
  
    //     return $this->registration($request);
    // }
}
