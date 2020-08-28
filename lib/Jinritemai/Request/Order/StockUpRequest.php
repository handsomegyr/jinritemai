<?php

namespace Jinritemai\Request\Order;

/**
 * 确认货到付款订单
 * 当货到付款订单是待确认状态（final_status=1）时，可调此接口确认订单。确认后，订单状态更新为“备货中”
 * https://op.jinritemai.com/docs/api-docs/15/69
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * order_id String 是 6496679971677798670A 父订单id，由orderList接口返回
 * 请求示例
 * https://openapi-fxg.jinritemai.com/order/stockUp?app_key=your_appkey_here&method=order.stockUp&access_token=your_accesstoken_here&param_json={"order_id":"order_id_here"}&timestamp=2018-06-19 16:06:59&v=2&sign=your_sign_here
 * 响应参数
 * 响应示例
 * {
 * "errno": 0,
 * "message": "success",
 * "data": {
 * "st": 0,
 * "msg": "",
 * "data": []
 * }
 * }
 */
class StockUpRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "order/stockUp";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// order_id String 是 6496679971677798670A 父订单id，由orderList接口返回
	public $order_id = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->order_id)) {
			$params['order_id'] = $this->order_id;
		}
		$this->param_json = $params;
	}
}
