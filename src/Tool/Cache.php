<?php

namespace HarriesCC\Kuaidi100\Tool;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\CacheItem;

/**
 *
 * @deprecated 不要使用,这是用来测试的
 *
 */
class Cache
{
    static $cacheOb;

    /**
     * 获取数据,没有数据则回调
     * @param $key
     * @param callable $call
     * @return mixed
     * @throws \Psr\Cache\InvalidArgumentException
     */
    static public function getCall($key, callable $call)
    {
        $key2 = md5(serialize($key));

        $cache = self::getCacheOb();

        return $cache->get($key2, $call);
    }


    static public function getCacheOb()
    {
        if(empty(self::$cacheOb)){
            self::$cacheOb =new FilesystemAdapter('',6000,dirname(dirname(__DIR__)).'/runtime/');
        }


        return self::$cacheOb;
    }

    /**
     * 获取缓存数据
     * @param $key
     * @return CacheItem
     * @throws \Psr\Cache\InvalidArgumentException
     */
    static public function getCacheItem($key)
    {
        $key2 = md5(serialize($key));

        $cache = self::getCacheOb();
        return $cache->getItem($key2);
    }


    /**
     * 缓存是否命中
     * @param $key
     * @return bool
     * @throws \Psr\Cache\InvalidArgumentException
     */
    static public function hasCache($key)
    {
        $key2 = md5(serialize($key));

        $cache = self::getCacheOb();
        return $cache->hasItem($key2);
    }

    static public function setCacheItem($key, $data, $ttl = 6000)
    {
        $key2 = md5(serialize($key));

        $cache = self::getCacheOb();
        /**
         * @var \Symfony\Component\Cache\CacheItem $item
         */
        $item = $cache->getItem($key2);
        $item->set($data);
        $item->expiresAfter($ttl);

        return $cache->save($item);
    }


}