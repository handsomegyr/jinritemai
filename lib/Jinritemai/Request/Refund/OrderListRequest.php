<?php

namespace Jinritemai\Request\Refund;

/**
 * 获取备货中有退款的订单列表
 * 在订单发货前，用户能申请退款，但此时只能申请整单退。
 * https://op.jinritemai.com/docs/api-docs/17/80
 *
 * 二、业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * type String 否 3 类型(1.全部 2.待商家处理 5.退款成功) 默认为1
 * start_time String 否 2018/06/03 00:00:00 开始时间
 * end_time String 否 2018/06/03 00:01:00 结束时间
 * order_by String 是 create_time 1、搜索时间条件：按订单创建时间create_time；按订单更新时间进行搜索update_time 2、默认创建时间
 * is_desc String 否 1 订单排序方式：最近的在前，1；最近的在后，0
 * page String 否 0 页数（默认值为0，第一页从0开始）
 * size String 否 100 每页订单数（默认为10，最大100）
 * type值对应表
 * type值 对应子订单的final_status
 * 2 16: 用户申请退款，待商家处理
 * 5 21: 退款成功
 * 三、请求示例
 * https://openapi-fxg.jinritemai.com/refund/orderList?app_key=your_app_key_here&access_token=your_accesstoken_here&method=refund.orderList&param_json={"type":"1","is_desc":"1","order_by":"create_time","page":"0","size":"20"}&timestamp=2018-06-14%2016:06:59&v=2&sign=your_sign_here
 * 四、响应参数
 * 返回格式及各字段含义同order/list接口一致
 *
 * 五、响应示例
 * {
 * "data": {
 * "count": 1,
 * "list": [{
 * "buyer_words": "",
 * "c_type": "4",
 * "cancel_reason": "",
 * "child": [{
 * "buyer_words": "",
 * "c_type": "4",
 * "campaign_id": "0",
 * "campaign_info": [
 *
 * ],
 * "cancel_reason": "",
 * "code": "",
 * "combo_amount": 3,
 * "combo_id": 15892403,
 * "combo_num": 1,
 * "cos_ratio": "66.70",
 * "coupon_amount": 0,
 * "coupon_info": [
 *
 * ],
 * "coupon_meta_id": "0",
 * "create_time": "1528007434",
 * "final_status": 21,
 * "is_comment": "0",
 * "logistics_code": "",
 * "logistics_id": 0,
 * "logistics_time": "0",
 * "order_id": "3281370978906670001",
 * "order_status": 21,
 * "out_product_id": 0,
 * "out_sku_id": 0,
 * "pay_time": "1970-01-01 08:00:01",
 * "pay_type": 1,
 * "pid": "3281370978906670001A",
 * "post_addr": {
 * "city": {
 * "id": "130400",
 * "name": "邯郸市"
 * },
 * "detail": "哈哈哈",
 * "province": {
 * "id": "130000",
 * "name": "河北省"
 * },
 * "town": {
 * "id": "130402",
 * "name": "邯山区"
 * }
 * },
 * "post_amount": 0,
 * "post_code": "10010",
 * "post_receiver": "不好好",
 * "post_tel": "13240730001",
 * "product_id": "3277894953845550001",
 * "product_name": "测试专用-气质淑女衬衫女潮",
 * "receipt_time": "0",
 * "seller_words": " ",
 * "shop_coupon_amount": 0,
 * "shop_id": 101072,
 * "spec_desc": [{
 * "name": "尺码",
 * "value": "均码"
 * },
 * {
 * "name": "颜色分类",
 * "value": "白色"
 * }
 * ],
 * "total_amount": 3,
 * "update_time": 1534584531,
 * "urge_cnt": 0,
 * "user_name": ""
 * }],
 * "child_num": 1,
 * "cos_ratio": "66.70",
 * "coupon_amount": 0,
 * "coupon_info": [
 *
 * ],
 * "create_time": "1528007434",
 * "final_status": 21,
 * "is_comment": "0",
 * "logistics_code": "",
 * "logistics_id": 0,
 * "logistics_time": "0",
 * "order_id": "3281370978906670001A",
 * "order_status": 21,
 * "order_total_amount": 3,
 * "pay_time": "1970-01-01 08:00:01",
 * "pay_type": 1,
 * "post_addr": {
 * "city": {
 * "id": "130400",
 * "name": "邯郸市"
 * },
 * "detail": "哈哈哈",
 * "province": {
 * "id": "130000",
 * "name": "河北省"
 * },
 * "town": {
 * "id": "130402",
 * "name": "邯山区"
 * }
 * },
 * "post_amount": 0,
 * "post_code": "10010",
 * "post_receiver": "不好好",
 * "post_tel": "13240730001",
 * "receipt_time": "0",
 * "seller_words": " ",
 * "shop_coupon_amount": 0,
 * "shop_id": 123123,
 * "update_time": 1534584531,
 * "urge_cnt": 0,
 * "user_name": ""
 * },
 * ],
 * "total": 1
 * },
 * "err_no": 0,
 * "message": "success"
 * }
 */
class OrderListRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "refund/orderList";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// type String 否 3 类型(1.全部 2.待商家处理 5.退款成功) 默认为1
	// start_time String 否 2018/06/03 00:00:00 开始时间
	// end_time String 否 2018/06/03 00:01:00 结束时间
	// order_by String 是 create_time 1、搜索时间条件：按订单创建时间create_time；按订单更新时间进行搜索update_time 2、默认创建时间
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
