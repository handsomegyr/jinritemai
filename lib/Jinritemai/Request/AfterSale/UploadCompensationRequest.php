<?php

namespace Jinritemai\Request\AfterSale;

/**
 * 货到付款订单上传退款凭证
 * 货到付款订单，用户申请退货，商家确认收到退货时（final_status=12 or 14时）。如果需要上传退款凭证，需要调此接口！
 * https://op.jinritemai.com/docs/api-docs/17/92
 *
 * 二、业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * order_id String 是 123123123123123 子订单ID
 * comment String 是 测试的内容 凭证备注
 * evidence String 是 https://xxxx.jpg 凭证图片，值传图片的url地址
 * 三、请求示例
 * https://openapi-fxg.jinritemai.com/afterSale/uploadCompensation?app_key=your_app_key_here&access_token=your_accesstoken_here&method=afterSale.uploadCompensation&param_json={"comment":"赔付凭证备注","evidence":"http://pic.jpg","order_id":"123123123123"}&timestamp=2018-06-14%2016:06:59&v=2&sign=your_sign_here
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
class UploadCompensationRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "afterSale/uploadCompensation";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// order_id String 是 123123123123123 子订单ID
	// comment String 是 测试的内容 凭证备注
	// evidence String 是 https://xxxx.jpg 凭证图片，值传图片的url地址
	public $order_id = NULL;
	public $comment = NULL;
	public $evidence = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->order_id)) {
			$params['order_id'] = $this->order_id;
		}
		if ($this->isNotNull($this->comment)) {
			$params['comment'] = $this->comment;
		}
		if ($this->isNotNull($this->evidence)) {
			$params['evidence'] = $this->evidence;
		}
		$this->param_json = $params;
	}
}
