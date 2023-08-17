<?php

namespace HarriesCC\Kuaidi100\Tool;

use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class CacheHandle
{

    public function __invoke(\GuzzleHttp\Psr7\Request $request, $options = [])
    {
        $key = [
            $request->getUri()->getHost(),$request->getUri()->getPath(), $request->getMethod(), $request->getHeaders(), $request->getBody()->getContents(),1
        ];

        $has  = Cache::hasCache($key);
        if(!$has){
            echo "原生读取数据!";
            /**
             * @var  \GuzzleHttp\Promise\FulfilledPromise $promise
             */
            $promise = call_user_func(  new CurlHandler(),$request,$options);

            $promise->then(function (ResponseInterface $resp)use($key){
                sleep(1);
                echo "原生读取数据 - 成功:".$resp->getBody();

                Cache::setCacheItem($key,[
                    $resp->getStatusCode(),
                    $resp->getHeaders(),
                    (string)  $resp->getBody()
                ]);
            },function (ResponseInterface $resp)use($key){
                sleep(1);
                echo "原生读取数据 - 失败:";
                var_dump(func_get_args());

            });
            return $promise;

        }
        $item = Cache::getCacheItem($key);
        $cacheData = $item->get();
        echo "缓存数据 :".$cacheData[2];

//        var_dump($cacheData);

        return new Response($cacheData[0],$cacheData[1],$cacheData[2]);

    }
}