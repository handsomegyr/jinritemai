<?php

namespace Jinritemai\Request\Refund;

/**
 * 商家处理备货中退款申请
 * 订单备货中，用户申请退款，商家处理。
 *
 * 接口使用场景及order_status变更情况
 *
 * 原始订单状态码 同意退款后 拒绝退款申请后
 * 16（退款中-用户申请） 17（退款中-商家同意） 3（已发货）
 * https://op.jinritemai.com/docs/api-docs/17/87
 *
 * 二、业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * order_id String 是 123123123123123A 父订单ID，须带字母A
 * type String 是 1 处理方式：1：同意退款 2：不同意退款
 * logistics_id String 否 1 type = 2 时必须填写物流公司ID，由接口/order/logisticsCompanyList返回的物流公司列表中对应的ID
 * logistics_code String 否 1 type = 2 时必须填写物流单号
 * 三、请求示例
 * https://openapi-fxg.jinritemai.com/refund/shopRefund?app_key=your_app_key_here&access_token=your_accesstoken_here&method=refund.shopRefund&param_json={"order_id":"123123123123A","type":"1"}&timestamp=2018-06-14%2016:06:59&v=2&sign=your_sign_here
 * 四、响应示例
 * {
 * "errno": 0,
 * "message": "success",
 * "data": {
 * "code": 0,
 * "msg": "调用成功"
 * }
 * }
 */
class ShopRefundRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "refund/shopRefund";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// order_id String 是 123123123123123A 父订单ID，须带字母A
	// type String 是 1 处理方式：1：同意退款 2：不同意退款
	// logistics_id String 否 1 type = 2 时必须填写物流公司ID，由接口/order/logisticsCompanyList返回的物流公司列表中对应的ID
	// logistics_code String 否 1 type = 2 时必须填写物流单号
	public $order_id = NULL;
	public $type = NULL;
	public $logistics_id = NULL;
	public $logistics_code = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->order_id)) {
			$params['order_id'] = $this->order_id;
		}
		if ($this->isNotNull($this->type)) {
			$params['type'] = $this->type;
		}
		if ($this->isNotNull($this->logistics_id)) {
			$params['logistics_id'] = $this->logistics_id;
		}
		if ($this->isNotNull($this->logistics_code)) {
			$params['logistics_code'] = $this->logistics_code;
		}
		$this->param_json = $params;
	}
}
