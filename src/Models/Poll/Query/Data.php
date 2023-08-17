<?php

namespace HarriesCC\Kuaidi100\Models\Poll\Query;

class Data
{
    /**
     * 时间
     * @var string
     */
    public $time;


    /**
     * 当前阶段内容
     * @var string
     */
    public $context;


    /**
     * @var string
     */
    public $ftime;


    /**
     * 行政区域 代码
     * resultv2=4才会展示
     * @var string
     */
    public $areaCode;

    /**
     * 行政区域
     * resultv2=4才会展示
     * @var string
     */
    public $areaName;

    /**
     *
     * 当前状态名字
     * resultv2=4才会展示
     * @var string
     */
    public $status;


    /**
     * 本数据元对应的快件当前地点
     * resultv2=4才会展示
     * @var string
     */
    public $location;

    /**
     * 本数据元对应的行政区域经纬度
     * resultv2=4才会展示
     * @var string
     */
    public $areaCenter;


    /**
     * 本数据元对应的行政区域拼音
     * resultv2=4才会展示
     * @var string
     */
    public $areaPinYin;


    /**
     * 本数据元对应的高级物流状态值
     * resultv2=4才会展示
     * @var string
     */
    public $statusCode;

    
}