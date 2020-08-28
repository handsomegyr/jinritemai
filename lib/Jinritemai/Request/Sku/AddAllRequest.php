<?php

namespace Jinritemai\Request\Sku;

/**
 * 批量添加sku
 * 批量添加商品sku（每次接口调用最多添加100个）
 * https://op.jinritemai.com/docs/api-docs/14/83
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * product_id String 是 3539925204033339668 商品id
 * out_sku_id String 是 121|357 业务方自己的sku_id，唯一，数量与spec_id的一致需为数字字符串，max = int64
 * spec_id String 是 121|357 规格id，依赖/spec/list接口的返回数量与spec_detail_ids的一致值必须要能与spec_detail_ids的每一项对应得起来
 * spec_detail_ids String 是 100041|150041|160041^100041|150041|160042 子规格id，最多3级,如 100041|150041|160041 （ 女款|白色|XL）子规格ID的顺序必须严格按照spec_id详情里的顺序，比如颜色在前、尺寸在后
 * stock_num String 是 1000|5000 库存 (必须大于0)
 * price String 是 11000|15000 售价 (单位 分)
 * settlement_price String 是 9900|9900 结算价格 (单位 分)
 * code String 否 A0001|A0002 商品编码，唯一，数量与spec_id的一致
 * 请求示例
 * http://openapi-fxg.jinritemai.com/sku/addAll?app_key=3298632765993520917&method=sku.addAll&access_token=your_accesstoken_here&param_json={"code":"36691|36692","out_product_id":"100103496148","out_sku_id":"366|162","price":"3511|3500","settlement_price":"4800|4800","spec_detail_ids":"3157488|3157490^3157488|3157491","spec_id":"1516313|1516313","stock_num":"10|2"}&timestamp=2018-06-27%2010:52:45&v=2&sign=92f0fe9781fab1b9858cd2c86ce7697d
 * 响应示例
 * {
 * "data": {
 * "2": 117738453 // 前者为out_sku_id，后者为sku id
 * },
 * "err_no": 0,
 * "message": "success"
 * }
 */
class AddAllRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "sku/addAll";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// product_id String 是 3539925204033339668 商品id
	// out_sku_id String 是 121|357 业务方自己的sku_id，唯一，数量与spec_id的一致需为数字字符串，max = int64
	// spec_id String 是 121|357 规格id，依赖/spec/list接口的返回数量与spec_detail_ids的一致值必须要能与spec_detail_ids的每一项对应得起来
	// spec_detail_ids String 是 100041|150041|160041^100041|150041|160042 子规格id，最多3级,如 100041|150041|160041 （ 女款|白色|XL）子规格ID的顺序必须严格按照spec_id详情里的顺序，比如颜色在前、尺寸在后
	// stock_num String 是 1000|5000 库存 (必须大于0)
	// price String 是 11000|15000 售价 (单位 分)
	// settlement_price String 是 9900|9900 结算价格 (单位 分)
	// code String 否 A0001|A0002 商品编码，唯一，数量与spec_id的一致
	public $product_id = NULL;
	public $out_sku_id = NULL;
	public $spec_id = NULL;
	public $spec_detail_ids = NULL;
	public $stock_num = NULL;
	public $price = NULL;
	public $settlement_price = NULL;
	public $code = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->product_id)) {
			$params['product_id'] = $this->product_id;
		}
		if ($this->isNotNull($this->out_sku_id)) {
			$params['out_sku_id'] = $this->out_sku_id;
		}
		if ($this->isNotNull($this->spec_id)) {
			$params['spec_id'] = $this->spec_id;
		}
		if ($this->isNotNull($this->spec_detail_ids)) {
			$params['spec_detail_ids'] = $this->spec_detail_ids;
		}
		if ($this->isNotNull($this->stock_num)) {
			$params['stock_num'] = $this->stock_num;
		}
		if ($this->isNotNull($this->price)) {
			$params['price'] = $this->price;
		}
		if ($this->isNotNull($this->settlement_price)) {
			$params['settlement_price'] = $this->settlement_price;
		}
		if ($this->isNotNull($this->code)) {
			$params['code'] = $this->code;
		}

		$this->param_json = $params;
	}
}
