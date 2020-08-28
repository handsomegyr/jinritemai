<?php

namespace Jinritemai\Request\Spec;

/**
 * 添加规格
 * https://op.jinritemai.com/docs/api-docs/14/62
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * specs String 是 颜色|黑色,白色,黄色^尺码|S,M,L 店铺通用规格，能被同类商品通用。多规格用^分隔，父规格与子规格用|分隔，子规格用,分隔
 * name String 否 规格1 如果不填，则规格名为子规格名用 "-" 自动生成
 * 请求示例
 * https://openapi-fxg.jinritemai.com/spec/add?app_key=your_app_key_here&method=spec.add&access_token=your_accesstoken_here&param_json={"name":"testSpecs","specs":"颜色|黑色,白色,黄色^尺码|S,M,L"}&timestamp=2018-06-14%2016:06:59&v=2&sign=your_sign_here
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
class AddRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "spec/add";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// specs String 是 颜色|黑色,白色,黄色^尺码|S,M,L 店铺通用规格，能被同类商品通用。多规格用^分隔，父规格与子规格用|分隔，子规格用,分隔
	// name String 否 规格1 如果不填，则规格名为子规格名用 "-" 自动生成
	public $specs = NULL;
	public $name = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->specs)) {
			$params['specs'] = $this->specs;
		}
		if ($this->isNotNull($this->name)) {
			$params['name'] = $this->name;
		}
		$this->param_json = $params;
	}
}
