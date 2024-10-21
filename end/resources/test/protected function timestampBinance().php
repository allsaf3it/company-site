protected function timestampBinance()
    {
        $client = new Client();
        $response = $client->get('https://api.binance.com/api/v3/time');
        $serverTime = json_decode($response->getBody(), true);
        return $serverTime['serverTime'];
    }