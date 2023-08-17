## 安装

> 项目fork自`harriescc/kuaidi100`,为前辈致以感谢,本Fork将不改变命名空间,会加入个性化的内容

```sybase
composer require dongasai/kuaidi100
```

### 实现功能
    - 实时查询
    - 智能查询 (不推荐使用)
    - 订阅推送
    - 云打印

### 开始准备
[快递100接口文档](https://www.kuaidi100.com/openapi/cloud_api.shtml#d03)


### 实时查询

```php
use HarriesCC\Kuaidi100\Tracker;

try {
    $kuaidi = new Tracker([
        'key' => '你的key',
        'customer' => '你的customer'
    ]);
    $kuaidi->track('快递公司编码', '快递单号');
} catch (Exception $e) {
    
}
```

### 智能查询（不推荐使用，查询结果不准）

```php
use HarriesCC\Kuaidi100\Tracker;

try {
    $kuaidi = new Tracker([
        'key' => '你的key'
    ]);

    $kuaidi->getAutoTrack('快递单号');
} catch (Exception $e) {
    
}

```

### 订阅推送

```php
use HarriesCC\Kuaidi100\Poll;

try {
    $kuaidi = new Poll([
        'key' => 'uexWYZbd2758',
    ]);

    $kuaidi->getPoll('快递公司编码', '快递单号', '回调地址', '返回格式');
    $kuaidi->getPollByParam([
        // 根据文档的param参数
    ], 'json');
} catch (Exception $e) {
    
}
```


### 云打印

```php
use HarriesCC\Kuaidi100\CloudPrint;

try {
    $kuaidi = new CloudPrint([
        'customer' => '快递公司编码',
        'key' => '申请的key',
        'secret' => '分配的secret'
    ]);
} catch (Exception $e) {

}


```

### 云打印的sign

```php
$kuaidi->getSign();
```
    

## Env

> 见`.env.bak`,复制到 `.env`

> 单元测试用,实际使用用不到

* KUAIDI100_KEY =
* KUAIDI100_CUSTOMER =
* KUAIDI100_SERCRET =
* KUAIDI100_USER_ID =


## Docker 


```bash

cd docker 

docker-compose --project-name kuaidi100 up -d

docker exec -it  kuaidi100-php72-1 bash

```
## License

MIT