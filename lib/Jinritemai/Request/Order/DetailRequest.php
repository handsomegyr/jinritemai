<?php

namespace Jinritemai\Request\Order;

/**
 * 获取订单详情
 * 根据订单ID，获取单个订单的详情信息
 * https://op.jinritemai.com/docs/api-docs/15/68
 *
 * 二、业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * order_id String 是 6496679971677798670A 父订单id，由orderList接口返回
 * 三、请求示例
 * https://openapi-fxg.jinritemai.com/order/detail?app_key=your_app_key_here&access_token=your_accesstoken_here&method=order.detail&param_json={"order_id":"order_id_here"}&timestamp=2018-06-19%2016:06:59&v=1&sign=your_sign_here
 * 四、响应参数
 * 见文档
 *
 * 五、响应示例
 * {
 * "data": {
 * "count": 1,
 * "list": [
 * {
 * "buyer_words": "这是买家留言",
 * "c_type": "5",
 * "cancel_reason": "",
 * "child": [
 * {
 * "alliance_info":{
 * "author_account":"不要随便推荐", // 作者账号(抖音/火山作者)
 * "commission_rate:": 1000, // 实际值的10000倍,譬如佣金率是10%, 该值为0.1*10000=1000
 * "short_id":"95888111", // 火山/抖音号id
 * "real_commission": 1000, // 实际佣金,单位是分
 * },
 * "author_id": 6752386, // 带货达人ID。若为0，则表示达人ID为空
 * "buyer_words": "",
 * "c_type": "5",
 * "campaign_id": "123",
 * "campaign_info": [
 * {
 * "campaign_id": 123123,
 * "title": "【好货】123",
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
 * "pay_type": 1,
 * "pid": "6496679971677798670",
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
 * {
 * "author_id": 0, // 带货达人ID。若为0，则表示达人ID为空
 * "buyer_words": "",
 * "c_type": "5",
 * "campaign_id": "123",
 * "campaign_info": [
 * {
 * "campaign_id": 123123,
 * "title": "【好货】123",
 * }
 * ],
 * "cancel_reason": "",
 * "code": "",
 * "combo_amount": 10000,
 * "combo_id": 6705,
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
 * "create_time": "1512552580",
 * "exp_ship_time": 1563606873,
 * "is_comment": "0",
 * "logistics_code": "ZX11111111",
 * "logistics_id": 12,
 * "logistics_time": "0",
 * "order_id": "6496363866786627853",
 * "order_status": 3,
 * "order_type": 1,
 * "out_product_id": 3873,
 * "out_sku_id": 0,
 * "pay_type": 0,
 * "pid": "6496679971677798670",
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
 * "product_id": "6485556320966541582",
 * "product_name": "雪花秀撕拉面膜50ml 深层清洁温和不刺激",
 * "product_pic": "https://sf1-ttcdn-tos.pstatp.com/obj/temai/123123",
 * "receipt_time": "0",
 * "seller_words": "这里是卖家留言2",
 * "shop_coupon_amount": 0,
 * "shop_id": 13455,
 * "spec_desc": [
 * {
 * "name": "颜色分类",
 * "value": "丁香灰"
 * }
 * ],
 * "total_amount": 9000,
 * "update_time": 1528082593,
 * "urge_cnt": 0,
 * "user_name": "用户111"
 * }
 * ],
 * "cos_ratio": "0.00",
 * "coupon_amount": 2000,
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
 * "create_time": "1512626179",
 * "exp_ship_time": 1563606873,
 * "is_comment": "0",
 * "logistics_code": "ZX11111111",
 * "logistics_id": 12,
 * "logistics_time": "1512634239",
 * "order_id": "6496679971677798670A",
 * "order_status": 3,
 * "order_total_amount": 18000,
 * "pay_type": 0,
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
 * "user_name": "",
 * }
 * ],
 * "total": 1
 * },
 * "err_no": 0,
 * "message": "success"
 * }
 */
class DetailRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "order/detail";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// order_id String 是 6496679971677798670A 父订单id，由orderList接口返回
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
