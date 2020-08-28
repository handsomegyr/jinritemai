<?php

namespace Jinritemai\Request\Address;

/**
 * 获取省列表
 * 获取平台支持的省列表
 * https://op.jinritemai.com/docs/api-docs/16/101
 *
 * 业务参数
 * 无
 *
 * 请求示例
 * https://openapi-fxg.jinritemai.com/address/provinceList?app_key=your_app_key_here&access_token=your_accesstoken_here&method=address.provinceList&param_json={}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应参数
 * 参数名称 参数描述
 * province_id long整型，省ID
 * province 省名称，中文
 * father_id long整型，父节点ID
 * 响应示例
 * {
 * "data": [
 * {
 * "province_id": 340000,
 * "province": "安徽省",
 * "father_id": 1
 * },
 * {
 * "province_id": 820000,
 * "province": "澳门特别行政区",
 * "father_id": 7
 * },
 * {
 * "province_id": 110000,
 * "province": "北京市",
 * "father_id": 2
 * },
 * ...
 * ],
 * "err_no": 0,
 * "message": "success"
 * }
 */
class DetailRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "address/provinceList";
}
