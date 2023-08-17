<?php

namespace HarriesCC\Kuaidi100;

class Url
{

    const AUTO = '/autonumber/auto';    // 智能判断请求地址
    const PRINT_BILLPARCEL = '/print/billparcels.do?method=billparcels';    // 快递发货单打印接口请求地址


    /**
     * 快递实时查询
     *
     */
    const QUERY = 'https://poll.kuaidi100.com/poll/query.do';

    /**
     * 订阅API
     */
    const POLL = 'https://poll.kuaidi100.com/poll';

}