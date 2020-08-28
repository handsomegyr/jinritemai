<?php

namespace Jinritemai\Request\AfterSale;

/**
 * 商家确认是否收到退货
 * 用户填写退货物流后，商家处理，确认是否收到退货
 * 注：货到付款订单，调此接口确认收货，必须上传退款凭证图片。售后状态会变为24（退货成功-商户已退款）
 * https://op.jinritemai.com/docs/api-docs/17/91
 *
 * 二、业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * order_id String 是 123123123123123 子订单ID
 * type String 是 1 处理方式：1：确认收货并退款2：拒绝
 * comment String 否 1 type = 2 时需要选择拒绝原因；具体各个可选值对应的拒绝原因见下表
 * evidence String 否 http://pic/pic.jpeg 凭证图片（货到付款订单，必填）
 * register string 是 1 字段无意义，传1即可，后续下线
 * package string 是 1 字段无意义，传1即可，后续下线
 * facade string 是 1 字段无意义，传1即可，后续下线
 * function string 是 1 字段无意义，传1即可，后续下线
 * comment值对应表
 * comment值 对应拒绝原因
 * 1 未收到货（未填写退货单号）
 * 2 退货与原订单不符（商品不符、退货地址不符）
 * 3 退回商品影响二次销售/订单超出售后时效（订单完成超7天）
 * 4 买家误操作/取消申请
 * 5 已与买家协商补偿，包括差价、赠品、额外补偿
 * 6 已与买家协商补发商品/已与买家协商换货
 * 三、请求示例
 * https://openapi-fxg.jinritemai.com/afterSale/firmReceive?app_key=your_app_key_here&access_token=your_accesstoken_here&method=afterSale.firmReceive&param_json={"order_id":"123123123123","type":"1"}&timestamp=2018-06-14%2016:06:59&v=2&sign=your_sign_here
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
class FirmReceiveRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "afterSale/firmReceive";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// order_id String 是 123123123123123 子订单ID
	// type String 是 1 处理方式：1：确认收货并退款2：拒绝
	// comment String 否 1 type = 2 时需要选择拒绝原因；具体各个可选值对应的拒绝原因见下表
	// evidence String 否 http://pic/pic.jpeg 凭证图片（货到付款订单，必填）
	// register string 是 1 字段无意义，传1即可，后续下线
	// package string 是 1 字段无意义，传1即可，后续下线
	// facade string 是 1 字段无意义，传1即可，后续下线
	// function string 是 1 字段无意义，传1即可，后续下线
	public $order_id = NULL;
	public $type = NULL;
	public $comment = NULL;
	public $evidence = NULL;
	public $register = NULL;
	public $package = NULL;
	public $facade = NULL;
	public $function = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->order_id)) {
			$params['order_id'] = $this->order_id;
		}
		if ($this->isNotNull($this->type)) {
			$params['type'] = $this->type;
		}
		if ($this->isNotNull($this->comment)) {
			$params['comment'] = $this->comment;
		}
		if ($this->isNotNull($this->evidence)) {
			$params['evidence'] = $this->evidence;
		}
		if ($this->isNotNull($this->register)) {
			$params['register'] = $this->register;
		}
		if ($this->isNotNull($this->package)) {
			$params['package'] = $this->package;
		}
		if ($this->isNotNull($this->facade)) {
			$params['facade'] = $this->facade;
		}
		if ($this->isNotNull($this->function)) {
			$params['function'] = $this->function;
		}
		$this->param_json = $params;
	}
}
