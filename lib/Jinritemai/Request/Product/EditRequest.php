<?php

namespace Jinritemai\Request\Product;

/**
 * 编辑商品
 * 编辑商品相关信息。编辑提交后默认自动提交审核，审核通过后，更新线上数据。
 * https://op.jinritemai.com/docs/api-docs/14/60
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * product_id String 是 3539925204033339668 商品ID
 * name String 否 xxx补水液 商品名称
 * spec_id String 否 1123 商品绑定的规格 spec_id。注意 : 修改后将导致原有的sku绑定关系失效，已上架商品会自动下架，请谨慎操作
 * pic String 否 img_url1|img_url2|img_url3 商品轮播图，多张图片用 "|" 分开，第一张图为主图。
 * description String 否 img_url1|img_url2|img_url3 商品描述，目前只支持图片。多张图片用 "|" 分开。不能用其他网站的文本粘贴，这样会出现css样式不兼容
 * first_cid String 否 2 一级分类id(分类修改需要三个级别都上传)
 * second_cid String 否 100 二级分类id(分类修改需要三个级别都上传)
 * third_cid String 否 1000 三级分类id(分类修改需要三个级别都上传)
 * mobile String 否 13122225555 客服号码
 * product_format String 否 货号|8888^上市年份季节|2018年秋季 属性名称|属性值之间用|分隔, 多组之间用^分开
 * presell_type String 否 1 预售类型，1-全款预售，0-非预售，默认0
 * presell_delay String 否 2 预售结束后，几天发货，可以选择2-30
 * presell_end_time String 否 2020-02-21 18:54:27 预售结束时间，格式2020-02-21 18:54:27，最多支持设置距离当前30天
 * commit String 否 2 "1"：编辑后立即提交审核；"2"：编辑后仅保存，不提审
 * 响应示例
 * {
 * "data": false,
 * "err_no": 0,
 * "message": "success"
 * }
 */
class EditRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "product/edit";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// product_id String 是 3539925204033339668 商品ID
	// name String 否 xxx补水液 商品名称
	// spec_id String 否 1123 商品绑定的规格 spec_id。注意 : 修改后将导致原有的sku绑定关系失效，已上架商品会自动下架，请谨慎操作
	// pic String 否 img_url1|img_url2|img_url3 商品轮播图，多张图片用 "|" 分开，第一张图为主图。
	// description String 否 img_url1|img_url2|img_url3 商品描述，目前只支持图片。多张图片用 "|" 分开。不能用其他网站的文本粘贴，这样会出现css样式不兼容
	// first_cid String 否 2 一级分类id(分类修改需要三个级别都上传)
	// second_cid String 否 100 二级分类id(分类修改需要三个级别都上传)
	// third_cid String 否 1000 三级分类id(分类修改需要三个级别都上传)
	// mobile String 否 13122225555 客服号码
	// product_format String 否 货号|8888^上市年份季节|2018年秋季 属性名称|属性值之间用|分隔, 多组之间用^分开
	// presell_type String 否 1 预售类型，1-全款预售，0-非预售，默认0
	// presell_delay String 否 2 预售结束后，几天发货，可以选择2-30
	// presell_end_time String 否 2020-02-21 18:54:27 预售结束时间，格式2020-02-21 18:54:27，最多支持设置距离当前30天
	// commit String 否 2 "1"：编辑后立即提交审核；"2"：编辑后仅保存，不提审
	public $product_id = NULL;
	public $name = NULL;
	public $spec_id = NULL;
	public $pic = NULL;
	public $description = NULL;
	public $first_cid = NULL;
	public $second_cid = NULL;
	public $third_cid = NULL;
	public $mobile = NULL;
	public $product_format = NULL;
	public $presell_type = NULL;
	public $presell_delay = NULL;
	public $presell_end_time = NULL;
	public $commit = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->product_id)) {
			$params['product_id'] = $this->product_id;
		}
		if ($this->isNotNull($this->name)) {
			$params['name'] = $this->name;
		}
		if ($this->isNotNull($this->spec_id)) {
			$params['spec_id'] = $this->spec_id;
		}
		if ($this->isNotNull($this->pic)) {
			$params['pic'] = $this->pic;
		}
		if ($this->isNotNull($this->description)) {
			$params['description'] = $this->description;
		}
		if ($this->isNotNull($this->first_cid)) {
			$params['first_cid'] = $this->first_cid;
		}
		if ($this->isNotNull($this->second_cid)) {
			$params['second_cid'] = $this->second_cid;
		}
		if ($this->isNotNull($this->third_cid)) {
			$params['third_cid'] = $this->third_cid;
		}
		if ($this->isNotNull($this->mobile)) {
			$params['mobile'] = $this->mobile;
		}
		if ($this->isNotNull($this->product_format)) {
			$params['product_format'] = $this->product_format;
		}
		if ($this->isNotNull($this->presell_type)) {
			$params['presell_type'] = $this->presell_type;
		}
		if ($this->isNotNull($this->presell_delay)) {
			$params['presell_delay'] = $this->presell_delay;
		}
		if ($this->isNotNull($this->presell_end_time)) {
			$params['presell_end_time'] = $this->presell_end_time;
		}
		if ($this->isNotNull($this->commit)) {
			$params['commit'] = $this->commit;
		}
		$this->param_json = $params;
	}
}
