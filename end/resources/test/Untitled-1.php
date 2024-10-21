$user = auth('api')->user();
        $apiKey = $user->binanceApiKey;
        $secretKey = $user->binanceSecretKey;
        $apiUrl = 'https://api.binance.com/api/v3/account';

        // Timestamp for the request
        $client = new Client();
        $response = $client->get('https://api.binance.com/api/v3/time');
        $serverTime = json_decode($response->getBody(), true);
        $serverTime = $serverTime['serverTime']; // Extract the server time

        // Create a query string with the required parameters
        $queryString = http_build_query([
            'timestamp' => $serverTime, // Include the timestamp correctly
        ]);

        // Create a signature for the request
        $signature = hash_hmac('sha256', $queryString, $secretKey);

        // Make the GET request with authentication headers
      return  $response = Http::withHeaders([
            'X-MBX-APIKEY' => $apiKey,
        ])->get($apiUrl . '?' . $queryString . '&signature=' . $signature);

        // Check if the response is successful (status code 200)
        if ($response->successful()) {
            $accountData = $response->json();

            $user->update([
                'binanceApiKey' => $apiKey,
                'binanceSecretKey' => $secretKey
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Value added to records successfully'
            ]);
        }
}
);