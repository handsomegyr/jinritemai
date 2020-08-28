<?php

namespace Jinritemai\Request\Product;

/**
 * 获取商品列表
 * https://op.jinritemai.com/docs/api-docs/14/57
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * page String 是 0 第几页（第一页为0）
 * size String 是 10 每页返回条数
 * status String 否 0 指定状态返回商品列表：0上架 1下架
 * check_status String 否 3 指定审核状态返回商品列表：1未提审 2审核中 3审核通过 4审核驳回 5封禁
 * 请求示例
 * https://openapi-fxg.jinritemai.com/product/list?app_key=your_app_key_here&method=product.list&access_token=your_accesstoken_here&param_json={"page":"0","size":"20"}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "data": {
 * "all": 351, // 商品总数
 * "all_pages": 176, // 已当前size所得的分页数
 * "count": 2, // 当前条件data返回结果数量
 * "current_page": 0, // 当前页
 * "data": [
 * {
 * "product_id": 3276187891830787600,
 * "open_user_id": 353992520403334****,
 * "name": "气质时尚女装碎11111",
 * "description": "<img src='' style='width:100%;'><img src='' style='width:100%;'><img src='' style='width:100%;'>",
 * "img": "",
 * "market_price": 29800,
 * "discount_price": 26800,
 * "settlement_price": 0,
 * "status": 0,
 * "spec_id": 1,
 * "check_status": 2,
 * "mobile": "13122223333",
 * "first_cid": 2,
 * "second_cid": 123,
 * "third_cid": 1234,
 * "pay_type": 2,
 * "recommend_remark": "remark...",
 * "is_create": 0,
 * "create_time": "2018-05-06 16:04:31"
 * "update_time": "2018-05-06 16:04:31"
 * },
 * {
 * "product_id": 3276186702124857000,
 * "open_user_id": 353992520403334****,
 * "name": "气质时尚女装碎花修身显瘦裙子",
 * "description": "<img src='' style='width:100%;'><img src='' style='width:100%;'><img src='' style='width:100%;'>",
 * "img": "",
 * "market_price": 29800,
 * "discount_price": 26800,
 * "settlement_price": 0,
 * "status": 0,
 * "spec_id": 1,
 * "check_status": 2,
 * "mobile": "13122223333",
 * "first_cid": 2,
 * "second_cid": 123,
 * "third_cid": 1234,
 * "pay_type": 2,
 * "recommend_remark": "remark...",
 * "is_create": 0,
 * "create_time": "2018-05-06 15:55:18"
 * "update_time": "2018-05-06 16:04:31"
 * }
 * ],
 * "page_size": 2 //每页条数
 * },
 * "err_no": 0,
 * "message": "success"
 * }
 */
class ListRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "product/list";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// page String 是 0 第几页（第一页为0）
	// size String 是 10 每页返回条数
	// status String 否 0 指定状态返回商品列表：0上架 1下架
	// check_status String 否 3 指定审核状态返回商品列表：1未提审 2审核中 3审核通过 4审核驳回 5封禁
	public $page = NULL;
	public $size = NULL;
	public $status = NULL;
	public $check_status = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->page)) {
			$params['page'] = $this->page;
		}
		if ($this->isNotNull($this->size)) {
			$params['size'] = $this->size;
		}
		if ($this->isNotNull($this->status)) {
			$params['status'] = $this->status;
		}
		if ($this->isNotNull($this->check_status)) {
			$params['check_status'] = $this->check_status;
		}
		$this->param_json = $params;
	}
}
