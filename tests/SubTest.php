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

        $json = '{"status":"polling","billstatus":"got","message":"寄件","lastResult":{"message":"ok","nu":"YT6186594166532","ischeck":"0","com":"yuantong","status":"200","data":[{"time":"2021-12-15 20:15:14","context":"【苏州转运中心】 已发出 下一站 【无锡转运中心公司】","ftime":"2021-12-15 20:15:14","areaCode":"CN320500000000","areaName":"江苏,苏州市","status":"干线","location":"","areaCenter":"120.585315,31.298886","areaPinYin":"su zhou shi","statusCode":"1002"},{"time":"2021-12-15 20:11:25","context":"【苏州转运中心公司】 已收入","ftime":"2021-12-15 20:11:25","areaCode":"CN320500000000","areaName":"江苏,苏州市","status":"干线","location":"","areaCenter":"120.585315,31.298886","areaPinYin":"su zhou shi","statusCode":"1002"},{"time":"2021-12-15 19:18:27","context":"【江苏省无锡市锡新开发区公司】 已收入","ftime":"2021-12-15 19:18:27","areaCode":"CN320200000000","areaName":"江苏,无锡市","status":"在途","location":"","areaCenter":"120.31191,31.491169","areaPinYin":"wu xi shi","statusCode":"0"},{"time":"2021-12-15 17:10:09","context":"【江苏省苏州市北桥公司】 已揽收","ftime":"2021-12-15 17:10:09","areaCode":"CN320507004000","areaName":"江苏,苏州市,相城区,北桥","status":"揽收","location":"","areaCenter":"120.606531,31.505825","areaPinYin":"bei qiao jie dao","statusCode":"1"}],"state":"0","condition":"F00","routeInfo":{"from":{"number":"CN320507004000","name":"江苏,苏州市,相城区,北桥"},"cur":{"number":"CN320200000000","name":"江苏,无锡市"},"to":null},"isLoop":false}}';


        $mapper = new \JsonMapper();
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