<?php

namespace App\Payments;

use TechTailor\BinanceApi\BinanceAPI;

class BinanceApiDeposit
{
    public $binance;

    public function __construct()
    {
        $this->binance = new BinanceApi();
    }

    public function getAllDeposit($coin = null): array
    {
        $data = json_decode($this->binance->getDepositHistory(), true);

        $dataDeposit = [];
        if (!is_null($coin)) {
            foreach ($data as $item) {

                if ($item['coin'] == $coin) {
                    $dataDeposit[] = $item;
                }
            }
        } else {
            $dataDeposit = $data;
        }

        return $dataDeposit;
    }


    public function getDepositByTxId($txId, $coin): array
    {
        $data = json_decode($this->binance->getDepositHistory(), true);

        $dataDeposit = [];
        foreach ($data as $item) {

            if ($item['txId'] == $txId && $item['coin'] == $coin) {
                $dataDeposit = $item;
            }
        }

        return $dataDeposit;
    }


    public function getDepositByAddress($address): array
    {
        $data = json_decode($this->binance->getDepositHistory(), true);

        $dataDeposit = [];
        foreach ($data as $item) {

            if ($item['address'] == $address) {
                $dataDeposit[] = $item;
            }
        }

        return $dataDeposit;
    }

}
