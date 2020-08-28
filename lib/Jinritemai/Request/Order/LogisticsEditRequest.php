<?php

namespace Jinritemai\Request\Order;

/**
 * 修改发货物流
 * 修改已发货订单（final_status=3）的发货物流信息
 * https://op.jinritemai.com/docs/api-docs/16/79
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * order_id String 是 6496679971677798670A 父订单ID，由orderList接口返回
 * logistics_id String 是 12 物流公司ID，由接口/order/logisticsCompanyList返回的物流公司列表中对应的ID
 * company String 否 顺丰速递 物流公司名称
 * logistics_code String 是 9595123123 运单号
 * 请求示例
 * https://openapi-fxg.jinritemai.com/order/logisticsEdit?app_key=your_app_key_here&access_token=your_accesstoken_here&method=order.logisticsEdit&param_json={"company":"顺丰速递","logistics_code":"9595123123","logistics_id":"12","order_id":"order_id_here"}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "err_no": 0,
 * "message": "success",
 * "data": []
 * }
 */
class LogisticsEditRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "order/logisticsEdit";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// order_id String 是 6496679971677798670A 父订单ID，由orderList接口返回
	// logistics_id String 是 12 物流公司ID，由接口/order/logisticsCompanyList返回的物流公司列表中对应的ID
	// company String 否 顺丰速递 物流公司名称
	// logistics_code String 是 9595123123 运单号
	public $order_id = NULL;
	public $logistics_id = NULL;
	public $company = NULL;
	public $logistics_code = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->order_id)) {
			$params['order_id'] = $this->order_id;
		}
		if ($this->isNotNull($this->logistics_id)) {
			$params['logistics_id'] = $this->logistics_id;
		}
		if ($this->isNotNull($this->company)) {
			$params['company'] = $this->company;
		}
		if ($this->isNotNull($this->logistics_code)) {
			$params['logistics_code'] = $this->logistics_code;
		}
		$this->param_json = $params;
	}
}
