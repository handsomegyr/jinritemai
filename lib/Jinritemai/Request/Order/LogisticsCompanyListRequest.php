<?php

namespace Jinritemai\Request\Order;

/**
 * 获取快递公司列表
 * 获取平台支持的快递公司列表
 * https://op.jinritemai.com/docs/api-docs/16/76
 *
 * 业务参数
 * 无
 *
 * 请求示例
 * https://openapi-fxg.jinritemai.com/order/logisticsCompanyList?app_key=your_app_key_here&access_token=your_accesstoken_here&method=order.logisticsCompanyList&param_json={}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应参数
 * 参数名称 参数描述
 * id 快递公司ID
 * name 快递公司名称
 * 响应示例
 * {
 * "data": [
 * {
 * "id": 7,
 * "name": "圆通快递"
 * },
 * {
 * "id": 8,
 * "name": "申通快递"
 * },
 * {
 * "id": 9,
 * "name": "韵达快递"
 * },
 * {
 * "id": 10,
 * "name": "佳怡物流"
 * },
 * {
 * "id": 11,
 * "name": "优速物流"
 * },
 * {
 * "id": 12,
 * "name": "顺丰快递"
 * },
 * {
 * "id": 13,
 * "name": "德邦快递"
 * },
 * {
 * "id": 14,
 * "name": "天天快递"
 * },
 * {
 * "id": 15,
 * "name": "中通速递"
 * },
 * {
 * "id": 16,
 * "name": "全峰快递"
 * },
 * {
 * "id": 17,
 * "name": "EMS"
 * },
 * {
 * "id": 18,
 * "name": "微特派"
 * },
 * {
 * "id": 19,
 * "name": "邮政国内小包"
 * },
 * {
 * "id": 20,
 * "name": "百世汇通"
 * },
 * {
 * "id": 21,
 * "name": "宅急送"
 * },
 * {
 * "id": 22,
 * "name": "如风达"
 * },
 * {
 * "id": 23,
 * "name": "增益速递"
 * },
 * {
 * "id": 24,
 * "name": "电子券"
 * },
 * {
 * "id": 25,
 * "name": "国通快递"
 * },
 * {
 * "id": 26,
 * "name": "快捷快递"
 * },
 * {
 * "id": 27,
 * "name": "E速宝"
 * },
 * {
 * "id": 28,
 * "name": "云购商品"
 * },
 * {
 * "id": 30,
 * "name": "京东快递"
 * },
 * {
 * "id": 31,
 * "name": "万象物流"
 * },
 * {
 * "id": 32,
 * "name": "安能物流"
 * },
 * {
 * "id": 33,
 * "name": "佳运美物流"
 * },
 * {
 * "id": 34,
 * "name": "联邦快递"
 * },
 * {
 * "id": 35,
 * "name": "远成快递"
 * },
 * {
 * "id": 36,
 * "name": "信丰物流"
 * },
 * {
 * "id": 37,
 * "name": "黄马甲"
 * },
 * {
 * "id": 202,
 * "name": "苏宁物流"
 * },
 * {
 * "id": 1018,
 * "name": "D速快递"
 * },
 * {
 * "id": 1019,
 * "name": "东风快递"
 * },
 * {
 * "id": 1021,
 * "name": "极兔速递"
 * },
 * {
 * "id": 1022,
 * "name": "众邮快递"
 * },
 * {
 * "id": 1023,
 * "name": "中粮鲜到家物流"
 * }
 * ],
 * "err_no": 0,
 * "message": "success"
 * }
 */
class LogisticsCompanyListRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "order/logisticsCompanyList";
}
