<?php

namespace Jinritemai\Request\AfterSale;

/**
 * 获取有售后的订单列表
 * 订单已发货，通过该接口可拉取有售后的订单：
 *
 * 售后仅退款
 * 售后退货
 * https://op.jinritemai.com/docs/api-docs/17/88
 *
 * 二、业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * type String 否 3 类型(1.全部售后单 2.待商家处理 3.待商家收货 4.待客服仲裁 5.退款成功 6.售后关闭 7.待买家退货)默认为1.全部
 * start_time String 否 2018/06/03 00:00:00 开始时间
 * end_time String 否 2018/06/03 00:01:00 结束时间
 * order_by String 是 create_time 1、搜索时间条件：按订单创建时间create_time；按订单更新时间进行搜索update_time2、默认按创建时间搜索
 * is_desc String 否 1 订单排序方式：最近的在前，1；最近的在后，0
 * page String 否 0 页数（默认值为0，第一页从0开始）
 * size String 否 100 每页订单数（默认为10，最大100）
 * type值对应表
 * 入参type值 对应子订单的final_status
 * 2 6: 退货申请待商家处理
 * 30: 仅退款申请待商家处理
 * 3 11: 买家已退货，待商家收货
 * 4 8: 商家拒绝退货申请，待客服仲裁
 * 13: 商家拒绝收货，待客服仲裁
 * 34: 商家拒绝仅退款申请，待客服仲裁
 * 5 22: 在线支付订单，退货退款成功
 * 24: 货到付款订单，退货退款成功
 * 39: 仅退款成功
 * 6 9: 退货关闭
 * 37: 仅退款关闭
 * 7 7 & 10: 待买家填写退货物流
 * 三、请求示例
 * https://openapi-fxg.jinritemai.com/afterSale/orderList?app_key=your_app_key_here&access_token=your_accesstoken_here&method=afterSale.orderList&param_json={"type":"1","is_desc":"1","order_by":"create_time","page":"0","size":"20"}&timestamp=2018-06-14%2016:06:59&v=2&sign=your_sign_here
 * 四、响应参数
 * 返回格式及各字段含义同order/list接口一致
 *
 * 五、响应示例
 * {
 * "data": {
 * "count": 2,
 * "list": [
 * {
 * "buyer_words": "有送玩具吗。",
 * "c_type": "4",
 * "campaign_id": "0",
 * "campaign_info": [
 *
 * ],
 * "cancel_reason": "",
 * "code": "12345",
 * "combo_amount": 6990,
 * "combo_id": 123123,
 * "combo_num": 1,
 * "cos_ratio": "10.30",
 * "coupon_amount": 0,
 * "coupon_info": [
 *
 * ],
 * "coupon_meta_id": "0",
 * "create_time": "1539100483",
 * "final_status": 22,
 * "is_comment": "0",
 * "logistics_code": "123123123",
 * "logistics_id": 14,
 * "logistics_time": "1539135789",
 * "order_id": "123123123",
 * "order_status": 22,
 * "out_product_id": 123123,
 * "out_sku_id": 123123,
 * "pay_time": "2018-10-09 23:54:52",
 * "pay_type": 1,
 * "pid": "0",
 * "post_addr": {
 * "city": {
 * "id": "441600",
 * "name": "河源市"
 * },
 * "detail": "测试地址",
 * "province": {
 * "id": "440000",
 * "name": "广东省"
 * },
 * "town": {
 * "id": "441602",
 * "name": "源城区"
 * }
 * },
 * "post_amount": 0,
 * "post_code": "10010",
 * "post_receiver": "收件人",
 * "post_tel": "123123123",
 * "product_id": "123123123",
 * "product_name": "保湿喷雾定妆",
 * "receipt_time": "1539332270",
 * "seller_words": " ",
 * "shop_coupon_amount": 0,
 * "shop_id": 12345,
 * "spec_desc": [
 * {
 * "name": "款式",
 * "value": "定妆喷雾"
 * },
 * {
 * "name": "规格",
 * "value": "100ml"
 * }
 * ],
 * "total_amount": 6990,
 * "update_time": 1539581697,
 * "urge_cnt": 0,
 * "user_name": ""
 * },
 * {
 * "buyer_words": "",
 * "c_type": "4",
 * "campaign_id": "0",
 * "campaign_info": [
 *
 * ],
 * "cancel_reason": "",
 * "code": "123123",
 * "combo_amount": 1990,
 * "combo_id": 123123,
 * "combo_num": 1,
 * "cos_ratio": "39.70",
 * "coupon_amount": 0,
 * "coupon_info": [
 *
 * ],
 * "coupon_meta_id": "0",
 * "create_time": "1538920117",
 * "final_status": 9,
 * "is_comment": "0",
 * "logistics_code": "123123123",
 * "logistics_id": 20,
 * "logistics_time": "1539050192",
 * "order_id": "123123123123",
 * "order_status": 9,
 * "out_product_id": 123123,
 * "out_sku_id": 123123,
 * "pay_time": "2018-10-07 21:48:44",
 * "pay_type": 2,
 * "pid": "0",
 * "post_addr": {
 * "city": {
 * "id": "420100",
 * "name": "武汉市"
 * },
 * "detail": "测试地址",
 * "province": {
 * "id": "420000",
 * "name": "湖北省"
 * },
 * "town": {
 * "id": "420102",
 * "name": "江岸区"
 * }
 * },
 * "post_amount": 0,
 * "post_code": "10010",
 * "post_receiver": "收件人",
 * "post_tel": "13500010002",
 * "product_id": "123123123123",
 * "product_name": "去黑头神器",
 * "receipt_time": "1539138114",
 * "seller_words": " ",
 * "shop_coupon_amount": 0,
 * "shop_id": 12345,
 * "spec_desc": [
 * {
 * "name": "规格",
 * "value": "22g"
 * }
 * ],
 * "total_amount": 1990,
 * "update_time": 1539246385,
 * "urge_cnt": 0,
 * "user_name": ""
 * }
 * ],
 * "total": 2
 * },
 * "err_no": 0,
 * "message": "success"
 * }
 */
class OrderListRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "afterSale/orderList";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// type String 否 3 类型(1.全部售后单 2.待商家处理 3.待商家收货 4.待客服仲裁 5.退款成功 6.售后关闭 7.待买家退货)默认为1.全部
	// start_time String 否 2018/06/03 00:00:00 开始时间
	// end_time String 否 2018/06/03 00:01:00 结束时间
	// order_by String 是 create_time 1、搜索时间条件：按订单创建时间create_time；按订单更新时间进行搜索update_time2、默认按创建时间搜索
	// is_desc String 否 1 订单排序方式：最近的在前，1；最近的在后，0
	// page String 否 0 页数（默认值为0，第一页从0开始）
	// size String 否 100 每页订单数（默认为10，最大100）
	public $type = NULL;
	public $start_time = NULL;
	public $end_time = NULL;
	public $order_by = NULL;
	public $is_desc = NULL;
	public $page = NULL;
	public $size = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->type)) {
			$params['type'] = $this->type;
		}
		if ($this->isNotNull($this->start_time)) {
			$params['start_time'] = $this->start_time;
		}
		if ($this->isNotNull($this->end_time)) {
			$params['end_time'] = $this->end_time;
		}
		if ($this->isNotNull($this->order_by)) {
			$params['order_by'] = $this->order_by;
		}
		if ($this->isNotNull($this->is_desc)) {
			$params['is_desc'] = $this->is_desc;
		}
		if ($this->isNotNull($this->page)) {
			$params['page'] = $this->page;
		}
		if ($this->isNotNull($this->size)) {
			$params['size'] = $this->size;
		}
		$this->param_json = $params;
	}
}
