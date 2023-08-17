<?php

namespace HarriesCC\Kuaidi100;

use GuzzleHttp\Client;
use HarriesCC\Kuaidi100\Exceptions\InvalidArgumentException;
use HarriesCC\Kuaidi100\Tool\Cache;
use HarriesCC\Kuaidi100\Tool\GuzzleHttp;

/**
 * 基础类
 * Class Base
 * @package HarriesCC\Kuaidi100
 */
class Base
{
    protected $endpoint = 'https://api.kuaidi100.com';

    protected $pollEndpoint = 'https://poll.kuaidi100.com';

    /**
     * @var mixed
     */
    protected $key;
    /**
     * @var array
     */
    protected $guzzleOptions = [];
    /**
     * @var array
     */
    protected $options = [
        'customer' => '',
        'key' => '',
        'secret' => ''
    ];

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Base constructor.
     * @param array $options
     * @throws InvalidArgumentException
     */
    public function __construct($options = [])
    {
        if (empty($options['key'])) {
            throw new InvalidArgumentException('key不能为空');
        }

        $this->options = array_merge($this->options, $options);

        $this->key = $this->options['key'];
    }

    /**
     * @return Client
     */
    protected function getHttpClient()
    {
        return GuzzleHttp::getClient();
    }


    /**
     * 进行 表单参数请求
     * @param $url
     * @param $param
     * @param $option
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postFormParams($url, $param, $option = [])
    {

        $sign = strtoupper(md5(json_encode($param) . $this->key . $this->options['customer']));

        $query = [
            'customer' => $this->options['customer'],
            'sign' => $sign,
            'param' => json_encode($param)
        ];

        $httpClient = $this->getHttpClient();
        $option = array_merge($option, [
            'form_params' => $query,
        ]);
        $response = $httpClient->request('POST', $url, $option);

        return $response;
    }


}