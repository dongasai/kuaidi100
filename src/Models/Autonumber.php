<?php

namespace HarriesCC\Kuaidi100\Models;

class Autonumber
{



    /**
     * 查询返回消息
     * @var string
     */
    public $message;


    /**
     * 是否查询成功
     * @var bool
     */
    public $result = true;



    /**
     * 快递公司 代号
     * @var string
     */
    public $comCode;

    /**
     * 快递公司
     * @var string
     */
    public $name;


    /**
     * 错误返回代码
     * @var int
     */
    public $returnCode;

    /**
     * 单号长度
     * @var int 
     */
    public $lengthPre;

}