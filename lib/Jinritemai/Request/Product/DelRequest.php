<?php

namespace Jinritemai\Request\Product;

/**
 * 删除商品
 * 删除商品
 * https://op.jinritemai.com/docs/api-docs/14/61
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * product_id String 是 3539925204033339668 商品id
 * 请求示例
 * https://openapi-fxg.jinritemai.com/product/del?app_key=your_app_key_here&method=product.del&access_token=your_accesstoken_here&param_json={"product_id":"product_id_here"}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_app_sign_here
 * 响应示例
 * {
 * "data": false,
 * "err_no": 0,
 * "message": "success"
 * }
 */
class DelRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "product/del";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// product_id String 是 3539925204033339668 商品id
	public $product_id = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->product_id)) {
			$params['product_id'] = $this->product_id;
		}
		$this->param_json = $params;
	}
}
