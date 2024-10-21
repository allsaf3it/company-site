<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        session(['registration_code' => request('code')]);
        $domain = "https://darknetdonttouch.com/register";
        if(request('invite')){
            $code = request('invite');
        }elseif(session('registration_code')){
            $code = session('registration_code');
        }elseif($input['invite_code']){
            $inputCode = $input['invite_code'];
            $result = User::where('affiliate_link', 'LIKE', "%invite=$inputCode%")->exists();
            
            if ($result) {
                $code = $input['invite_code'];
            } else {
                return redirect()->route('register')->with('error', trans('home.this_invite_code_not_exists'));
            }

        }else{
            $code="Smart_Trade_company_2";
        }
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'invite_code' => ['nullable', 'string'],
            'g-recaptcha-response' => ['recaptcha'],
        ])->validate();
        $affilate = str_replace(" ","-",$input['name']) . mt_rand(1000000, 9999999);
        $user = User::create([
            'name' => str_replace(" ","-",$input['name']),
            'email' => $input['email'],
            'affiliate_link' => $domain . '?invite=' . $affilate,
            'affiliate_code' => $affilate,
            'comming_afflite' => $code,
            'role' => 'user',
            'password' => Hash::make($input['password']),
        ]);
        $data = [
            'user_id' => $user->id
        ];
        
        // $jsonData = json_encode($data);
        Http::post('http://18.133.74.33:80/affiliate_login', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $data,
            
        ]);
        return $user;
        
    }
    
}
