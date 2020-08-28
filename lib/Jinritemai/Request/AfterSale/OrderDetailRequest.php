<?php

namespace Jinritemai\Request\AfterSale;

/**
 * 获取单个订单售后退货的详情
 * 根据子订单ID，获取售后退货的详情
 * https://op.jinritemai.com/docs/api-docs/17/89
 *
 * 二、业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * order_id String 是 6496679971677798670 订单ID必须为子订单号
 * 三、请求示例
 * https://openapi-fxg.jinritemai.com/afterSale/orderDetail?app_key=your_app_key_here&access_token=your_accesstoken_here&method=afterSale.orderDetail&param_json={"order_id":"123123123123"}&timestamp=2018-06-19%2016:06:59&v=1&sign=your_sign_here
 * 四、响应示例
 * {
 * "data": {
 * "code": 0,
 * "msg": "调用成功",
 * "data": {
 * "final_status": 23, // 售后订单的订单状态, 即为实际的order_status
 * "pay_type": 0, // 付款方式，0：货到付款，1：微信，2：支付宝
 * "supply_type": 0, // 0与1：非供销订单，2：供销订单
 * "supply_id": 0, // 供销商id
 * "process_bar": {
 * "apply_time": "2018-10-15 12:00:00", // 申请售后时间
 * "stage": 0, // 售后阶段 ，-1:未知、1:待审核，2：待收货，3:未解决，4:已完成
 * "apply_info": { // 售后申请信息
 * "product_id": "3271540571850000000", // 商品id
 * "main_img": "", // 规格主图
 * "product_name": "面膜", // 商品名称
 * "specs": [ // 规格信息
 * "尺码:155/76A/XS",
 * "颜色分类:条纹H0E"
 * ],
 * "except": "", // 客户期望， 目前只有 "退货"
 * "question_desc": "", // 问题描述
 * "order_id": "32743207471400000000", // 订单id
 * "order_create_time": "2018-10-14 14:33:34", // 订单创建时间
 * "combo_amount": 29900, // 售价 (单位:分)
 * "total_amount": 29900, // 买家申请退款金额 (单位:分)
 * "buyer_name": "买家1", // 收件人姓名
 * "buyer_tel": "13500010002", // 收件人电话
 * "user_imgs": null
 * }
 * },
 * "apply_info": { // 售后申请信息
 * "product_id": "3271540571850000000", // 商品id
 * "main_img": "", // 规格主图
 * "product_name": "面膜", // 商品名称
 * "specs": [ // 规格信息
 * "尺码:155/76A/XS",
 * "颜色分类:条纹H0E"
 * ],
 * "except": "", // 客户期望， 目前只有 "退货"
 * "question_desc": "", // 问题描述
 * "order_id": "32743207471400000000", // 订单id
 * "order_create_time": "2018-10-14 14:33:34", // 订单创建时间
 * "combo_amount": 29900, // 售价 (单位:分)
 * "total_amount": 29900, // 买家申请退款金额 (单位:分)
 * "buyer_name": "买家1", // 收件人姓名
 * "buyer_tel": "13500010002", // 收件人电话
 * "user_imgs": null
 * },
 * "remarks": [ // 售后订单备注
 * {
 * "timestamp": "2018-10-09 15:37:06", // 备注添加时间
 * "remark": "123" // 备注内容
 * },
 * {
 * "timestamp": "2018-10-09 16:46:28",
 * "remark": "哈哈哈"
 * }
 * ],
 * "logs": { // 售后订单日志
 * "action_logs": [
 * { // 售后订单
 * "operator": "商家", // 操作人
 * "desc": "", // 操作内容
 * "create_time": "2018-10-11 14:59:36", // 操作时间
 * "action": "商家确认收到退货" // 操作类型
 * },
 * {
 * "operator": "50660347288",
 * "desc": "退货理由：重新申请退货测试",
 * "create_time": "2018-06-22 17:30:41",
 * "action": "申请退货"
 * }
 * ],
 * "audit_logs": [ // 审核留言
 * {
 * "timestamp": "2018-10-11 14:59:36", //时间
 * "detail": "1", //详情
 * "operator": "放心购" //操作人
 * },
 * {
 * "timestamp": "2018-10-11 20:55:39",
 * "detail": "1",
 * "operator": "放心购"
 * }
 * ],
 * "logistics_logs": [ // 买家回寄商品的运单信息
 * {
 * "time": "2017-03-08 15:04:19", // 时间
 * "ftime": "2017-03-08 15:04:19", //
 * "context": "[北京海淀区上地公司]快件已被 已签收 签收" // 详情
 * },
 * {
 * "time": "2017-03-08 08:56:13",
 * "ftime": "2017-03-08 08:56:13",
 * "context": "[北京海淀区上地公司]进行派件扫描；派送业务员：xxx；联系电话：18700010002"
 * },
 * {
 * "time": "2017-03-07 15:30:53",
 * "ftime": "2017-03-07 15:30:53",
 * "context": "[北京分拨中心]从站点发出，本次转运目的地：北京海淀区上地公司"
 * },
 * {
 * "time": "2017-03-07 14:21:16",
 * "ftime": "2017-03-07 14:21:16",
 * "context": "[北京分拨中心]在分拨中心进行卸车扫描"
 * },
 * {
 * "time": "2017-03-06 12:05:05",
 * "ftime": "2017-03-06 12:05:05",
 * "context": "[广东中山公司]进行揽件扫描"
 * },
 * {
 * "time": "2017-03-06 02:00:49",
 * "ftime": "2017-03-06 02:00:49",
 * "context": "[广东中山公司]进行装车扫描，即将发往：北京分拨中心"
 * },
 * {
 * "time": "2017-03-06 01:38:03",
 * "ftime": "2017-03-06 01:38:03",
 * "context": "[广东中山公司]进行下级地点扫描，将发往：北京网点包"
 * }
 * ],
 * "refund_logs": [ // 赔付信息
 * {
 * "timestamp": "2018-09-25 18:33:55", // 赔付时间
 * "refund_id": "3302554189246000001", // 赔付业务号
 * "relative_order_id": "3274320747140620001", // 赔付所关联的订单号
 * "refund_type": "运费补偿", // 赔付类型
 * "refund_amount": 1200, // 赔付金额（分）
 * "operator": "14802" // 操作人
 * }
 * ]
 * },
 * "stage_info": {
 * "logistics_info": {
 * "logistics_code": "980980",
 * "logistics_name": "圆通快递"
 * },
 * "unpack_info": { // 拆包信息
 * "id": "197", // 商家售后拆包记录id
 * "order_id": "3274320747140620001", // 订单id
 * "aftersale_id": "3274322271854020001", // 售后业务id
 * "shop_id": "14802", // 拆包商家id
 * "status_package": 1, // 产品包装 0-未填写 1-无 2-有，但非新 3-新
 * "status_package_desc": "无", // 产品包装 字符串
 * "status_function": 1, // 产品功能 0-未填写 1-完好 2-损坏 3-待检查
 * "status_function_desc": "完好", // 产品功能 字符串
 * "status_facade": 1, // 产品外观 0-未填写 1-新, 2-破损
 * "status_facade_desc": "新", // 产品外观 字符串
 * "create_time": "2018-10-11 14:59:36" // 创建时间
 * },
 * "return_receiver_name": "测试", // 收货人
 * "return_receiver_tel": "", // 收货人电话
 * "return_receive_address": "" // 收货人地址
 * }
 * }
 * },
 * "err_no": 0,
 * "message": "success"
 * }
 */
class OrderDetailRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "afterSale/orderDetail";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// order_id String 是 6496679971677798670 订单ID必须为子订单号
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
