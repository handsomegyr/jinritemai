<?php

/**
 * 服务端 API
 * 抖店开放平台SDK提供了用户授权、授权码刷新、接口访问、消息接收等功能接口。
 * 
 * @author guoyongrong <handsomegyr@126.com>
 *
 */

namespace Jinritemai;

class Client
{
    // 接口地址
    private $_url = 'https://openapi-fxg.jinritemai.com/';

    private $_v = '2';

    private $_accessToken = null;

    private $_appId = null;

    private $_appSecret = null;

    private $_request = null;

    public function __construct($appId, $appSecret)
    {
        $this->_appId = $appId;
        $this->_appSecret = $appSecret;
    }

    public function getAppId()
    {
        if (empty($this->_appId)) {
            throw new \Exception("请设定appId");
        }
        return $this->_appId;
    }

    public function getAppSecret()
    {
        if (empty($this->_appSecret)) {
            throw new \Exception("请设定appSecret");
        }
        return $this->_appSecret;
    }

    /**
     * 获取accessToken
     *
     * @throws Exception
     */
    public function getAccessToken()
    {
        if (empty($this->_accessToken)) {
            throw new \Exception("请设定access_token");
        }
        return $this->_accessToken;
    }

    /**
     * 设定access token
     *
     * @param string $accessToken            
     */
    public function setAccessToken($accessToken)
    {
        $this->_accessToken = $accessToken;
        return $this;
    }

    /**
     * 初始化认证的http请求对象
     */
    private function initRequest()
    {
        $this->_request = new \Jinritemai\Http\Request($this->getAccessToken());
    }

    /**
     * 获取请求对象
     *
     * @return \Jinritemai\Http\Request
     */
    private function getRequest()
    {
        if (empty($this->_request)) {
            $this->initRequest();
        }
        return $this->_request;
    }

    /**
     * 一、调用流程
填充参数 > 生成签名 > 拼装HTTP请求 > 发起HTTP请求 > 获得HTTP响应 > 解析json结果
二、调用地址
抖店开放平台目前只提供正式环境给开发者，API调用地址为如下，请访问时拼接对应方法uri：

https://openapi-fxg.jinritemai.com
三、调用方式
GET，POST方式均支持

四、公共参数
调用任何一个API都必须传入的参数。目前支持的公共参数有：

参数名称	参数类型	是否必须	示例值	参数描述
method	String	是	product.getGoodsCategory	调用的API接口名称
app_key	String	是	3409409348479354011	应用创建完成后被分配的key
access_token	String	是	c6f957da-1239-4343-84a1-c84e68915ff7	用于调用 API 的 access_token
param_json	String	是	{"cid":"12","page":"1"}	标准json类型，里面是业务参数按照参数名的字符串大小排序具体参数值，参考每个接口的参数表
timestamp	String	是	2010/01/01 12:12:12	时间戳，格式为yyyy-MM-dd HH:mm:ss，时区为GMT+8，例如：2016-01-01 12:00:00
v	String	是	2	API协议版本，当前版本为2
sign	String	是	签名算法参照下面的介绍	输入参数签名结果

五、业务参数
API调用除了必须包含公共参数外，如果API本身有业务级的参数也必须传入。

每个API的业务参数请参考 API文档

六、签名算法
七、调用示例
https://openapi-fxg.jinritemai.com/product/getGoodsCategory?param_json={"cid":"12","page":"1"}&method=product.getGoodsCategory&app_key=123456780&timestamp=2011-06-16 13:23:30&v=2&sign=ab3387e5&access_token=xxxxxxxx
八、返回错误码列表
返回错误码	释义
1	"请登录后再操作"
2	"无权限"
3	"缺少参数"
4	"参数错误"
5	"参数不合法"
6	"业务参数json解析失败, 所有参数需为string类型"
7	"服务器错误"
8	"服务繁忙"
9	"访问太频繁"
10	"需要用 POST 请求"
11	"签名校验失败"
12	"版本太旧，请升级"
30	"不是授权用户"
302	"没有user_id"
30001	认证失败，app_key格式不正确，应为19位纯数字
30001	认证失败，app_key不存在
30001	认证失败，access_token不能为空
30002	access_token已过期
30003	店铺授权已失效，请重新引导商家完成店铺授权
30004	应用已被系统禁用
30005	access_token不存在，请使用最新的access_token访问
30006	店铺授权已被关闭，请联系商家打开授权开关
30007	app_key和access_token不匹配，请仔细检查
九、注意事项
a. 所有的请求和响应数据编码皆为utf-8格式
b. 所有参数类型均为string，param_json中的所有参数也都需为string
     */
    public function sendRequest(\Jinritemai\Request\Base $request, array $options = array())
    {
        $param_json = $request->getParams();
        $apiMethodName = $request->getApiMethodName();
        $params = array();
        $params['method'] = str_replace('/', '.', $apiMethodName);
        $params['app_key'] = $this->getAppId();
        $needToken = $request->isNeedAccessToken();
        if ($needToken) {
            $params['access_token'] = $this->getAccessToken();
        }
        // 无（注意：param_json请按照空对象 "{}" 传递）
        if (empty($param_json)) {
            $params['param_json'] = '{}';
        } else {
            $params['param_json'] = \json_encode($param_json);
        }
        $params['timestamp'] = date("Y-m-d H:i:s", time());
        $params['v'] = $this->_v;
        $params['sign'] = $this->signature($params);
        $headers = array();
        $rst = $this->getRequest()->post($this->_url . $apiMethodName, $params, $headers);
        return $this->rst($rst);
    }

    /**
     * 六、签名算法
为了防止API调用过程中被黑客恶意篡改，调用任何一个API都需要携带签名；服务端会根据请求参数，对签名进行验证，签名不合法的请求将会被拒绝。

目前支持的签名算法MD5，签名过程如下：

1、将param_json中参数(标点符号前后不能有空格)按照key字母先后顺序排序，且值必须是String，组成json

例如: param_json={"product_id":123,"code":"HHK"} 需要调整为param_json={"code":"HHK","product_id":"123"}
特殊字符需要转义："&"转成"\u0026"；"<"转成"\u003c"；">"转成"\u00ce"
使用gson的同学注意要进行disableHtmlEscaping
使用python json.dumps的同学注意seperator不要让json字段间的逗号带空格
2、所有请求参数按照字母先后顺序排列，access_token不参与加密

例如：将param_json,method,app_key,timestamp,v 排序为app_key,method,param_json,timestamp,v
3、把所有参数名和参数值进行拼装

例如：app_keyxxxmethodxxxparam_jsonxxxtimestampxxxvxxx
4、把app_secret分别拼接在c步得到的字符串的两端，假定app_secret的值为AppSecret

例如：AppSecretXXXXAppSecret
5、使用MD5进行加密得到sign，传入url参数中
     * @param $params
     *
     * @return string
     */
    private function signature($params)
    {
        ksort($params);
        $paramsStr = '';
        array_walk($params, function ($item, $key) use (&$paramsStr) {
            if ('@' != substr($item, 0, 1)) {
                $paramsStr .= sprintf('%s%s', $key, $item);
            }
        });
        return (md5(sprintf('%s%s%s', $this->getAppSecret(), $paramsStr, $this->getAppSecret())));
    }

    /**
     * 标准化处理服务端API的返回结果
     */
    public function rst($rst)
    {
        return $rst;
    }
}
