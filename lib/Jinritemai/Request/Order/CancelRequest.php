<?php

namespace Jinritemai\Request\Order;

/**
 * 取消订单
 * 取消待确认或备货中的货到付款订单（final_status=1或2）
 * https://op.jinritemai.com/docs/api-docs/15/72
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * order_id String 是 6496679971677798670A 父订单ID，由orderList接口返回
 * reason String 是 用户重复下单 取消订单的原因
 * 请求示例
 * https://openapi-fxg.jinritemai.com/order/cancel?app_key=your_app_key_here&access_token=your_accesstoken_here&method=order.cancel&param_json={"order_id":"order_id_here","reason":"cancel reason"}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "err_no": 0,
 * "message": "success"
 * }
 */
class CancelRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "order/cancel";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// order_id String 是 6496679971677798670A 父订单ID，由orderList接口返回
	// reason String 是 用户重复下单 取消订单的原因
	public $order_id = NULL;
	public $reason = NULL;
	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->order_id)) {
			$params['order_id'] = $this->order_id;
		}
		if ($this->isNotNull($this->reason)) {
			$params['reason'] = $this->reason;
		}
		$this->param_json = $params;
	}
}
