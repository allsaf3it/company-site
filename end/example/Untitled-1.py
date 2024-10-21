def getAsset(self, pkey, skey, coin=''):
        
        headers = {
            'X-MBX-APIKEY': pkey
        }
        timestamp = int(time.time() * 1000)
        params = {
            'asset': coin,
            'recvWindow': 60000,
            'timestamp': timestamp
        }

        query_string = urlencode(params)
        params['signature'] = hmac.new(skey.encode('utf-8'), query_string.encode('utf-8'), hashlib.sha256).hexdigest()

        url = urljoin(self.base_url, '/sapi/v3/asset/getUserAsset')

        response = requests.post(url, headers=headers, params=params)
            r = await response.json()
            return r