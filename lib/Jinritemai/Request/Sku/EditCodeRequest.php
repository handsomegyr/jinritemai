<?php

namespace Jinritemai\Request\Sku;

/**
 * 修改sku编码
 * https://op.jinritemai.com/docs/api-docs/14/86
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * product_id String 是 3539925204033339668 商品id
 * sku_id String 是 123423 skuid
 * code String 是 abc 编码
 * 请求示例
 * http://openapi-fxg.jinritemai.com/sku/editCode?app_key=your_app_key_here&method=sku.editCode&access_token=your_accesstoken_here&param_json={“product_id":"123456","sku_id":"123","code":"abc"}&timestamp=2018-04-27 11:55:56&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "err_no": 0,
 * "message": "success"
 * }
 */
class EditCodeRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "sku/editCode";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// product_id String 是 3539925204033339668 商品id
	// sku_id String 是 123423 skuid
	// code String 是 abc 编码
	public $product_id = NULL;
	public $sku_id = NULL;
	public $code = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->product_id)) {
			$params['product_id'] = $this->product_id;
		}
		if ($this->isNotNull($this->sku_id)) {
			$params['sku_id'] = $this->sku_id;
		}
		if ($this->isNotNull($this->code)) {
			$params['code'] = $this->code;
		}
		$this->param_json = $params;
	}
}
