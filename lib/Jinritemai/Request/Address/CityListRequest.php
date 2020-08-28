<?php

namespace Jinritemai\Request\Address;

/**
 * 获取市列表
 * 获取平台支持的市列表
 * https://op.jinritemai.com/docs/api-docs/16/102
 *
 * 业务参数
 * 名称 类型 是否必须 示例值 参数描述
 * province_id String 是 340000 省ID
 * 请求示例
 * https://openapi-fxg.jinritemai.com/address/cityList?app_key=your_app_key_here&access_token=your_accesstoken_here&method=address.cityList&param_json={"province_id":"340000"}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应参数
 * 参数名称 参数描述
 * city_id long整型，市ID
 * city 市名称，中文
 * father_id long整型，父节点ID
 * 响应示例
 * {
 * "data": [
 * {
 * "city_id": 340800,
 * "city": "安庆市",
 * "father_id": 340000
 * },
 * {
 * "city_id": 340300,
 * "city": "蚌埠市",
 * "father_id": 340000
 * },
 * {
 * "city_id": 341600,
 * "city": "亳州市",
 * "father_id": 340000
 * },
 * ...
 * ],
 * "err_no": 0,
 * "message": "success"
 * }
 */
class CityListRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "address/cityList";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// province_id String 是 340000 省ID
	public $province_id = NULL;
	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->province_id)) {
			$params['province_id'] = $this->province_id;
		}
		$this->param_json = $params;
	}
}
