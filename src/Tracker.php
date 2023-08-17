<?php


namespace HarriesCC\Kuaidi100;

use HarriesCC\Kuaidi100\Exceptions\Exception;
use HarriesCC\Kuaidi100\Exceptions\HttpException;
use HarriesCC\Kuaidi100\Exceptions\InvalidArgumentException;
use HarriesCC\Kuaidi100\Models\Poll\Query;

/**
 * 快递查询类
 * Class Tracker
 * @package HarriesCC\Kuaidi100
 */
class Tracker extends Base
{
    private $param = [];

    /**
     * @param array $param
     */
    public function setParam($param)
    {
        $this->param = $param;
    }


    /**
     * @param string $com
     * @param string $num
     * @param string $phone
     * @return Query
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function queryV2(string $com, string $num, string $phone = '')
    {
        return $this->query($com, $num, $phone, 1);
    }


    /**
     * @param string $com
     * @param string $num
     * @param string $phone
     * @return Query
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function queryV24(string $com, string $num, string $phone = '')
    {
        return $this->query($com, $num, $phone, 4);
    }


    /**
     * 实时查询接口
     * @param string $com 快递单位
     * @param string $num 快递单号
     * @param string $phone 手机号码
     * @return Query
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function query(string $com, string $num, string $phone = '', $resultv2 = 0)
    {
        $url = Url::QUERY;


        if (empty($this->options['customer'])) {
            throw new InvalidArgumentException('customer不能为空');
        }
        $this->param = [];
        $this->param['com'] = $com;
        $this->param['num'] = $num;
        $this->param['resultv2'] = $resultv2;
        $this->param['phone'] = $phone;


        try {
            $response = $this->postFormParams($url, $this->param, ['timeout' => 5]);
            $json = $response->getBody()->getContents();

            var_dump($json);

            $mapper = new \JsonMapper();
            $Query = $mapper->map(json_decode($json), Query::class);
            return $Query;
        } catch (Exception $e) {
            print_r($e);
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * 查询快递
     * @param string $com
     * @param string $num
     * @param string|null $phone
     * @return Query
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function track(string $com, string $num, string $phone = null)
    {
        return $this->query($com, $num, $phone);
    }

    /**
     * 只能判断接口查询，查询结果不准，不建议使用
     * @param string $num
     * @return string
     * @throws HttpException
     * @throws InvalidArgumentException
     */
    public function getAutoTrack(string $num)
    {
        $url = 'http://www.kuaidi100.com/autonumber/auto';

        if (empty($num)) {
            throw new InvalidArgumentException('快递单号不能为空');
        }

        $query = [
            'num' => $num,
            'key' => $this->options['key']
        ];

        try {
            $response = $this->getHttpClient()->get($url, [
                'query' => $query,
            ])->getBody()->getContents();
            return $response;
        } catch (Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
