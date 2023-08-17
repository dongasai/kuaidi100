<?php

namespace HarriesCC\Kuaidi100\Models\Poll;



class Query
{


    /**
     * 消息内容
     * @var string
     */
    public $message;

    /**
     * 快递单号
     * @var string
     */
    public $nu;

    /**
     * 是否签收
     * @var int
     */
    public $ischecck = 0;

    /**
     * 快递公司
     * @var string
     */
    public $com;

    public $status;

    /**
     * 数据内容
     * @var \HarriesCC\Kuaidi100\Models\Poll\Query\Data[]
     */
    public $data;


    /**
     * 状态
     * 默认为0在途，1揽收，2疑难，3签收，4退签，5派件，8清关，14拒签等10个基础物流状态
     * @var int
     */
    public $state;

    /**
     * 快递单明细状态标记，暂未实现，请忽略
     * @var string
     */
    public $condition;


    /**
     * 地址信息
     * @var \HarriesCC\Kuaidi100\Models\Poll\Query\RouteInfo
     */
    public $routeInfo;

    /**
     * 未知
     * @var bool
     */
    public $isLoop;

    /**
     * 请求是否成功
     *
     * @var bool
     */
    public $result = true;

    /**
     * 请求状态码
     * @var int
     */
    public $returnCode = 200;


}