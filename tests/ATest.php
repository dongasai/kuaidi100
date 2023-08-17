<?php

namespace HarriesCC\Kuaidi100\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use HarriesCC\Kuaidi100\Constant\China;
use http\Env;
use PHPUnit\Framework\TestCase;
use HarriesCC\Kuaidi100\Exceptions\InvalidArgumentException;
use HarriesCC\Kuaidi100\Tracker;

class ATest extends TestCase
{

    public function testA1()
    {
        // 773238295488836
        $t = new Tracker([
            'key' => getenv('KUAIDI100_KEY'),
            'customer' => getenv('KUAIDI100_CUSTOMER')
        ]);
        $res = $t->query(China::YUNDA, '433391373012213');
        var_dump($res);
    }
}