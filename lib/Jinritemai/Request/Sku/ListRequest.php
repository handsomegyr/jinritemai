<?php

namespace Jinritemai\Request\Sku;

/**
 * 获取商品sku列表
 * 根据商品id获取商品的sku列表
 * https://op.jinritemai.com/docs/api-docs/14/82
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * product_id String 是 3539925204033339668 商品id
 * 请求示例
 * http://openapi-fxg.jinritemai.com/sku/list?app_key=your_app_key_here&method=sku.list&access_token=your_accesstoken_here&param_json={"product_id":"your_product_id_here"}&timestamp=2018-06-19 16:06:59&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "data": [
 * {
 * "id": 12765412, // 即为sku_id
 * "open_user_id": 353992520403334****, // 即为app_key
 * "out_sku_id": 123,
 * "product_id": 3276192774554309600,
 * "spec_detail_id1": 32, //第一级子规格ID（最多三级）
 * "spec_detail_id2": 36, //第二级子规格ID
 * "spec_detail_id3": 0, //第三级子规格ID（最多三级）
 * "spec_detail_name1": "21#白皙色", //第一级子规格名称，比如：黑色
 * "spec_detail_name2": "15g+15g", //第二级子规格名称，比如：大
 * "spec_detail_name3": "", //第三级子规格名称，比如：香
 * "stock_num": 300,
 * "price": 0, //售价
 * "spec_id": 8, //规格ID
 * "code": "A0001"
 * }
 * ],
 * "err_no": 0,
 * "message": "success"
 * }
 */
class ListRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "sku/list";

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
