<?php

namespace Jinritemai\Request\Sku;

/**
 * 修改sku库存
 * 注：同步库存时请注意sku对应商品的状态status和check_status, 下架、删除、禁封等状态的商品不予同步sku库存
 * https://op.jinritemai.com/docs/api-docs/14/85
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * product_id String 是 3539925204033339668 商品id
 * sku_id String 是 123423 skuid
 * stock_num String 是 100 库存 (可以为0)
 * 请求示例
 * http://openapi-fxg.jinritemai.com/sku/syncStock?app_key=your_app_key_here&method=sku.syncStock&access_token=your_accesstoken_here&param_json={“product_id":"123456","sku_id":"123","stock_num":"300"}&timestamp=2018-04-27%2011:55:56&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "data": true,
 * "err_no": 0,
 * "message": "success"
 * }
 */
class SyncStockRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "sku/syncStock";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// product_id String 是 3539925204033339668 商品id
	// sku_id String 是 123423 skuid
	// stock_num String 是 100 库存 (可以为0)
	public $product_id = NULL;
	public $sku_id = NULL;
	public $stock_num = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->product_id)) {
			$params['product_id'] = $this->product_id;
		}
		if ($this->isNotNull($this->sku_id)) {
			$params['sku_id'] = $this->sku_id;
		}
		if ($this->isNotNull($this->stock_num)) {
			$params['stock_num'] = $this->stock_num;
		}
		$this->param_json = $params;
	}
}
