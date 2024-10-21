<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlider;
use App\Models\Setting;
use App\Models\Configration;
use App\Models\BotType;
use App\Models\BotTypeChild;
use App\Models\BotUsdt;
use App\Models\BotOrder;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Notification;
use App\Models\Faq;
use App\Models\Binance;
use App\Models\Pricing;
use App\Models\FeesBot;
use App\Models\DepositBinance;
use Illuminate\Support\Facades\File;
use App\Models\LongTerm;
use App\Models\NetworkPlan;
use App\Models\MediumTerm;
use App\Models\WithdrawHistory;
use GuzzleHttp\Client;
use Http;
use App\Models\About;
use App\Models\PlanHistory;
use App\Models\MyTicker;
use App\Models\Exchange;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        //
        $user = auth()->user();
        $lang=\LaravelLocalization::getCurrentLocale();
        $setting = Setting::first();
        $configration = Configration::first();
        $sliders = HomeSlider::get();
        $bots = BotType::where('status', 1)->get();
        // if($user->apikey != 0 && $user->secretkey != 0){

        //     $apiKey = $user->apikey;
        //     $secretKey = $user->secretkey;
        //     $apiUrl = 'https://api.binance.com/sapi/v3/asset/getUserAsset';
        //     // Timestamp for the request
        //     // $client = new Client();
        //     $response = Http::get('https://api.binance.com/api/v3/time');
        //     $serverTime = json_decode($response->getBody(), true);
        //     $serverTime = $serverTime['serverTime']; // Extract the server time

        //     // Create a query string with the required parameters
        //     $queryString = http_build_query([
        //         'timestamp' => $serverTime, // Include the timestamp correctly
        //     ]);

        //     // Create a signature for the request
        //     $signature = hash_hmac('sha256', $queryString, $secretKey);

        //     // Make the GET request with authentication headers
        //     $response = Http::withHeaders([
        //         'X-MBX-APIKEY' => $apiKey,
        //     ])->post($apiUrl . '?' . $queryString . '&signature=' . $signature);
        //     $responses = json_decode($response->getBody()->getContents());

        //     $getAsset= NULL;
        //     foreach($responses as $responseItem){
        //         if($responseItem->asset == 'USDT'){
        //             $getAsset = $responseItem;
        //         }
        //     }
        //     if($getAsset != null){
        //         $usdt = $getAsset->free;
        //         // $user = User::where('apikey' , $apiKey)->first();
        //     }else{
        //         $usdt = '';
            // }
        return view('dashboard.frontend.index', compact('lang', 'setting', 'sliders', 'bots', 'user'));
        // }else{
        //     $usdt = '';
        //     return view('dashboard.frontend.index', compact('lang', 'setting', 'sliders', 'bots', 'usdt', 'user'));

        // }
    }//end method

    public function getProfile(){
        $user = auth()->user();
        return view('dashboard.frontend.profile', compact('user'));
    }//end method

    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|numeric|regex:/^(\+?\d{1,4}[\s-]?)?(\d{10})$/',
        ]);
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back()->with('success', 'updated profile successfully');
    }//end method

    public function updatePassword(Request $request){
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
        return back()->with('success' ,'Password Changed Successfully');


    }//end method


    public function getBot($link){
        $lang=\LaravelLocalization::getCurrentLocale();
        $bot =BotType::where('link',$link)->first();

        if($bot){
            $bots = BotTypeChild::where('type_id',$bot->id)->where('status',1)->get();
            ////// seo script//////
            // list($schema, $metatags)= $this->serviceSeo($link);
            return view('dashboard.frontend.bot-details',compact('bot','bots'));
        }else{
            abort('404');
        }
    }
    public function getBotDetails($link){
        $lang=\LaravelLocalization::getCurrentLocale();
        $bot =BotTypeChild::where('link',$link)->first();
        $user = auth()->user();

        if($bot){
            $chartTime = BotOrder::select('created_at')->where('bot_id',$bot->id)->where('side', 'sell')->get()->pluck('created_at')->map(function ($createdAt) {
                return Carbon::parse($createdAt)->format('Y-m-d');
            })->toArray();
            $chartProfit = BotOrder::select('profit')->where('bot_id',$bot->id)->where('side', 'sell')->get()->pluck('profit')->toArray();
            $allProfit = [];
            foreach($chartProfit as $chartProfitItem){
                $lastValue  = end($allProfit);
                $chartProfitItem += $lastValue;
                $allProfit[] = number_format($chartProfitItem, 2, '.', '');
            }
            $profits = BotOrder::select('profit')->where('bot_id', $bot->id)->where('side', 'sell')->get()->pluck('profit')->toArray();
            $profit = array_sum($profits);
            $positiveProfits = BotOrder::select('profit')->where('bot_id', $bot->id)->where('side', 'sell')->where('profit' , '>', 0)->get()->pluck('profit')->toArray();
            $positiveProfit = array_sum($positiveProfits);
            $negativeProfits = BotOrder::select('profit')->where('bot_id', $bot->id)->where('side', 'sell')->where('profit' , '<', 0)->get()->pluck('profit')->toArray();
            $negativeProfit = array_sum($negativeProfits);
            $botActive = BotUsdt::where('user_id', $user->id)->where('bot_id', $bot->id)->where('bot_status', 1)->orderBy('id', 'desc')->first();
            ////// seo script//////
            // list($schema, $metatags)= $this->serviceSeo($link);
            return view('dashboard.frontend.bot-details-child',compact('bot', 'chartTime', 'allProfit', 'profit', 'positiveProfit', 'negativeProfit', 'positiveProfits', 'negativeProfits', 'botActive'));
        }else{
            abort('404');
        }
    }
 
    public function saveUsdt(Request $request){
        $request->validate([
            'usdt'=>'required|numeric|min:50',
        ]);
        $user = auth()->user();
        $bot = BotTypeChild::where('id', $request->id)->first();
        if($bot){
            $botsCountActive = count(BotUsdt::where('user_id', $user->id)->where('bot_id', $bot->id)->where('bot_status', 1)->get());
            $userPricing = (User::where('id', $user->id)->first())->pricing->num_bots;
            $todayDate = Carbon::today();
            $comparisonDate = Carbon::parse($user->end_plan); 
            $exchange = $user->exchange;
            if(! empty($exchange)){
                // get bot ticker and check  if this ticker with currency = 1
                $walletTicker = MyTicker::select($exchange)->where('ticker', $bot->ticker)->first();
                if($botsCountActive < $userPricing && $todayDate->isBefore($comparisonDate) == true &&  $user->fees > 2 && $request->usdt >= 50 && $walletTicker->$exchange == 1 ){
    
                    $data = BotUsdt::where('user_id', $user->id)->where('bot_id', $bot->id)->where('bot_status', 1)->orderBy('id', 'desc')->first();
    
                    $getUser = User::find($user->id);
                    if($getUser){
    
                        $botUsdt = new BotUsdt();
                        $botUsdt->orders_usdt = $request->usdt;
                        $botUsdt->start_usdt = $request->usdt;
                        $botUsdt->user_id = $user->id;
                        $botUsdt->bot_id = $bot->id;
                        $botUsdt->bot_status = 1;
                        $botUsdt->save();
        
                        return redirect()->route('my-bots')->with(['success'=>trans('home.the bot is launched')]);
                    }else{
                        return redirect()->back()->with(['error'=>trans("home.this user doesn't exists")]);
                    }
    
                }else{
                    return redirect()->back()->with(['error'=>trans('home.check your bots count in your package or your exchange')]);
                }
            }else{
                return redirect()->back()->with(['error'=>trans('home.you should choose your exchange first')]);
            }

        }else{
            abort('404');
        }
    }

    public function stopBot($id){
        $user = auth()->user();
        $botActive = BotUsdt::where('user_id', $user->id)->where('bot_id', $id)->where('bot_status', 1)->orderBy('id', 'desc')->first();

        if($botActive == null){
            return redirect()->back()->with(['error'=>trans('home.this bot is already shutdown')]);
        }else{
            $data = [
                'shutdown' => $botActive->bot_id,
                'userid' => $user->id
            ];
            
            // $jsonData = json_encode($data);
            // Send a POST request to the API endpoint with JSON data
            Http::post('http://18.133.74.33:80/shutdown', [
                'headers' => [
                    'Content-Type' => 'application/json', // Set the content type to JSON
                ],
                'body' => $data, // Send JSON data in the body
                // You can also set headers, authentication, etc. here
            ]);
            // $botActive->update(['bot_status' => 0]);
            // send api
            return redirect()->route('my-bots')->with(['success'=>trans('home.this bot is shutdown succsesfully')]);
        }
    }


    //get My Bots
    public function getMyBots(){
        $user = auth()->user();
        $lang=\LaravelLocalization::getCurrentLocale();
        $bot_usdt = BotUsdt::select('bot_id')->where('user_id', $user->id)->where('bot_status', 1)->pluck('bot_id')->toArray();  // bot_status
        $bots = BotTypeChild::whereIn('id', $bot_usdt)->get();
        $bot_usdt_disabled = BotUsdt::select('bot_id')->where('user_id', $user->id)->where('bot_status', 0)->pluck('bot_id')->toArray();
        $bots_disabled = BotTypeChild::whereIn('id', $bot_usdt_disabled)->get();
        $profits = [];
        $profitsDisabled = [];
        foreach($bots as $bot){
            $botItem = BotUsdt::where('user_id', $user->id)->where('bot_id', $bot->id)->orderBy('created_at', 'desc')->first();  //->where('bot_status', 1)
            if ($botItem) {
                $timeBlogItem = $botItem->created_at->format('Y-m-d h:m:s');


                $botBainanceItemTime = Binance::select('profit_per')->where('user_id', $user->id)->where('bot_num', $bot->id)->where('created_at', '>', $timeBlogItem)->orderBy('created_at', 'desc')->get()->pluck('profit_per')->toArray();
                $profit = array_sum($botBainanceItemTime);
                // $botBainanceItem = App\Models\Binance::where('user_id', $user->id)->where('bot_num', $bot->id)->where('created_at', '>', $timeBlogItem)->orderBy('created_at', 'desc')->first();
            }
            $profits[] = $profit;

        }
        if(count($bots_disabled) > 0){
            foreach($bots_disabled as $bot_disabled){
                $botItem = BotUsdt::where('user_id', $user->id)->where('bot_id', $bot_disabled->id)->orderBy('created_at', 'desc')->first();
                if ($botItem) {
                    $timeBlogItem = $botItem->created_at->format('Y-m-d h:m:s');
                    $botBainanceItemTime = Binance::select('profit_per')->where('user_id', $user->id)->where('bot_num', $bot_disabled->id)->where('created_at', '>', $timeBlogItem)->orderBy('created_at', 'desc')->get()->pluck('profit_per')->toArray();
                    $profit_deactivate = array_sum($botBainanceItemTime);
                    // $botBainanceItem = App\Models\Binance::where('user_id', $user->id)->where('bot_num', $bot->id)->where('created_at', '>', $timeBlogItem)->orderBy('created_at', 'desc')->first();
                    $profitsDeactivate[] = $profit_deactivate;
                }
            }
            return view('dashboard.frontend.my-bots',compact('bots', 'bots_disabled', 'profits', 'profitsDeactivate'));
        }else{
            return view('dashboard.frontend.my-bots',compact('bots', 'bots_disabled', 'profits'));
        }
    }

    public function shutdownAllBots(){
        $user = auth()->user();
        $bot_usdt = BotUsdt::select('bot_id', 'bot_status')->where('user_id', $user->id)->where('bot_status', 1)->pluck('bot_id')->toArray();  // bot_status
        $bots = BotTypeChild::whereIn('id', $bot_usdt)->get();
        $bot_usdtActive = BotUsdt::where('user_id', $user->id)->where('bot_status', 1)->get();

        $bot_usdtActive->each(function ($bot) {
            $bot->update([
                'bot_status' => 0
            ]);
        });
        $data = [
            'shutdown' => 0,
            'userid' => $user->id
        ];
        Http::post('http://18.133.74.33:80/shutdown', [
            'headers' => [
                'Content-Type' => 'application/json', 
            ],
            'body' => $data,
        ]);
        // dd($bot_usdtActive);
        // foreach($bot_usdtActive as $bot){
        //     $bot->update([
        //         'bot_status' => 0
        //     ]);
        // }
        return redirect()->back()->with('success', trans('home.all-bots-shutdowen-successfully'));

    }

    public function getMyBotDetails($link){
        $user = auth()->user();
        $lang=\LaravelLocalization::getCurrentLocale();
        $bot =BotTypeChild::where('link',$link)->first();
        $botActive = BotUsdt::where('user_id', $user->id)->where('bot_id', $bot->id)->where('bot_status', 1)->orderBy('id', 'desc')->first();
        if($bot){
            $biananceBots = Binance::where('user_id', $user->id)->where('bot_num', $bot->id)->get();
            $botsUsdt = BotUsdt::where('user_id', $user->id)->where('bot_id', $bot->id)->get();

            ////// seo script//////
            return view('dashboard.frontend.mybot-details',compact('bot', 'biananceBots', 'botsUsdt', 'botActive'));
        }else{
            abort('404');
        }
    }

    public function getPackages(){
        $user = auth()->user();
        $pricings = Pricing::where('status', 1)->get();
        return view('dashboard.frontend.packages',compact('pricings', 'user'));

    }
    public function upgrade(Request $request){
        $package = Pricing::find($request->id);
        if($package){
            if($package->discount <= auth()->user()->fees){
                $user = User::find(auth()->user()->id);
                $user->fees = $user->fees - $package->discount;
                $user->plan_id = $package->id;
                $user->save();
                $data = [
                    'user_id' => $user->id,
                    'plan_id' => $package->id
                ];
                
                //save data in PlanHistory table
                $planHistory = new PlanHistory();
                $planHistory->user_id = $user->id;
                $planHistory->plan_id = $package->id;
                $planHistory->amount = $package->discount;
                $planHistory->save();

                // $jsonData = json_encode($data);
                // Send a POST request to the API endpoint with JSON data
                Http::post('http://18.133.74.33:80/affiliate_profit', [
                    'headers' => [
                        'Content-Type' => 'application/json', // Set the content type to JSON
                    ],
                    'body' => $data, // Send JSON data in the body
                ]);
                // send api
                
                
                //real time
                $pusherData = [
                    'user_id' => $user->id,
                    'title_en' => $package->name_en,
                    'title_ar' => $package->name_ar,
                    'content_en' => 'you have subscribe on plan',
                    'content_ar' => 'لقد اشتركت فالباقة',
                ];

                //save in db 
                $notification = new Notification();
                $notification->user_id = $user->id;
                $notification->title_en = $package->name_en;
                $notification->title_ar = $package->name_ar;
                $notification->content_en = 'you have subscribe on plan';
                $notification->content_ar = 'لقد اشتركت فالباقة';
                $notification->save();
                //send notification
                event(new NewNotification($pusherData));
                return redirect()->back()->with('success', trans('home.You have successfully subscribed'));
            }else{
                return redirect()->route('deposite')->with('error', trans('home.check your fees'));
            }
        }else{
            return redirect()->back()->with('error', trans('home.no package exists'));
        }
    }

    public function getSTwallet(){
        $user = auth()->user();
        $feesBots = FeesBot::where('user_id', $user->id)->get();
        $depositsBinance = DepositBinance::where('user_id', $user->id)->get();
        $withdrawHistory = WithdrawHistory::where('user_id', $user->id)->get();
        $planHistory = PlanHistory::where('user_id', $user->id)->get();
        return view('dashboard.frontend.st-wallet',compact('feesBots', 'depositsBinance', 'withdrawHistory' ,'user', 'planHistory'));

    }
    
    public function getMediumTerm(){
        $user = auth()->user();
        $mediumTerm = MediumTerm::paginate(12);
        return view('dashboard.frontend.medium-term',compact('user', 'mediumTerm'));

    }
    public function searchMediumTerm(Request $request){
        $search_input = $request->input('search_input');
        if ($search_input == '') {
             $mediumTerm = MediumTerm::paginate(12);
        }else{
            $mediumTerm = MediumTerm::where('ticker', 'LIKE', '%' . $search_input . '%')->paginate(12);

        }   
        return view('dashboard.frontend.search-medium-term',compact('mediumTerm'));
    }

    public function getLongTerm(){
        $user = auth()->user();
        $longTerm = LongTerm::paginate(12);
        return view('dashboard.frontend.long-term',compact('user', 'longTerm'));

    }

    public function searchLongTerm(Request $request){
        $search_input = $request->input('search_input');
        if ($search_input == '') {
             $longTerm = LongTerm::paginate(12);
        }else{
            $longTerm = LongTerm::where('ticker', 'LIKE', '%' . $search_input . '%')->paginate(12);

        }   
        return view('dashboard.frontend.search-long-term',compact('longTerm'));
    }

    public function getInviteFriends(){
        $user = auth()->user();
        $all_network_plans = NetworkPlan::where('father_id', $user->id)->get();
        $all_sales = array_sum($all_network_plans->pluck('money')->toArray());
        $all_team = count($all_network_plans->pluck('user_id')->toArray());
        $user_team = NetworkPlan::where('father_id', $user->id)->whereIn('id', function ($query)  use ($user) {
            $query->select(DB::raw('MAX(id)'))
                ->from('network_plans')
                ->where('father_id', $user->id)
                ->groupBy('user_id');
        })->get();
        
        $topUsers = User::withSum('allSales', 'money')->where('role', 'user')->take(3)->get();
        return view('dashboard.frontend.invite-friends',compact('user', 'all_sales', 'all_team', 'user_team', 'topUsers'));
    }

    public function getWithdraw(){
        return view('dashboard.frontend.withdraw');
    }

    // public function saveWithdraw(Request $request){
    //     $user = auth()->user();
    //     $request->validate([
    //         'withdraw' => 'numeric|max:100',
    //         'wallet' => 'string',
    //     ]);
    //     if($request->withdraw <= $user->available_profit && $user->withdraw_status == 0){

    //         return view('dashboard.frontend.transfer-stwallet')->with('success', trans('home.operation accomplished successfully'));

    //     }else{
    //         return view('dashboard.frontend.transfer-stwallet')->with('error', trans('home.check_your_operations_today_and_available_profit'));
    //     }
    // }
    public function saveWithdraw(Request $request) {
        $user = auth()->user();

        $request->validate([
            'withdraw' => 'numeric|min:10|max:100',
            'wallet' => 'string',
        ]);

        if ($request->withdraw <= $user->available_profit && $user->withdraw_status == 0) {
            $data = [
                'user_id' => $user->id,
                'address_wallet' => $request->wallet,
                'withdraw_amount' => $request->withdraw
            ];
            
            // $jsonData = json_encode($data);
            // dd($jsonData);
            // Send a POST request to the API endpoint with JSON data
            $response = Http::post('http://18.133.74.33:80/withdraw', [
                'headers' => [
                    'Content-Type' => 'application/json', // Set the content type to JSON
                ],
                'body' => $data, // Send JSON data in the body
            ])->throw(); // This will throw an exception for 4xx and 5xx status codes, allowing you to handle errors.
            $user->update([
                // 'available_profit' => $user->available_profit - $request->withdraw,
                'withdraw_status' => 1
            ]);
            // Check the response or handle errors as needed
            $apiResponse = $response->json(); // Convert response to JSON
            // Do something with $apiResponse

            return redirect()->route('invitefriends')->with('success', trans('home.operation accomplished successfully'));
        } else {
            return redirect()->route('invitefriends')->with('error', trans('home.check_your_operations_today_and_available_profit'));
        }
    }

    public function getTransferStWallet(){
        $user = auth()->user();
        return view('dashboard.frontend.transfer-stwallet', compact('user'));
    }

    public function saveTransferStWallet(Request $request){
        $user = auth()->user();
        $request->validate([
            'transfer' => 'numeric|min:10',
        ]);
        if($request->transfer <= $user->available_profit && $user->withdraw_status == 0){
            $editUser = User::find($user->id);
            $editUser->available_profit = $user->available_profit - $request->transfer;
            $editUser->fees = $user->fees + $request->transfer;
            $editUser->save();
            return redirect()->route('invitefriends')->with('success', trans('home.operation accomplished successfully'));

        }else{
            return redirect()->route('invitefriends')->with('error', trans('home.check_your_operations_today_and_available_profit'));
        }
    }

    public function deposite()
    {
        $user = auth()->user();
        // Data to be embedded in the QR code
        $data = (About::select('wallet_number')->first())->wallet_number;
        //qrcode
        $qrcode = QrCode::size(150)->generate($data);
        // Pass the path to the generated QR code image to your view
        return view('dashboard.frontend.deposite', compact('data', 'qrcode', 'user'));
    }
    public function getMyWallet(){
        $user = auth()->user();
        $exchanges = Exchange::get();
        return view('dashboard.frontend.my-wallet', compact('user', 'exchanges'));
    }
    public function saveMyWallet(Request $request){
        $request->validate([
            'apikey' => 'nullable|string',
            'secretkey' => 'nullable|string',
            'passphrase' => 'nullable|string',
        ]);
        $user = User::find(auth()->user()->id);
        if($user){
            $user->exchange = $request->wallet_type;
            $user->apikey = $request->apikey;
            $user->secretkey = $request->secretkey;
            $user->passphrase = $request->passphrase;
            $user->save();
            return redirect()->back()->with('success', trans('home.you are update your data succsessfully'));
        }else{
            return redirect()->back()->with('error', trans('home.no user exists'));
        }
    }

    public function saveTxid(Request $request){
        $user = auth()->user();
        $data = $request->txid;
        // Check if a record with the given txid exists
        $recordExists = DepositBinance::where('textId', $data)->exists();    
    
        // Check if a record with "Internal transfer" prepended to the given txid exists
        $internalTxid = "Internal transfer " . $data;
        $internalTransferExists = DepositBinance::where('textId', $internalTxid)->exists();
        if($recordExists == true || $internalTransferExists == true){
            if ($recordExists == true) {
                $changeStatus = DepositBinance::where('textId', $data)->where('status', 0)->first();
                if($changeStatus){
                    $changeStatus->update([
                        'status' => 1,
                        'user_id' => $user->id
                    ]);
                    $user->update([
                        'fees' => $user->fees + $changeStatus->amount
                    ]);
                    return redirect()->back()->with('success', trans('home.textId success'));
                }else{
                    return redirect()->back()->with('error', trans('home.you use this txID Before'));
                }
            }
            if ($internalTransferExists == true) {
                $changeStatusWithout = DepositBinance::where('textId', $internalTxid)->where('status', 0)->first();
                if($changeStatusWithout){
                    $changeStatusWithout->update([
                        'status' => 1,
                        'user_id' => $user->id
                    ]);
                    $user->update([
                        'fees' => $user->fees + $changeStatusWithout->amount
                    ]);
                    return redirect()->back()->with('success', trans('home.textId success'));
                }else{
                    return redirect()->back()->with('error', trans('home.you use this txID Before'));
                }
            }
        }else{
            $user = auth()->user();
            $apiKey = 'az5CLY8aYzpc0p69lB01v4JxG9dSb7ReqFdWE4d08UgvTTgp692rbWLuEGdcy3dy';
            $secretKey = 'nj7khvNdxwxJf4IGhhoGWuPleAX23tlQUYnK0aWdrPeZLQRGKyx0ZncyTFzGiEG6';
    
            $apiUrl = 'https://api.binance.com/sapi/v1/capital/deposit/hisrec';
    
            // Timestamp for the request
            // $client = new Client();
            $response = Http::get('https://api.binance.com/api/v3/time');
            $serverTime = json_decode($response->getBody(), true);
            $serverTime = $serverTime['serverTime']; // Extract the server time
    
            // Create a query string with the required parameters
            $queryString = http_build_query([
                'timestamp' => $serverTime, // Include the timestamp correctly
            ]);

            // Create a signature for the request
            $signature = hash_hmac('sha256', $queryString, $secretKey);
    
            // Make the GET request with authentication headers
            $response = Http::withHeaders([
                'X-MBX-APIKEY' => $apiKey,
            ])->get($apiUrl . '?' . $queryString . '&signature=' . $signature);
            $responses = json_decode($response->getBody()->getContents());
            $getAllTransctions= [];
            foreach($responses as $responseItem){
                if($responseItem->coin == 'USDT' && $responseItem->network == 'TRX'){
                    $getAllTransctions[] = $responseItem;
                }
            }

            $getAllDepositeBinance = DepositBinance::select('textId')->pluck('textId')->toArray();
            $newDepositeBinance = [];
            foreach($getAllTransctions as $oneTransaction){
                if (!in_array($oneTransaction->txId, $getAllDepositeBinance)) {
                    // If $myVariable is not in $myArray, set it to $myNewVariable
                    $newDepositeBinance[] = $oneTransaction->txId; // store all txid data from binnance not in my database
                }
            }
            $allNewDepositeBinance = [];
            foreach($getAllTransctions as $getAllTransction){
                if (in_array($getAllTransction->txId, $newDepositeBinance)) {
                    // If $myVariable is not in $myArray, set it to $myNewVariable
                    $allNewDepositeBinance[] = $getAllTransction;
                }
            }
            foreach($allNewDepositeBinance as $allNewDepositeBinanceItem){
                $depositeBinance = new DepositBinance();
                $depositeBinance->amount = $allNewDepositeBinanceItem->amount;
                $depositeBinance->textId = $allNewDepositeBinanceItem->txId;
                $depositeBinance->network = $allNewDepositeBinanceItem->network;
                $depositeBinance->status = 0;
                $depositeBinance->created_at = Carbon::createFromTimestampMs($allNewDepositeBinanceItem->insertTime);
                $depositeBinance->save();
            }
            $dataInBinnance = $request->txid;
    
            // Check if a record with the given txid exists
            $recordExistsInBinnance = DepositBinance::where('textId', $dataInBinnance)->exists();    

            // Check if a record with "Internal transfer" prepended to the given txid exists
            $internalTxidInBinance = "Internal transfer " . $dataInBinnance;
            $internalTransferExistsInBinnance = DepositBinance::where('textId', $internalTxidInBinance)->exists();
            if($recordExistsInBinnance == true || $internalTransferExistsInBinnance == true){
                if ($recordExistsInBinnance == true) {
                    $changeStatus = DepositBinance::where('textId', $dataInBinnance)->where('status', 0)->first();
                    if($changeStatus){
                        $changeStatus->update([
                            'status' => 1,
                            'user_id' => $user->id
                        ]);
                        $user->update([
                            'fees' => $user->fees + $changeStatus->amount
                        ]);
                        return redirect()->back()->with('success', trans('home.textId success'));
                    }else{
                        return redirect()->back()->with('error', trans('home.you use this txID Before'));
                    }
                }
                if ($internalTransferExistsInBinnance == true) {
                    $internalTransferExistsInBinnance = DepositBinance::where('textId', $internalTxidInBinance)->where('status', 0)->first();
                    if($internalTransferExistsInBinnance){
                        $internalTransferExistsInBinnance->update([
                            'status' => 1,
                            'user_id' => $user->id,
                        ]);
                        $user->update([
                            'fees' => $user->fees + $internalTransferExistsInBinnance->amount
                        ]);
                        return redirect()->back()->with('success', trans('home.textId success'));
                    }else{
                        return redirect()->back()->with('error', trans('home.you use this txID Before'));
                    }
                }
    
            }else{
                return redirect()->back()->with('error', trans('home.no text id like this'));
            }
    
        }
    }
    
    public function getTermsAndConditions(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $configration = Configration::first();
        return view('dashboard.frontend.terms-and-conditions', compact('lang', 'configration'));
    }

    public function getFaq(){
        $lang=\LaravelLocalization::getCurrentLocale();
        $faqs = Faq::get();
        return view('dashboard.frontend.faqs', compact('lang', 'faqs'));
    }


}
