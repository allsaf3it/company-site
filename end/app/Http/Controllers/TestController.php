<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
// use Binance\API;
use TechTailor\BinanceApi\BinanceAPI;


class TestController extends Controller
{
    public $binance;

    public function __construct()
    {
        $this->binance = new BinanceApi();
    }
    public function index(){
        // $data = $this->binance->getDepositHistory();
        // return $data;

            // $data = json_decode($this->binance->getDepositHistory(), true);
    
            // $dataDeposit = [];
            // foreach ($data as $item) {
    
            //     if ($item['address'] == $address) {
            //         $dataDeposit[] = $item;
            //     }
            // }
    
            // return $dataDeposit;
        
        //https://fapi.binance.com      baseendpoint
        // API-keys are passed into the Rest API via the X-MBX-APIKEY header.



        // $response = Http::withHeaders([
        //     'X-MBX-APIKEY' => 'IYx3STO3y8rHbsf2wccp4yAdEaOcOD8H6c32nH9KW1Me2BQ3exHr14G57MUU9ItX'
        // ])->post('https://api.binance.com/sapi/v3/asset/getUserAsset');
        // return $response->json();
        // $user = auth('api')->user();
        $apiKey = "IYx3STO3y8rHbsf2wccp4yAdEaOcOD8H6c32nH9KW1Me2BQ3exHr14G57MUU9ItX";
        $secretKey = "vrG5M9H4iOtv7sqoY1qxX0Z8Sit96WmAdCBqrryUXCrLFAGTIRkGymmczq3yC811";
        $apiUrl = 'https://api.binance.com/sapi/v3/asset/getUserAsset';

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
        ])->post($apiUrl . '?' . $queryString . '&signature=' . $signature);
        $responses = json_decode($response->getBody()->getContents());
        $getAsset= NULL;
        foreach($responses as $responseItem){
            if($responseItem->asset == 'USDT'){
                $getAsset = $responseItem;
            }
        }
        echo $getAsset->free;













        // $response = Http::get('https://api.binance.com/api/v3/time');
        // return $response->json();

        // $api = new BinanceAPI();
        // $key = "pM7xtGnrWJdujTF13pmdGatv6fzZCknkZg2SwIuUTAuAJZm6W6GHzpeFxrhmevFQ";
        // $secret = "fU3yohHr9eAWIbL7eZEQtaTsWhmmYfpCkYyyiLtQqkdX4sBVCLNkYj8M4iK6nxM6";
        // $api = new BinanceAPI($key, $secret);
    
        // $data = $api->price("BNBBTC");    
        // return  $data;
        

        // $binance = new BinanceAPI();

        // $time = $binance->getDepositHistory();
        // return $time;
    }
//     public function index($pkey, $skey, $coin = '')
// {
//     $headers = [
//         'X-MBX-APIKEY' => $pkey,
//     ];

//     $timestamp = round(microtime(true) * 1000);

//     $params = [
//         'asset' => $coin,
//         'recvWindow' => 60000,
//         'timestamp' => $timestamp,
//     ];

//     $query_string = http_build_query($params);
//     $params['signature'] = hash_hmac('sha256', $query_string, $skey);

//     $url = URL::to('https://api.binance.com/sapi/v3/asset/getUserAsset');

//     $response = Http::withHeaders($headers)->post($url, $params);
//     $r = $response->json();

//     return $r;
// }

    
}