<?php


namespace HarriesCC\Kuaidi100;

use GuzzleHttp\Exception\GuzzleException;
use HarriesCC\Kuaidi100\Exceptions\HttpException;
use HarriesCC\Kuaidi100\Exceptions\InvalidArgumentException;
use HarriesCC\Kuaidi100\Models\LabelRequest;

/**
 * 电子面单
 * Class CloudPrint
 * @package HarriesCC\Kuaidi100
 */
class Label extends Base
{
    protected string $path = '/label/order';

    private $sign;

    /**
     * @return mixed
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * 创建电子面单
     * @param array $param
     * @return string
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws GuzzleException
     */
    public function createOrder(LabelRequest $request)
    {
        $url = $this->endpoint.$this->path;
//        if (empty($param)) {
//            throw new InvalidArgumentException('param参数不能为空');
//        }
//
//        if (empty($this->options['secret'])) {
//            throw new InvalidArgumentException('secret不能为空');
//        }

        $param = $request->toArray();

        $t = time();

        $this->sign = $sign = strtoupper(md5(json_encode($param).$t.$this->key.$this->options['secret']));

        $params = [
            'method' => 'order',
            'key' => $this->options['key'],
            'sign' => $sign,
            't' => $t,
            'param' => json_encode($param)
        ];

        try {
            $response = $this->getHttpClient()->request('POST', $url, [
                'form_params' => $params,
            ])->getBody()->getContents();
            return $response;
        } catch (\Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }
}