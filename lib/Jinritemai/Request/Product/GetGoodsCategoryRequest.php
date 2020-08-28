<?php

namespace Jinritemai\Request\Product;

/**
 * 获取商品分类列表
 * 根据父分类id获取子分类
 * https://op.jinritemai.com/docs/api-docs/14/58
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * cid String 是 1 父分类id,根据父id可以获取子分类，一级分类cid=0
 * 请求示例
 * https://openapi-fxg.jinritemai.com/product/getGoodsCategory?app_key=your_app_key_here&method=product.getGoodsCategory&access_token=your_accesstoken_here&param_json={"cid":"0"}&timestamp=2018-06-19 16:06:59&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "data": [
 * {
 * "id": 1,
 * "name": "手机类"
 * },
 * {
 * "id": 2,
 * "name": "数码"
 * },
 * {
 * "id": 3,
 * "name": "电脑、办公"
 * },
 * {
 * "id": 1307,
 * "name": "其它"
 * }
 * ],
 * "err_no": 0,
 * "message": "success"
 * }
 */
class GetGoodsCategoryRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "product/getGoodsCategory";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// cid String 是 1 父分类id,根据父id可以获取子分类，一级分类cid=0
	public $cid = NULL;
	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->cid)) {
			$params['cid'] = $this->cid;
		}
		$this->param_json = $params;
	}
}
