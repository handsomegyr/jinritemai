<?php

namespace Jinritemai\Request\Spec;

/**
 * 获取规格详情
 * https://op.jinritemai.com/docs/api-docs/14/63
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * id String 是 134 规格id (spec_id)
 * 请求示例
 * https://openapi-fxg.jinritemai.com/spec/specDetail?app_key=your_app_key_here&method=spec.specDetail&access_token=your_accesstoken_here&param_json={"id":"spec_id_here"}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "data": {
 * "id": 8,
 * "name": "规格2",
 * "Specs": [
 * {
 * "id": 31,
 * "spec_id": 0,
 * "name": "颜色",
 * "pid": 0,
 * "is_leaf": 0,
 * "values": [
 * {
 * "id": 32,
 * "spec_id": 8,
 * "name": "黑色",
 * "pid": 31,
 * "is_leaf": 1,
 * "status": 0
 * },
 * {
 * "id": 33,
 * "spec_id": 8,
 * "name": "白色",
 * "pid": 31,
 * "is_leaf": 1,
 * "status": 0
 * },
 * {
 * "id": 34,
 * "spec_id": 8,
 * "name": "黄色",
 * "pid": 31,
 * "is_leaf": 1,
 * "status": 0
 * }
 * ]
 * },
 * {
 * "id": 35,
 * "spec_id": 0,
 * "name": "尺码",
 * "pid": 0,
 * "is_leaf": 0,
 * "values": [
 * {
 * "id": 36,
 * "spec_id": 8,
 * "name": "S",
 * "pid": 35,
 * "is_leaf": 1,
 * "status": 0
 * },
 * {
 * "id": 37,
 * "spec_id": 8,
 * "name": "M",
 * "pid": 35,
 * "is_leaf": 1,
 * "status": 0
 * },
 * {
 * "id": 38,
 * "spec_id": 8,
 * "name": "L",
 * "pid": 35,
 * "is_leaf": 1,
 * "status": 0
 * }
 * ]
 * }
 * ]
 * },
 * "err_no": 0,
 * "message": "success"
 * }
 */
class SpecDetailRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "spec/specDetail";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// id String 是 134 规格id (spec_id)
	public $id = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->id)) {
			$params['id'] = $this->id;
		}
		$this->param_json = $params;
	}
}
