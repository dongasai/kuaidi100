<?php

namespace HarriesCC\Kuaidi100\Tool;

use GuzzleHttp\Client;

class GuzzleHttp
{
    static public $client;


    static public function getClient()
    {
        if (empty(self::$client)) {
            self::$client = new Client();
        }
        return self::$client;
    }

}