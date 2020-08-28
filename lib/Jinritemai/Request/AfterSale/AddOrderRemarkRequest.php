<?php

namespace Jinritemai\Request\AfterSale;

/**
 * 商家为订单添加售后备注
 * 此接口可用于给备货中退款的订单、已发货退货/仅退款的订单，添加售后备注
 * https://op.jinritemai.com/docs/api-docs//17/93
 *
 * 二、业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * order_id String 是 123123123123123 子订单ID
 * remark String 是 测试的内容 售后备注内容
 * 三、请求示例
 * https://openapi-fxg.jinritemai.com/afterSale/addOrderRemark?app_key=your_app_key_here&access_token=your_accesstoken_here&method=afterSale.addOrderRemark&param_json={"order_id":"123123123123","remark":"添加一个订单备注"}&timestamp=2018-06-14%2016:06:59&v=2&sign=your_sign_here
 * 四、响应示例
 * {
 * "err_no": 0,
 * "message": "success",
 * "data": {
 * "code": 0,
 * "msg": "调用成功"
 * }
 * }
 */
class AddOrderRemarkRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "afterSale/addOrderRemark";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// order_id String 是 123123123123123 子订单ID
	// remark String 是 测试的内容 售后备注内容
	public $order_id = NULL;
	public $remark = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->order_id)) {
			$params['order_id'] = $this->order_id;
		}
		if ($this->isNotNull($this->remark)) {
			$params['remark'] = $this->remark;
		}
		$this->param_json = $params;
	}
}
