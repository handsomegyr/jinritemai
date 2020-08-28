<?php

namespace Jinritemai\Request\Order;

/**
 * 获取服务请求列表
 * 获取客服向店铺发起的服务请求列表
 * https://op.jinritemai.com/docs/api-docs/15/74
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * start_time String 是 1566382338 开始时间时间戳
 * end_time String 是 1566382338 结束时间时间戳
 * status String 否 0 1、不传代表获取全部服务请求2、操作状态：0待处理，1已处理
 * supply String 是 0 是否获取分销商服务申请，0获取本店铺的服务申请，1获取分销商的服务申请
 * page String 否 0 页数（默认值为0，第一页从0开始）
 * size String 否 100 每页订单数（默认为10，最大100）
 * 请求示例
 * https://openapi-fxg.jinritemai.com/order/serviceList?app_key=your_app_key_here&access_token=your_accesstoken_here&method=order.serviceList&param_json={"end_time":"1598422297","start_time":"1566799897","status":"0","supply":"0","page":"0","size":"10"}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "data": {
 * "total": 2,
 * "list": [
 * {
 * "id": 793,
 * "order_id": 6429484955671200001,
 * "reply": "",
 * "detail": "客服要问你话了测试",
 * "create_time": "2017-06-09 12:05:21",
 * "operate_status": 0,
 * "operate_status_desc": "未处理",
 * "operator_id": 0,
 * "reply_time": "",
 * "shop_id": 1366,
 * "supply_id": 0,
 * "reply_op_id": 1366
 * },
 * {
 * "id": 804,
 * "order_id": 6429540370928894210,
 * "reply": "",
 * "detail": "客服要问你话了测试",
 * "create_time": "2017-06-09 15:40:24",
 * "operate_status": 0,
 * "operate_status_desc": "未处理",
 * "operator_id": 0,
 * "reply_time": "",
 * "shop_id": 1366,
 * "supply_id": 0,
 * "reply_op_id": 1366
 * }]
 * },
 * "err_no": 0,
 * "message": "success"
 * }
 */
class ServiceListRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "order/serviceList";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// start_time String 是 1566382338 开始时间时间戳
	// end_time String 是 1566382338 结束时间时间戳
	// status String 否 0 1、不传代表获取全部服务请求2、操作状态：0待处理，1已处理
	// supply String 是 0 是否获取分销商服务申请，0获取本店铺的服务申请，1获取分销商的服务申请
	// page String 否 0 页数（默认值为0，第一页从0开始）
	// size String 否 100 每页订单数（默认为10，最大100）
	public $start_time = NULL;
	public $end_time = NULL;
	public $status = NULL;
	public $supply = NULL;
	public $page = NULL;
	public $size = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->start_time)) {
			$params['start_time'] = $this->start_time;
		}
		if ($this->isNotNull($this->end_time)) {
			$params['end_time'] = $this->end_time;
		}
		if ($this->isNotNull($this->status)) {
			$params['status'] = $this->status;
		}
		if ($this->isNotNull($this->supply)) {
			$params['supply'] = $this->supply;
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
