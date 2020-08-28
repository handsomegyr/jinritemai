<?php

namespace Jinritemai\Request\Order;

/**
 * 回复服务请求
 * 回复客服向店铺发起的服务请求
 * https://op.jinritemai.com/docs/api-docs/15/75
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * id String 是 123 服务请求列表中获取的id
 * reply String 是 哈哈哈 回复内容
 * 请求示例
 * https://openapi-fxg.jinritemai.com/order/replyService?app_key=your_app_key_here&access_token=your_accesstoken_here&method=order.replyService&param_json={"id":"24174","reply":"test"}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "err_no": 0,
 * "message": "success"
 * }
 */
class ReplyServiceRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "order/replyService";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// id String 是 123 服务请求列表中获取的id
	// reply String 是 哈哈哈 回复内容
	public $id = NULL;
	public $reply = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->id)) {
			$params['id'] = $this->id;
		}
		if ($this->isNotNull($this->reply)) {
			$params['reply'] = $this->reply;
		}
		$this->param_json = $params;
	}
}
