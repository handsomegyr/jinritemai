<?php

namespace Jinritemai\Token;

/**
 * 自用型应用授权流程
 * https://op.jinritemai.com/docs/guide-docs/9/21
 */
class MerchantSns
{
	private $_app_id;
	private $_secret;
	private $_context;
	public function __construct($app_id, $secret)
	{
		if (empty($app_id)) {
			throw new \Exception('请设定$app_id');
		}
		if (empty($secret)) {
			throw new \Exception('请设定$secret');
		}
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
	 * 三、获取access_token
	 * 店铺同意授权后，使用GET方式请求，可获取access_token（无需授权code）：
	 *
	 * https://openapi-fxg.jinritemai.com/oauth2/access_token?app_id=KEY&app_secret=SECRET&grant_type=authorization_self
	 * 1、请求参数
	 *
	 * 名称 类型 是否必须 示例值 描述
	 * app_id string 是 3409409348479354011 即应用key ，长度19位数字字符串
	 * app_secret string 是 2ad2355c-01d0-11f8-91dc-05a8cd1054b1 即应用密钥字符串
	 * grant_type string 是 authorization_self 授权类型，默认为authorization_code
	 * 2、响应参数
	 *
	 * 名称 类型 描述
	 * access_token string 用于调用API的access_token
	 * 过期时间为expires_in值
	 * 可通过refresh_token刷新获取新的access_token，过期时间仍为 expires_in值
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
	 * "expires_in": 604800,
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
		// https://openapi-fxg.jinritemai.com/oauth2/access_token?app_id=KEY&app_secret=SECRET&grant_type=authorization_self
		$response = file_get_contents("https://openapi-fxg.jinritemai.com/oauth2/access_token?app_id={$this->_app_id}&app_secret={$this->_secret}&grant_type=authorization_self", false, $this->_context);
		$response = json_decode($response, true);

		return $response;
	}

	/**
	 * 四、刷新令牌 (Refresh Token)
	 * 使用上述步骤中获取到的refresh_token，GET方式请求，可获取新的access_token：
	 *
	 * https://openapi-fxg.jinritemai.com/oauth2/refresh_token?app_id=APPID&app_secret=SECRET&grant_type=refresh_token&refresh_token=REFRESH_TOKEN
	 * 1、请求参数
	 *
	 * 名称 类型 是否必须 示例值 描述
	 * app_id string 是 b5323fe0e88a3032ad 即应用key ，长度19位字母和数字组合的字符串
	 * app_secret string 是 fc032951c1c9bfa06b9cfbca179a4e32 即应用密钥字符串
	 * grant_type string 是 refresh_token 授权类型，默认为authorization_code
	 * refresh_token string 是 ade9e5c63f906485eac957aa7116528a 用于刷新access_token的刷新令牌（有效期：14 天）
	 * Tips：
	 * · 若因网络等因素没有成功获取新的access_token和 refresh_token，在1个小时内仍可重新获取
	 * · 多次重复调用将拿到同一个access_token和refresh_token
	 * · 当用新的refresh_token刷新时，上一个refresh_token立即失效
	 * 2、响应参数
	 *
	 * 名称 类型 描述
	 * access_token string 用于调用API的access_token
	 * 过期时间为expires_in值
	 * 可通过refresh_token刷新获取新的access_token，过期时间仍为 expires_in值
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
