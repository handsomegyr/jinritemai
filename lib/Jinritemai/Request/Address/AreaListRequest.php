<?php

namespace Jinritemai\Request\Address;

/**
 * 获取区列表
 * 获取平台支持的区列表
 * https://op.jinritemai.com/docs/api-docs/14/57
 *
 * 业务参数
 * 名称 类型 是否必须 示例值 参数描述
 * city_id String 是 341600 市ID
 * 请求示例
 * https://openapi-fxg.jinritemai.com/address/areaList?app_key=your_app_key_here&access_token=your_accesstoken_here&method=address.areaList&param_json={"city_id":"341600"}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应参数
 * 参数名称 参数描述
 * area_id long整型，市ID
 * area 市名称，中文
 * father_id long整型，父节点ID
 * 响应示例
 * {
 * "data": [
 * {
 * "area_id": 341621,
 * "area": "涡阳县",
 * "father_id": 341600
 * },
 * {
 * "area_id": 341623,
 * "area": "利辛县",
 * "father_id": 341600
 * },
 * {
 * "area_id": 341622,
 * "area": "蒙城县",
 * "father_id": 341600
 * },
 * {
 * "area_id": 341602,
 * "area": "谯城区",
 * "father_id": 341600
 * },
 * {
 * "area_id": 341699,
 * "area": "其它区",
 * "father_id": 341600
 * },
 * {
 * "area_id": 341601,
 * "area": "市辖区",
 * "father_id": 341600
 * }
 * ],
 * "err_no": 0,
 * "message": "success"
 * }
 */
class AreaListRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "address/areaList";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// city_id String 是 341600 市ID
	public $city_id = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->city_id)) {
			$params['city_id'] = $this->city_id;
		}
		$this->param_json = $params;
	}
}
