<?php

namespace Jinritemai\Request\Sku;

/**
 * 获取商品sku详情
 * 根据sku id获取商品sku详情
 * https://op.jinritemai.com/docs/api-docs/14/104
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * sku_id String 是 1445164 sku id
 * 请求示例
 * http://openapi-fxg.jinritemai.com/sku/detail?app_key=your_app_key_here&method=sku.detail&access_token=your_accesstoken_here&param_json={"product_id":"your_product_id_here"}&timestamp=2018-06-19 16:06:59&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "data": {
 * "id": 1445164,
 * "out_sku_id": 0,
 * "product_id": 3306028663170020210,
 * "product_id_str": "3306028663170020210",
 * "spec_detail_id1": 3153838,
 * "spec_detail_id2": 3153844,
 * "spec_detail_id3": 0,
 * "spec_detail_name1": "37/38适合35-37",
 * "spec_detail_name2": "红格子",
 * "spec_detail_name3": "",
 * "stock_num": 0, //sku 库存数量
 * "price": 1280, // sku售价
 * "spec_id": 1515634, //规格ID
 * "create_time": 0, //sku创建时间
 * "code": "", //sku商家编码
 * "sku_type": 1, //1：默认库存类型
 * },
 * "err_no": 0,
 * "message": "success"
 * }
 */
class DetailRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "sku/detail";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// sku_id String 是 1445164 sku id
	public $sku_id = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->sku_id)) {
			$params['sku_id'] = $this->sku_id;
		}
		$this->param_json = $params;
	}
}
