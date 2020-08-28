<?php

namespace Jinritemai\Request\Sku;

/**
 * 添加SKU
 * 单个规格可设置的规格值最多是20个
 * https://op.jinritemai.com/docs/api-docs/14/81
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * product_id String 是 3539925204033339668 商品id
 * out_sku_id String 是 123 业务方自己的sku_id，唯一需为数字字符串，max = int64
 * spec_id String 是 121 规格id，依赖/spec/list接口的返回
 * spec_detail_ids String 是 100041|150041|160041 子规格id,最多3级,如 100041|150041|160041 （ 女款|白色|XL）
 * stock_num String 是 1000 库存 (必须大于0)
 * price String 是 12100 售价 (单位 分)
 * settlement_price String 是 9900 结算价格 (单位 分)
 * code String 否 A0001 商品编码
 * 请求示例
 * http://openapi-fxg.jinritemai.com/sku/add?app_key=your_app_key_here&method=sku.add&access_token=your_accesstoken_here&param_json={"code":"self_code_123","out_sku_id":"9999","price":"19800","product_id":"product_id_here","settlement_price":"16800","spec_detail_ids":"4582|4586","spec_id":"1072","stock_num":"100"}&timestamp=2018-06-19 16:06:59&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "data": 117738444, // sku id
 * "err_no": 0,
 * "message": "success"
 * }
 */
class AddRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "sku/add";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// product_id String 是 3539925204033339668 商品id
	// out_sku_id String 是 123 业务方自己的sku_id，唯一需为数字字符串，max = int64
	// spec_id String 是 121 规格id，依赖/spec/list接口的返回
	// spec_detail_ids String 是 100041|150041|160041 子规格id,最多3级,如 100041|150041|160041 （ 女款|白色|XL）
	// stock_num String 是 1000 库存 (必须大于0)
	// price String 是 12100 售价 (单位 分)
	// settlement_price String 是 9900 结算价格 (单位 分)
	// code String 否 A0001 商品编码
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
