<?php

namespace HarriesCC\Kuaidi100\Models\Poll;

/**
 * 订阅API返回数据
 *
 */
class Poll
{

    /**
     * 状态
     * @var bool
     */
    public $result;

    /**
     * 状态码
     * @var int
     */
    public $returnCode;


    /**
     * 消息内容
     *
     * @var string
     */
    public $message;

    /**
     * "result": true,
     * "returnCode": "200",
     * "message": "提交成功"
     */

}