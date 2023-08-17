<?php


namespace HarriesCC\Kuaidi100;

use HarriesCC\Kuaidi100\Exceptions\HttpException;
use HarriesCC\Kuaidi100\Exceptions\InvalidArgumentException;
use HarriesCC\Kuaidi100\Models\Poll\Query;

/**
 * 订阅推送类
 * Class Poll
 * @package HarriesCC\Kuaidi100
 */
class Poll extends Base
{
    /**
     * 取得推送
     * @param string $company
     * @param string $number
     * @param string $callbackUrl
     * @param string $schema
     * @return string
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPoll(string $company, string $number, string $callbackUrl, $schema = 'json')
    {
        $params = [
            'company' => $company,
            'number' => $number,
            'key' => $this->options['key'],
            'parameters' => [
                'callbackurl' => $callbackUrl
            ]
        ];
        return $this->getPollByParam($params, $schema);
    }

    /**
     * 取得推送，自己传入 $param参数
     * @param array $param
     * @param string $schema
     * @return string
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPollByParam(array $param, $schema = 'json')
    {
        $url = Url::POLL;

        if (empty($param)) {
            throw new InvalidArgumentException('param参数不能为空');
        }
        $params = [
            'schema' => $schema,
            'param' => json_encode($param)
        ];

        try {
            $json = $this->getHttpClient()->request('POST', $url, [
                'form_params' => $params,
            ])->getBody()->getContents();
            $mapper = new \JsonMapper();
            return $mapper->map(json_decode($json), \HarriesCC\Kuaidi100\Models\Poll\Poll::class);
        } catch (\Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }
}