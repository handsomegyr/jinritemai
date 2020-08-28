<?php

namespace Jinritemai\Request\Product;

/**
 * 根据商品分类获取对应的属性列表
 * 调用API接口创建商品时，入参product_format（属性对）依赖此接口返回的值
 * https://op.jinritemai.com/docs/api-docs/14/94
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * first_cid String 是 1001 一级分类id
 * second_cid String 是 1001001 二级分类id
 * third_cid String 是 1001001001 三级分类id
 * 请求示例
 * https://openapi-fxg.jinritemai.com/product/getCateProperty?app_key=your_appkey_here&method=product.getCateProperty&access_token=your_accesstoken_here&param_json={"first_cid":"1001","second_cid":"1001001","third_cid":"1001001001"}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
 * 响应参数
 * 参数名称 参数类型 示例值 参数描述
 * property_id Number 14133 属性id
 * property_name String "材质" 属性名称
 * options String 见响应示例 属性可选值列表，为空时需要手动填写
 * required Boolean false true：创建商品时该属性字段必填
 * false：创建商品时该属性字段选填
 * 响应示例
 * {
 * "data": [{
 * "property_id": 14133,
 * "property_name": "款式",
 * "required": false,
 * "options": [{
 * "name": "其他",
 * "value": "其他"
 * }, {
 * "name": "旋转式",
 * "value": "旋转式"
 * }, {
 * "name": "侧滑盖",
 * "value": "侧滑盖"
 * }, {
 * "name": "翻盖",
 * "value": "翻盖"
 * }, {
 * "name": "滑盖",
 * "value": "滑盖"
 * }, {
 * "name": "直板",
 * "value": "直板"
 * }, {
 * "name": "不详",
 * "value": "不详"
 * }]
 * }],
 * "err_no": 0,
 * "message": "success"
 * }
 */
class GetCatePropertyRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "product/getCateProperty";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// first_cid String 是 1001 一级分类id
	// second_cid String 是 1001001 二级分类id
	// third_cid String 是 1001001001 三级分类id
	public $first_cid = NULL;
	public $second_cid = NULL;
	public $third_cid = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->first_cid)) {
			$params['first_cid'] = $this->first_cid;
		}
		if ($this->isNotNull($this->second_cid)) {
			$params['second_cid'] = $this->second_cid;
		}
		if ($this->isNotNull($this->third_cid)) {
			$params['third_cid'] = $this->third_cid;
		}
		$this->param_json = $params;
	}
}
