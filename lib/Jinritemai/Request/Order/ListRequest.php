<?php

namespace Jinritemai\Request\Order;

/**
 * 获取订单列表
 * 支持按照子订单状态和订单的创建时间、更新时间来检索订单，获取订单列表
 * https://op.jinritemai.com/docs/api-docs/15/55
 *
 * 二、业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * order_status String 否 3 子订单状态
 * start_time String 是 2018/06/03 00:00:00 开始时间
 * end_time String 是 2018/06/03 00:01:00 结束时间
 * order_by String 是 create_time 1、默认按订单创建时间搜索2、值为“create_time”：按订单创建时间；值为“update_time”：按订单更新时间
 * is_desc String 否 1 订单排序方式：设置了此字段即为desc(最近的在前)默认为asc（最近的在后）
 * page String 否 0 页数（默认为0，第一页从0开始）
 * size String 否 100 每页订单数（默认为10，最大100）
 * order_status订单正向状态码列表
 * 状态码 对应子订单状态
 * 1 在线支付订单待支付；货到付款订单待确认
 * 2 备货中（只有此状态下，才可发货）
 * 3 已发货
 * 4 已取消：1.用户未支付时取消订单；2.用户超时未支付，系统自动取消订单；3.货到付款订单，用户拒收
 * 5 已完成：1.在线支付订单，商家发货后，用户收货、拒收或者15天无物流更新；2.货到付款订单，用户确认收货
 * 三、请求示例
 * https://openapi-fxg.jinritemai.com/order/list?app_key=your_app_key_here&access_token=your_accesstoken_here&method=order.list&param_json={"end_time":"2018/05/31 16:01:02","is_desc":"1","page":"0","size":"10","start_time":"2018/04/01 15:03:58"}&timestamp=2018-06-14%2016:06:59&v=2&sign=your_sign_here
 * 四、响应参数
 * 1、父订单维度的响应参数
 * 参数名称 参数描述
 * order_id 订单ID
 * shop_id 店铺ID
 * pid 父订单ID
 * child 子订单列表
 * child_num 子订单数量
 * product_id 商品ID
 * product_name 商品名称
 * product_pic 商品图片 (spu维度的商品主图)
 * combo_id 该子订单购买的商品 sku_id
 * code 该子订单购买的商品的编码 code
 * spec_desc 该子订单所属商品规格描述
 * post_addr 收件人地址
 * post_code 邮政编码
 * post_receiver 收件人姓名
 * post_tel 收件人电话
 * buyer_words 买家备注
 * seller_words 卖家备注
 * logistics_id 物流公司ID
 * logistics_code 物流单号
 * logistics_time 发货时间
 * receipt_time 收货时间
 * order_status 订单状态
 * order_type 订单类型 (0:普通订单，2:虚拟订单，4:电子券)
 * create_time 订单创建时间
 * update_time 订单更新时间
 * exp_ship_time 订单最晚发货时间
 * cancel_reason 订单取消原因
 * pay_type 支付类型 (0：货到付款，1：微信，2：支付宝）
 * pay_time 支付时间 (pay_type为0货到付款时, 此字段为空)
 * combo_amount 该子订单所购买的sku的售价
 * combo_num 该子订单所购买的sku的数量
 * post_amount 邮费金额 (单位: 分)
 * coupon_amount 平台优惠券金额 (单位: 分)
 * shop_coupon_amount 商家优惠券金额 (单位: 分)
 * coupon_meta_id 优惠券id
 * coupon_info 优惠券详情 (type为优惠券类型，具体如下表所示, credit为优惠金额,单位分)
 * campaign_id 活动id
 * campaign_info 活动细则 (title为活动标题)
 * shop_full_campaign 满减活动(share_amount表示满减活动分摊到当前子订单的优惠金额)
 * total_amount 订单实付金额（不包含运费）
 * is_comment 是否评价 (1:已评价)
 * urge_cnt 催单次数
 * b_type 订单APP渠道，如下所示
 * c_biz 订单业务类型，如下所示
 * 2、子订单维度的响应参数
 * 参数名称 参数描述
 * order_id 订单ID
 * shop_id 店铺ID
 * pid 父订单ID
 * product_id 商品ID
 * product_name 商品名称
 * product_pic 商品图片 (spu维度的商品主图)
 * out_product_id 该子订单购买的商品外部id
 * combo_id 该子订单购买的商品 sku_id
 * out_sku_id 该子订单购买的商品外部 sku_id
 * code 该子订单购买的商品的编码 code
 * spec_desc 该子订单所属商品规格描述
 * post_addr 收件人地址
 * post_code 邮政编码
 * post_receiver 收件人姓名
 * post_tel 收件人电话
 * buyer_words 买家备注
 * seller_words 卖家备注
 * logistics_id 物流公司ID
 * logistics_code 物流单号
 * logistics_time 发货时间
 * receipt_time 收货时间
 * final_status 子订单状态，释义如下表
 * order_type 订单类型 (0实物，2普通虚拟，4poi核销，5三方核销，6服务市场)
 * pre_sale_type 订单预售类型 (1:全款预售订单)
 * create_time 订单创建时间
 * update_time 订单更新时间
 * exp_ship_time 订单最晚发货时间
 * cancel_reason 订单取消原因
 * pay_type 支付类型 (0：货到付款，1：微信，2：支付宝）
 * pay_time 支付时间 (pay_type为0货到付款时, 此字段为空)
 * combo_amount 该子订单所购买的sku的售价
 * combo_num 该子订单所购买的sku的数量
 * post_amount 邮费金额 (单位: 分)
 * coupon_amount 平台优惠券金额 (单位: 分)
 * shop_coupon_amount 商家优惠券金额 (单位: 分)
 * coupon_meta_id 优惠券id
 * coupon_info 优惠券详情 (type为优惠券类型，具体如下表所示, credit为优惠金额,单位分)
 * campaign_id 活动id
 * campaign_info 活动细则 (title为活动标题)
 * shop_full_campaign 满减活动(share_amount表示满减活动分摊到当前子订单的优惠金额)
 * total_amount 订单实付金额（不包含运费）
 * is_comment 是否评价 (1:已评价)
 * urge_cnt 催单次数
 * b_type 订单APP渠道，如下所示
 * user_name 买家用户名
 * 3、order_status/final_status子订单状态释义表
 * 状态码 对应子订单状态 订单是否已发货
 * 1 在线支付订单待支付；货到付款订单待确认
 * 2 备货中（只有此状态下，才可发货）
 * 3 已发货
 * 4 已取消：1.用户未支付时取消订单；2.用户超时未支付，系统自动取消订单；3.货到付款订单，用户拒收
 * 5 已完成：1.在线支付订单，商家发货后，用户收货、拒收或者15天无物流更新；2.货到付款订单，用户确认收货
 * 6 退货中-用户申请 是
 * 7 退货中-商家同意退货 是
 * 8 退货中-客服仲裁 是
 * 9 已关闭-退货失败 是
 * 10 退货中-客服同意 是
 * 11 退货中-用户已填物流 是
 * 12 退货成功-商户同意 是
 * 13 退货中-再次客服仲裁 是
 * 14 退货中-客服同意退款 是
 * 15 退货-用户取消 是
 * 16 退款中-用户申请(备货中) 否
 * 17 退款中-商家同意(备货中) 否
 * 21 退款成功-订单退款（备货中，用户申请退款，最终退款成功） 否
 * 22 退款成功-订单退款 (已发货时，用户申请退货，最终退货退款成功) 否
 * 24 退货成功-商户已退款 (特指货到付款订单，已发货时，用户申请退货，最终退货退款成功) 否
 * 25 退款中-用户取消(备货中) 否
 * 26 退款中-商家拒绝（备货中） 否
 * 27 退货中-等待买家处理（已发货，商家拒绝用户退货申请） 是
 * 28 退货失败（已发货，商家拒绝用户退货申请，客服仲裁支持商家） 是
 * 29 退货中-等待买家处理（已发货，用户填写退货物流，商家拒绝） 是
 * 30 退款中-退款申请（已发货，用户申请仅退款） 是
 * 31 退款申请取消（已发货，用户申请仅退款时，取消申请） 是
 * 32 退款中-商家同意（已发货，用户申请仅退款，商家同意申请） 是
 * 33 退款中-商家拒绝（已发货，用户申请仅退款，商家拒绝申请） 是
 * 34 退款中-客服仲裁（已发货，用户申请仅退款，商家拒绝申请，买家申请客服仲裁） 是
 * 35 退款中-客服同意（已发货，用户申请仅退款，商家拒绝申请，客服仲裁支持买家） 是
 * 36 退款中-支持商家（已发货，用户申请仅退款，商家拒绝申请，客服仲裁支持商家） 是
 * 37 已关闭-退款失败（已发货，用户申请仅退款时，退款关闭） 是
 * 38 退款成功-售后退款（特指货到付款订单，已发货，用户申请仅退款时，最终退款成功） 是
 * 39 退款成功-订单退款（已发货，用户申请仅退款时，最终退款成功） 是
 * 4、b_type释义表
 * b_type值 释义
 * 0 站外
 * 1 火山
 * 2 抖音
 * 3 头条
 * 4 西瓜
 * 5 微信
 * 6 闪购
 * 7 头条lite版本
 * 8 懂车帝
 * 9 皮皮虾
 * 11 抖音极速版
 * 12 TikTok
 * 5、c_biz释义表
 * c_biz值 释义
 * 1 鲁班广告
 * 2 联盟
 * 4 商城
 * 8 自主经营
 * 10 线索通支付表单
 * 12 抖音门店
 * 14 抖+
 * 15 穿山甲
 * 6、coupon_info中type释义表
 * type值 释义
 * 1 平台折扣券 (平台承担)
 * 2 平台直减券 (平台承担)
 * 3 平台满减券 (平台承担)
 * 11 品类折扣券 (暂未开放)
 * 12 品类直减券 (暂未开放)
 * 13 品类满减券 (暂未开放)
 * 21 店铺折扣券 (店铺承担)
 * 22 店铺直减券 (店铺承担)
 * 23 店铺满减券 (店铺承担)
 * 31 渠道折扣券 (平台承担)
 * 32 渠道直减券 (平台承担)
 * 33 渠道满减券 (平台承担)
 * 41 单品折扣券 (店铺承担)
 * 42 单品直减券 (店铺承担)
 * 43 单品满减券 (店铺承担)
 * 五、响应示例
 * {
 * "data": {
 * "count": 1,
 * "total": 1,
 * "list": [
 * {
 * "b_type":"1",
 * "buyer_words": "这是买家留言",
 * "cancel_reason": "",
 * "child": [
 * {
 * "b_type":"1",
 * "buyer_words": "",
 * "campaign_id": "123",
 * "campaign_info": [
 * {
 * "campaign_id": "123123", //活动ID
 * "title": "好货123" //活动名称
 * }
 * ],
 * "cancel_reason": "",
 * "code": "",
 * "combo_amount": 10000,
 * "combo_id": 11801,
 * "combo_num": 1,
 * "cos_ratio": "0.00",
 * "coupon_amount": 1000,
 * "coupon_info": [
 * {
 * "id": 3283379324941639700,
 * "name": "满198减20",
 * "description": "",
 * "credit": 2000,
 * "type": 23,
 * "discount": 0,
 * "pay_type": 0
 * }
 * ],
 * "coupon_meta_id": "3283379324941639593",
 * "create_time": "1512553757",
 * "is_comment": "0",
 * "logistics_code": "ZX11111111",
 * "logistics_id": 12,
 * "logistics_time": "0",
 * "order_id": "6496368918926459150",
 * "order_status": 3,
 * "order_type": 1,
 * "out_product_id": 11600,
 * "out_sku_id": 0,
 * "pay_type": 2,
 * "pay_time": "2018-06-01 12:00:00",
 * "pid": "6496679971677798670A",
 * "post_addr": {
 * "city": {
 * "id": "150100",
 * "name": "呼和浩特市"
 * },
 * "detail": "详细地址aaa ",
 * "province": {
 * "id": "150000",
 * "name": "内蒙古自治区"
 * },
 * "town": {
 * "id": "150101",
 * "name": "市辖区"
 * }
 * },
 * "post_amount": 0,
 * "post_code": "10010",
 * "post_receiver": "啦啦",
 * "post_tel": "18610915742",
 * "product_id": "6491181509221810446",
 * "product_name": "泰国陶瓷粉饼粉扑保湿遮瑕修容持久定妆控油防水正品",
 * "product_pic": "https://sf1-ttcdn-tos.pstatp.com/obj/temai/123123",
 * "receipt_time": "0",
 * "seller_words": "这里是卖家留言1",
 * "shop_coupon_amount": 0,
 * "shop_id": 13455,
 * "spec_desc": [
 * {
 * "name": "颜色分类",
 * "value": "正方形（送土豪金勺+杯盖）"
 * }
 * ],
 * "total_amount": 9000,
 * "update_time": 1528082587,
 * "urge_cnt": 0,
 * "user_name": "用户111"
 * },
 * ],
 * "child_num": 2,
 * "cos_ratio": "0.00",
 * "coupon_amount": 2000,
 * "coupon_info": [
 * {
 * "id": 3283379324941639700, //优惠券ID
 * "name": "满198减20", //优惠券名称
 * "description": "", //优惠券描述
 * "credit": 2000, //优惠券面额
 * "type": 23, //优惠券类型
 * "discount": 0 //优惠券折扣
 * }
 * ],
 * "create_time": "1512626179",
 * "exp_ship_time": "1563606873",
 * "is_comment": "0",
 * "logistics_code": "ZX11111111",
 * "logistics_id": 12,
 * "logistics_time": "1512634239",
 * "order_id": "6496679971677798670A",
 * "order_status": 3,
 * "order_total_amount": 18000,
 * "pay_type": 2,
 * "pay_time": "2018-06-01 12:00:00",
 * "post_addr": {
 * "city": {
 * "id": "150100",
 * "name": "呼和浩特市"
 * },
 * "detail": "x详细地址aaa ",
 * "province": {
 * "id": "150000",
 * "name": "内蒙古自治区"
 * },
 * "town": {
 * "id": "150101",
 * "name": "市辖区"
 * }
 * },
 * "post_amount": 0,
 * "post_code": "10010",
 * "post_receiver": "啦啦",
 * "post_tel": "19900000001",
 * "receipt_time": "0",
 * "seller_words": "这里是卖家留言",
 * "shop_coupon_amount": 0,
 * "shop_id": 13455,
 * "update_time": 1528085816,
 * "urge_cnt": 0,
 * "user_name": "用户111"
 * }
 * ]
 * },
 * "err_no": 0,
 * "message": "success"
 * }
 */
class ListRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "order/list";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// order_status String 否 3 子订单状态
	// start_time String 是 2018/06/03 00:00:00 开始时间
	// end_time String 是 2018/06/03 00:01:00 结束时间
	// order_by String 是 create_time 1、默认按订单创建时间搜索2、值为“create_time”：按订单创建时间；值为“update_time”：按订单更新时间
	// is_desc String 否 1 订单排序方式：设置了此字段即为desc(最近的在前)默认为asc（最近的在后）
	// page String 否 0 页数（默认为0，第一页从0开始）
	// size String 否 100 每页订单数（默认为10，最大100）
	public $order_status = NULL;
	public $start_time = NULL;
	public $end_time = NULL;
	public $order_by = NULL;
	public $is_desc = NULL;
	public $page = NULL;
	public $size = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->order_status)) {
			$params['order_status'] = $this->order_status;
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
