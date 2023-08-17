<?php

include dirname(__DIR__) . DIRECTORY_SEPARATOR ."vendor/autoload.php";



$envs = parse_ini_file(dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env');
foreach ($envs as  $k => $v){
    putenv($k."=".$v);
}


use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\Client;


$stack = new HandlerStack();
$stack->setHandler(new \HarriesCC\Kuaidi100\Tool\CacheHandle());

$client = new Client(['handler' => $stack]);
\HarriesCC\Kuaidi100\Tool\GuzzleHttp::$client =$client;
