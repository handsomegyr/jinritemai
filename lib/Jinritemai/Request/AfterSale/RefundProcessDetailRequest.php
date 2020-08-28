<?php

namespace Jinritemai\Request\AfterSale;

/**
 * 获取售后详情（建议使用）
 * 订单已发货，买家申请售后。可通过该接口获取售后详细信息（建议使用）
 * https://op.jinritemai.com/docs/api-docs/17/96
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * order_id String 是 1001 子订单ID，不带字母A
 * 请求示例
 * https://openapi-fxg.jinritemai.com/afterSale/refundProcessDetail?app_key=your_appkey_here&method=afterSale.refundProcessDetail&access_token=your_accesstoken_here&param_json={"order_id":"468094******001"}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应参数
 * 参数名称 参数类型 示例值 参数描述
 * order_info 结构对象 属性id
 * property_name 对象 退款的当前实时处理信息
 * logs 对象数组 [{},{}] 退款的历史处理日志信息
 * refund_total_amount int 退款总金额，单位是分
 * refund_post_amount Int 退的运费金额，单位是分
 * 响应示例
 * {
 * "data":{
 * "order_info":{ //订单信息
 * "order_id":468094******001, //订单号
 * "pid":0, //父订单号
 * "order_status":5, //订单的状态
 * "final_status":11, //退款状态
 * "status_desc":"退货中-用户填写物流", //退款状态对应的描述文案
 * "create_time":"2020-07-05 23:29:39", //订单创建事件
 * "receipt_time":"2020-07-08 12:18:10", //订单确认收货时间,可能为空字符串
 * "combo_num":1, //下单的sku购买数量
 * "combo_amount":8990, //下单时的sku单价
 * "total_amount":8990, //下单时sku对应的总价
 * "pay_amount":8990, //下单时改单实际支付的金额(sku总价扣除优惠后的)
 * "shop_id":1244977, //店铺id
 * "product_id":341313631****20667, //商品id
 * "product_name":"蕾丝拼接圆领粉色短袖T恤女2020夏新款打底衫洋气上衣", //商品名字
 * "product_img":"https://sf1-ttcdn-tos.pstatp.com/obj/temai/**" //商品图片
 * },
 * "process_info":{ //退款信息
 * "apply_time":"2020-07-11 00:29:20",
 * "reason":"其他",
 * "type_desc":"退货退款",
 * "apply_remark":"到货后试了衣服，我太高了，所以衣服不合身",
 * "evidence":[
 * "https://p1.pstatp.com/obj/31b9b0000dfc965946d05",
 * "https://p3.pstatp.com/obj/3198c0008c51f77fd7856"
 * ],
 * "logistics_time":"2020-07-11 00:41:05", //买家填写退货物流时间
 * "logistics_code":"4306875733859", //退货物流单号
 * "logistics_name":"韵达快递" //退货快递公司
 * },
 * "logs":[ //退款处理流水日志列表
 * {
 * "create_time":"2020-07-11 00:29:20",
 * "action":"申请退货",
 * "desc":"退货理由：其他",
 * "operator":"67939615271",
 * "evidence":[
 * "https://p1.pstatp.com/obj/31b9b0000dfc965946d05",
 * "https://p3.pstatp.com/obj/3198c0008c51f77fd7856"
 * ]
 * },
 * {
 * "create_time":"2020-07-11 00:37:16",
 * "action":"商家同意退货",
 * "desc":"",
 * "operator":"商家",
 * "evidence":[
 *
 * ]
 * },
 * {
 * "create_time":"2020-07-11 00:41:05",
 * "action":"填写退货物流",
 * "desc":"物流公司：韵达快递(常用)；快递单号：4306875733859", //退货物流信息
 * "operator":"用户",
 * "evidence":[
 *
 * ]
 * }
 * ],
 * "refund_total_amount":8990, //退款申请总金额
 * "refund_post_amount":0 //退款申请的退的运费金额
 * },
 * "err_no":0,
 * "message":"success"
 * }
 */
class RefundProcessDetailRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "afterSale/refundProcessDetail";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// order_id String 是 1001 子订单ID，不带字母A
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
