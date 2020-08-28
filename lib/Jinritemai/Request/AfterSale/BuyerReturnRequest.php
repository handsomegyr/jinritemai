<?php

namespace Jinritemai\Request\AfterSale;

/**
 * 商家处理退货申请
 * 订单已发货，用户申请售后退货，商家处理
 * https://op.jinritemai.com/docs/api-docs/17/90
 *
 * 二、业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * order_id String 是 123123123123123 子订单ID
 * type String 是 1 处理方式：1：同意用户退货申请 2：拒绝用户退货申请
 * sms_id String 是 1 是否使用模版短信发送短信：1：是 0：否
 * comment String 否 1 type = 2 时需要选择拒绝原因具体各个可选值对应的释义见页面底部
 * evidence String 是 https://xxxx.jpg type = 2 时需要上传图片凭证，仅支持1张图片
 * address_id String 否 123 商家退货物流收货地址id,不传则使用默认售后收货地址
 * comment值对应表
 * comment值 对应具体原因
 * 1 未收到货（未填写退货单号）
 * 2 退货与原订单不符（商品不符、退货地址不符）
 * 3 退回商品影响二次销售', '订单超出售后时效（订单完成超7天）
 * 4 买家误操作/取消申请
 * 5 已与买家协商补偿，包括差价、赠品、额外补偿
 * 6 已与买家协商补发商品', '已与买家协商换货
 * 三、请求示例
 * https://openapi-fxg.jinritemai.com/afterSale/buyerReturn?app_key=your_app_key_here&access_token=your_accesstoken_here&method=afterSale.buyerReturn&param_json={"comment":"1","order_id":"123123123123","sms_id":"1","type":"1"}&timestamp=2018-06-14%2016:06:59&v=2&sign=your_sign_here
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
class BuyerReturnRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "afterSale/buyerReturn";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// order_id String 是 123123123123123 子订单ID
	// type String 是 1 处理方式：1：同意用户退货申请 2：拒绝用户退货申请
	// sms_id String 是 1 是否使用模版短信发送短信：1：是 0：否
	// comment String 否 1 type = 2 时需要选择拒绝原因具体各个可选值对应的释义见页面底部
	// evidence String 是 https://xxxx.jpg type = 2 时需要上传图片凭证，仅支持1张图片
	// address_id String 否 123 商家退货物流收货地址id,不传则使用默认售后收货地址
	public $order_id = NULL;
	public $type = NULL;
	public $sms_id = NULL;
	public $comment = NULL;
	public $evidence = NULL;
	public $address_id = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->order_id)) {
			$params['order_id'] = $this->order_id;
		}
		if ($this->isNotNull($this->type)) {
			$params['type'] = $this->type;
		}
		if ($this->isNotNull($this->sms_id)) {
			$params['sms_id'] = $this->sms_id;
		}
		if ($this->isNotNull($this->comment)) {
			$params['comment'] = $this->comment;
		}
		if ($this->isNotNull($this->evidence)) {
			$params['evidence'] = $this->evidence;
		}
		if ($this->isNotNull($this->address_id)) {
			$params['address_id'] = $this->address_id;
		}
		$this->param_json = $params;
	}
}
