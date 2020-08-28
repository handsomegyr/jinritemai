<?php

namespace Jinritemai\Request\Spec;

/**
 * 删除规格
 * https://op.jinritemai.com/docs/api-docs/14/65
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * id String 是 134 规格id (spec_id)
 * 请求示例
 * https://openapi-fxg.jinritemai.com/spec/del?app_key=your_app_key_here&method=spec.del&access_token=your_accesstoken_here&param_json={"id":"spec_id_here"}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "data": true,
 * "err_no": 0,
 * "message": "success"
 * }
 */
class DelRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "spec/del";

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
