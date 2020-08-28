<?php

namespace Jinritemai\Request\Sku;

/**
 * 编辑sku价格
 * https://op.jinritemai.com/docs/api-docs/14/84
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * product_id String 是 3539925204033339668 商品id
 * sku_id String 是 123423 skuid
 * price String 是 12900 售价 (单位 分)
 * 请求示例
 * http://openapi-fxg.jinritemai.com/sku/editPrice?app_key=your_app_key_here&method=sku.editPrice&access_token=your_accesstoken_here&param_json={"product_id":"123456","sku_id":"123","price":"2100"}&timestamp=2018-04-27%2011:55:56&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "data": true,
 * "err_no": 0,
 * "message": "success"
 * }
 */
class EditPriceRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "sku/editPrice";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// product_id String 是 3539925204033339668 商品id
	// sku_id String 是 123423 skuid
	// price String 是 12900 售价 (单位 分)	
	public $product_id = NULL;
	public $sku_id = NULL;
	public $price = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->product_id)) {
			$params['product_id'] = $this->product_id;
		}
		if ($this->isNotNull($this->sku_id)) {
			$params['sku_id'] = $this->sku_id;
		}
		if ($this->isNotNull($this->price)) {
			$params['price'] = $this->price;
		}
		$this->param_json = $params;
	}
}
