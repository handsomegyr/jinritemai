<?php

namespace Jinritemai\Token;

/**
 * 工具型应用授权流程
 * https://op.jinritemai.com/docs/guide-docs/9/22
 */
class Sns
{
	private $_app_id;
	private $_secret;
	private $_redirect_uri;
	private $_state = '';
	private $_context;
	public function __construct($app_id, $secret)
	{
		if (empty($app_id)) {
			throw new \Exception('请设定$app_id');
		}
		if (empty($secret)) {
			throw new \Exception('请设定$secret');
		}
		$this->_state = uniqid();
		$this->_app_id = $app_id;
		$this->_secret = $secret;

		$opts = array(
			'http' => array(
				'follow_location' => 3,
				'max_redirects' => 3,
				'timeout' => 10,
				'method' => "POST",
				'header' => "Connection: close\r\n",
				'user_agent' => 'R&D'
			),
			"ssl" => array(
				"verify_peer" => false,
				"verify_peer_name" => false
			)
		);
		$this->_context = stream_context_create($opts);
	}

	/**
	 * 设定回调地址
	 *
	 * @param string $redirect_uri        	
	 * @throws Exception
	 */
	public function setRedirectUri($redirect_uri)
	{
		$redirect_uri = trim($redirect_uri);
		if (filter_var($redirect_uri, FILTER_VALIDATE_URL) === false) {
			throw new \Exception('$redirect_uri无效');
		}
		$this->_redirect_uri = urlencode($redirect_uri);
	}

	/**
	 * 设定携带参数信息，请使用rawurlencode编码
	 *
	 * @param string $state        	
	 */
	public function setState($state)
	{
		$this->_state = $state;
	}

	/**
	 * 三、店铺授权
	 * 我们现在支持两种方式，完成店铺授权
	 * 1、开发者拼接授权URL，商家点击该URL，使用主帐号登录，确定授权
	 * 1）应用成功上架后，开发者拼接授权URL
	 *
	 * 举个例子，假设您应用的回调地址是：https://www.baidu.com?sss=12312312
	 * 拼接授权URL的请求示例：
	 *
	 * https://fxg.jinritemai.com/index.html#/ffa/open/applicationAuthorize?response_type=code&app_id=3409409348479354011&redirect_uri=https%3A%2F%2Ffxg.jinritemai.com%3Fsss%3D12312312&state=123123
	 * //示例中的app_id和redirect_uri需要替换成您应用的实际值 ***
	 *
	 * app_id必须和“控制台-应用后台-应用概览”中的App Key保持一致
	 * redirect_uri必须和“控制台-应用后台-应用概览”中的回调地址保持一致，需要encode后，再拼接
	 * 名称 类型 是否必须 示例值 描述
	 * app_id string 是 3409409348479354011 即应用key ，长度19位数字字符串
	 * response_type string 是 code 授权类型 ，值为code
	 * redirect_uri string 是 http://www.baidu.com redirect_uri指的是应用授权回调地址，在用户授权后应用会跳转至redirect_uri。
	 * 要求与应用注册时填写的回调地址域名一致或顶级域名一致。
	 * state string 否 123123 可自定义，返回值与传入值会保持一致。
	 */
	public function getAuthorizeUrl($is_redirect = true)
	{
		// https://fxg.jinritemai.com/index.html#/ffa/open/applicationAuthorize?response_type=code&app_id=3409409348479354011&redirect_uri=https%3A%2F%2Ffxg.jinritemai.com%3Fsss%3D12312312&state=123123
		$url = "https://fxg.jinritemai.com/index.html#/ffa/open/applicationAuthorize?response_type=code&app_id={$this->_app_id}&redirect_uri={$this->_redirect_uri}&state={$this->_state}";
		if (!empty($is_redirect)) {
			header("location:{$url}");
			exit();
		} else {
			return $url;
		}
	}

	/**
	 * 四、获取授权code
	 * 1、店铺确认授权成功后，会自动打开授权回调地址，此时平台会把授权code带到回调地址上。
	 * 2、开发者获取到code，并使用该code换取access_token。
	 * Tips：授权码有效期为10分钟，有效期内可用来换取access_token，不限次数；如失效，可以让商家前往【店铺后台->授权管理】页面，点击“使用”按钮即可 商家如何使用应用
	 *
	 * 五、换取access_token
	 * 店铺同意授权后，使用授权code，GET方式请求可获取access_token：
	 *
	 * https://openapi-fxg.jinritemai.com/oauth2/access_token?app_id=KEY&app_secret=SECRET&code=CODE&grant_type=authorization_code
	 * 1、请求参数
	 *
	 * 名称 类型 是否必须 示例值 描述
	 * app_id string 是 3409409348479354011 即应用key ，长度19位数字字符串
	 * app_secret string 是 2ad2355c-01d0-11f8-91dc-05a8cd1054b1 即应用密钥 字符串
	 * code string 是 b5323fe0e88a3032ad 授权码code
	 * grant_type string 是 authorization_code 授权类型，默认为authorization_code
	 * 2、响应参数
	 *
	 * 名称 类型 描述
	 * access_token string 用于调用API的access_token
	 * 过期时间为expires_in值
	 * 可通过refresh_token刷新获取新的access_token，过期时间仍为expires_in值
	 * expires_in number access_token接口调用凭证超时时间，单位（秒），默认有效期：7天
	 * refresh_token string 用于刷新access_token的刷新令牌（有效期：14 天）
	 * Tips：
	 * · 若因网络等因素没有成功获取新的access_token和 refresh_token，在1个小时内仍可重新获取
	 * · 多次重复调用将拿到同一个access_token和refresh_token
	 * · 当用新的refresh_token刷新时，上一个refresh_token立即失效
	 * scope string 授权作用域，使用逗号,分隔。预留字段
	 * shop_id string 店铺ID
	 * shop_name string 店铺名称
	 * 3、响应示例
	 *
	 * {
	 * "data":{
	 * "access_token":"ACCESS_TOKEN",
	 * "expires_in":604800,
	 * "refresh_token":"REFRESH_TOKEN",
	 * "scope":"SCOPE" ,
	 * "shop_id":"SHOPID",
	 * "shop_name":"SHOPNAME"
	 * },
	 * "err_no":0,
	 * "message":"success"
	 * }
	 */
	public function getAccessToken()
	{
		$code = isset($_GET['code']) ? trim($_GET['code']) : '';
		if ($code == '') {
			throw new \Exception('code不能为空');
		}
		// https://openapi-fxg.jinritemai.com/oauth2/access_token?app_id=KEY&app_secret=SECRET&code=CODE&grant_type=authorization_code
		$response = file_get_contents("https://openapi-fxg.jinritemai.com/oauth2/access_token?app_id={$this->_app_id}&app_secret={$this->_secret}&grant_type=authorization_code&code={$code}", false, $this->_context);
		$response = json_decode($response, true);

		return $response;
	}

	/**
	 * 六、刷新令牌 (Refresh Token)
	 * 使用上述步骤中获取到的refresh_token，GET方式请求，可获取新的access_token：
	 *
	 * https://openapi-fxg.jinritemai.com/oauth2/refresh_token?app_id=APPID&app_secret=SECRET&grant_type=refresh_token&refresh_token=REFRESH_TOKEN
	 * 1、请求参数
	 *
	 * 名称 类型 是否必须 示例值 描述
	 * app_id string 是 3409409348479354011 即应用key ，长度19位数字字符串
	 * app_secret string 是 2ad2355c-01d0-11f8-91dc-05a8cd1054b1 即应用密钥字符串
	 * grant_type string 是 refresh_token 授权类型，默认为authorization_code
	 * refresh_token string 是 ade9e5c63f906485eac957aa7116528a 用于刷新access_token的刷新令牌
	 * 2、响应参数
	 *
	 * 名称 类型 描述
	 * access_token string 用于调用API的access_token
	 * 过期时间为expires_in值
	 * 可通过refresh_token刷新获取新的access_token，过期时间仍为expires_in值
	 * expires_in number access_token接口调用凭证超时时间，单位（秒），默认有效期：7天
	 * refresh_token string 用于刷新access_token的刷新令牌（有效期：14 天）
	 * 当用新的refresh_token刷新时，上一个refresh_token立即失效
	 * scope string 授权作用域，使用逗号（,）分隔。预留字段
	 * shop_id string 店铺ID
	 * shop_name string 店铺名称
	 * 3、响应示例
	 *
	 * {
	 * "data":{
	 * "access_token":"ACCESS_TOKEN",
	 * "expires_in":1209600,
	 * "refresh_token":"REFRESH_TOKEN",
	 * "scope":"SCOPE" ,
	 * "shop_id":"SHOPID",
	 * "shop_name":"SHOPNAME"
	 * },
	 * "err_no":0,
	 * "message":"success"
	 * }
	 */
	public function getRefreshToken($refreshToken)
	{
		// https://openapi-fxg.jinritemai.com/oauth2/refresh_token?app_id=APPID&app_secret=SECRET&grant_type=refresh_token&refresh_token=REFRESH_TOKEN
		$response = file_get_contents("https://openapi-fxg.jinritemai.com/oauth2/refresh_token?app_id={$this->_app_id}&app_secret={$this->_secret}&grant_type=refresh_token&refresh_token={$refreshToken}", false, $this->_context);
		$response = json_decode($response, true);
		return $response;
	}
}
