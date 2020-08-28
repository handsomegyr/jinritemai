<?php

namespace Jinritemai\Request\Spec;

/**
 * 获取规格列表
 * https://op.jinritemai.com/docs/api-docs/14/64
 *
 * 业务参数
 * 无（注意：param_json请按照空对象 "{}" 传递）
 *
 * 请求示例
 * https://openapi-fxg.jinritemai.com/spec/list?app_key=your_app_key_here&method=spec.list&access_token=your_accesstoken_here&param_json={}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "data": [
 * {
 * "id": 7,
 * "name": "颜色-尺码"
 * },
 * {
 * "id": 8,
 * "name": "规格2"
 * }
 * ],
 * "err_no": 0,
 * "message": "success"
 * }
 */
class ListRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "spec/list";
}
