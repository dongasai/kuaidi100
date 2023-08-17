<?php

namespace HarriesCC\Kuaidi100\Models\Poll;


use HarriesCC\Kuaidi100\Models\Poll\Subscribe\Result;

/**
 * 订阅的数据结构
 *
 *
 */
class Subscribe
{

    /**
     * 状态
     * 监控状态:polling:监控中，shutdown:结束，abort:中止，updateall：重新推送。其中当快递单为已签收时status=shutdown，当message为“3天查询无记录”或“60天无变化时”status= abort ，对于status=abort的状态，需要增加额外的处理逻辑
     * @var string
     */
    public $status;

    /**
     * 包括got、sending、check三个状态，由于意义不大，已弃用，请忽略
     * @var string
     */
    public $billstatus;


    /**
     * 监控状态相关消息，如:3天查询无记录，60天无变化
     * @var string
     */
    public $message;


    /**
     * 内容
     * @var \HarriesCC\Kuaidi100\Models\Poll\Subscribe\Result
     */
    public $lastResult;


//"status": "polling",
//"billstatus": "got",
//"message": "寄件",
//"lastResult": {


}