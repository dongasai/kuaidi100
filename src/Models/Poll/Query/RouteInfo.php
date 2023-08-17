<?php

namespace HarriesCC\Kuaidi100\Models\Poll\Query;



/**
 * 路程信息
 *
 */
class RouteInfo
{

    /**
     * 来自
     * @var Address|null
     */
    public $from;


    /**
     * 当前
     * @var Address|null
     */
    public $cur;


    /**
     * 目的地
     * @var Address|null
     */
    public $to;

    /**
     * "from": {
     * "number": "CN310110000000",
     * "name": "上海,上海,杨浦区"
     * },//本数据元对应的出发地城市信息，resultv2=4才会展示
     * "cur": {
     * "number": "CN330102000000",
     * "name": "浙江,杭州市,上城区"
     * },//本数据元对应的当前城市信息，resultv2=4才会展示
     * "to": null
     */
}