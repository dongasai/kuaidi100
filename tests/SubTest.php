<?php

namespace HarriesCC\Kuaidi100\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use HarriesCC\Kuaidi100\Constant\China;
use HarriesCC\Kuaidi100\Models\Poll\Query;
use HarriesCC\Kuaidi100\Models\Poll\Subscribe;
use HarriesCC\Kuaidi100\Poll;
use http\Env;
use PHPUnit\Framework\TestCase;
use HarriesCC\Kuaidi100\Exceptions\InvalidArgumentException;
use HarriesCC\Kuaidi100\Tracker;


/**
 * 订阅测试
 */
class SubTest extends TestCase
{

    public function testA1()
    {

        $json = '{
	"status": "polling",
	"message": "",
	"lastResult": {
		"message": "ok",
		"nu": "YT6074326614455",
		"ischeck": "0",
		"com": "yuantong",
		"status": "200",
		"state": "1",
		"data": [{
			"time": "2023-02-02 09:57:03",
			"context": "【长沙市】 【长沙东站】（07**-55**234） 的 长沙东站司法分部（135****1234） 已接单",
			"ftime": "2023-02-02 09:57:03",
			"areaCode": null,
			"areaName": null,
			"status": null,
			"location": null,
			"areaCenter": null,
			"areaPinYin": null,
			"statusCode": null
		}],
		"loop": false
	}
}';


        $mapper = new \JsonMapper();
        $mapper->bStrictNullTypes = true;
        $data = $mapper->map(json_decode($json), Subscribe::class);
        var_dump($data);


    }
    public function testA2()
    {
        $poll = new Poll([
            'key' => getenv('KUAIDI100_KEY')
        ]);
        $callUrl = 'https://ht.beihai1319.com/beihai1319.php/user/publics/signin.html';
        $res= $poll->getPoll(China::YUNDA,'433391373012303',$callUrl);

        var_dump($res);

    }
}