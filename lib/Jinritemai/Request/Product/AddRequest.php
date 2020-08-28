<?php

namespace Jinritemai\Request\Product;

/**
 * 添加商品
 * 创建商品的接口，商品添加成功后会自动进入平台的异步机审流程，机审完成后将自动上架。
 *
 * 注："pic"、"description"、"spec_pic"这三个字段里的传入的图片数量总和，不得超过50张
 * https://op.jinritemai.com/docs/api-docs/14/59
 *
 * 业务参数
 * 参数名称 参数类型 是否必须 示例值 参数描述
 * out_product_id String 否 234123 外部商品id，接入方的商品id
 * 需为数字字符串，max = int64
 * name String 是 xxx补水液 商品名称，最多30个字符，不能含emoj表情
 * pic String 是 img_url1|img_url2|img_url3 商品轮播图，多张图片用 "|" 分开，第一张图为主图，最多5张，至少600x600，大小不超过1M
 * description String 是 img_url1|img_url2|img_url3 商品描述，目前只支持图片。多张图片用 "|" 分开。不能用其他网站的文本粘贴，这样会出现css样式不兼容
 * market_price String 是 12800 划线价，单位分
 * discount_price String 是 11000 售价，单位分
 * first_cid String 是 2 一级分类id（三个分类级别请确保从属正确）
 * second_cid String 是 100 二级分类id
 * third_cid String 是 1000 三级分类id
 * spec_id String 是 23 规格id, 要先创建商品通用规格, 如颜色-尺寸
 * spec_pic String 否 1234|img_url^1235|img_url 主规格id, 如颜色-尺寸, 颜色就是主规格, 颜色如黑,白,黄,它们的id|图片url
 * mobile String 是 13122225555 客服号码
 * weight String 是 1100 商品重量 (单位:克)。范围: 10克 - 9999990克
 * product_format String 是 货号|8888^上市年份季节|2018年秋季 属性名称|属性值
 * 之间用|分隔, 多组之间用^分开
 * pay_type String 是 1 支付方式，必填，0-货到付款，1-在线支付，2-二者都支持
 * recommend_remark String 否 这个商品很好啊 商家推荐语，不能含emoj表情
 * brand_id String 否 123 品牌id (请求店铺授权品牌接口获取) (效果即为商品详情页面中的品牌字段)
 * presell_type String 否 1 预售类型，1-全款预售，0-非预售，默认0
 * presell_delay String 否 2 预售结束后，几天发货，可以选择2-30
 * presell_end_time String 否 2020-02-21 18:54:27 预售结束时间，格式2020-02-21 18:54:27，最多支持设置距离当前30天
 * delivery_delay_day String 否 2 承诺发货时间，单位是天，可选值为: 2、3、5、7、10、15
 * quality_report String 否 img_url,img_url 商品创建和编辑操作支持设置质检报告链接,多个图片以逗号分隔
 * class_quality String 否 img_url,img_url 商品创建和编辑操作支持设置品类资质链接,多个图片以逗号分隔
 * 请求示例
 * http://openapi-fxg.jinritemai.com/product/add?app_key=your_app_key_here&method=product.add&access_token=your_accesstoken_here&param_json={"description":"http://img.alicdn.com/imgextra/i3/729863055/TB2BROYcamWBuNkHFJHXXaatVXa-729863055.jpg|http://img.alicdn.com/imgextra/i2/729863055/TB2tDz7iXmWBuNjSspdXXbugXXa-729863055.jpg","discount_price":"26800","first_cid":"2","market_price":"29800","mobile":"13122223333","name":"气质时尚女装碎花修身显瘦裙子","out_product_id":"123456","pay_type":"2","pic":"http://img.alicdn.com/imgextra/i1/729863055/TB2FG49iuOSBuNjy0FdXXbDnVXa_!!729863055.jpg|http://img.alicdn.com/imgextra/i4/729863055/TB2kMSXiuuSBuNjSsziXXbq8pXa_!!729863055.jpg","product_format":"品牌:ss^货号:8888^上市年份季节:2018年秋季","recommend_remark":"remark...","second_cid":"123","spec_id":"1","spec_pic":"5|http://img.alicdn.com/imgextra/i2/729863055/TB2mdV0cDXYBeNkHFrdXXciuVXa_!!729863055.jpg","third_cid":"1234"}&timestamp=2018-04-27%2011:55:56&v=2&sign=your_sign_here
 * 响应示例
 * {
 * "data": {
 * "product_id": 3276187891830787600,
 * "create_time": "2018-05-06 16:04:31"
 * },
 * "err_no": 0,
 * "message": "success"
 * }
 */
class AddRequest extends \Jinritemai\Request\Base
{
	// API名
	protected $methodName = "product/add";

	// 参数名称 参数类型 是否必须 示例值 参数描述
	// out_product_id String 否 234123 外部商品id，接入方的商品id 需为数字字符串，max = int64
	// name String 是 xxx补水液 商品名称，最多30个字符，不能含emoj表情
	// pic String 是 img_url1|img_url2|img_url3 商品轮播图，多张图片用 "|" 分开，第一张图为主图，最多5张，至少600x600，大小不超过1M
	// description String 是 img_url1|img_url2|img_url3 商品描述，目前只支持图片。多张图片用 "|" 分开。不能用其他网站的文本粘贴，这样会出现css样式不兼容
	// market_price String 是 12800 划线价，单位分
	// discount_price String 是 11000 售价，单位分
	// first_cid String 是 2 一级分类id（三个分类级别请确保从属正确）
	// second_cid String 是 100 二级分类id
	// third_cid String 是 1000 三级分类id
	// spec_id String 是 23 规格id, 要先创建商品通用规格, 如颜色-尺寸
	// spec_pic String 否 1234|img_url^1235|img_url 主规格id, 如颜色-尺寸, 颜色就是主规格, 颜色如黑,白,黄,它们的id|图片url
	// mobile String 是 13122225555 客服号码
	// weight String 是 1100 商品重量 (单位:克)。范围: 10克 - 9999990克
	// product_format String 是 货号|8888^上市年份季节|2018年秋季 属性名称|属性值 之间用|分隔, 多组之间用^分开
	// pay_type String 是 1 支付方式，必填，0-货到付款，1-在线支付，2-二者都支持
	// recommend_remark String 否 这个商品很好啊 商家推荐语，不能含emoj表情
	// brand_id String 否 123 品牌id (请求店铺授权品牌接口获取) (效果即为商品详情页面中的品牌字段)
	// presell_type String 否 1 预售类型，1-全款预售，0-非预售，默认0
	// presell_delay String 否 2 预售结束后，几天发货，可以选择2-30
	// presell_end_time String 否 2020-02-21 18:54:27 预售结束时间，格式2020-02-21 18:54:27，最多支持设置距离当前30天
	// delivery_delay_day String 否 2 承诺发货时间，单位是天，可选值为: 2、3、5、7、10、15
	// quality_report String 否 img_url,img_url 商品创建和编辑操作支持设置质检报告链接,多个图片以逗号分隔
	// class_quality String 否 img_url,img_url 商品创建和编辑操作支持设置品类资质链接,多个图片以逗号分隔
	public $out_product_id = NULL;
	public $name = NULL;
	public $pic = NULL;
	public $description = NULL;
	public $market_price = NULL;
	public $discount_price = NULL;
	public $first_cid = NULL;
	public $second_cid = NULL;
	public $third_cid = NULL;
	public $spec_id = NULL;
	public $spec_pic = NULL;
	public $mobile = NULL;
	public $weight = NULL;
	public $product_format = NULL;
	public $pay_type = NULL;
	public $recommend_remark = NULL;
	public $brand_id = NULL;
	public $presell_type = NULL;
	public $presell_delay = NULL;
	public $presell_end_time = NULL;
	public $delivery_delay_day = NULL;
	public $quality_report = NULL;
	public $class_quality = NULL;

	protected function buildParams()
	{
		$params = array();
		if ($this->isNotNull($this->out_product_id)) {
			$params['out_product_id'] = $this->out_product_id;
		}
		if ($this->isNotNull($this->name)) {
			$params['name'] = $this->name;
		}
		if ($this->isNotNull($this->pic)) {
			$params['pic'] = $this->pic;
		}
		if ($this->isNotNull($this->description)) {
			$params['description'] = $this->description;
		}
		if ($this->isNotNull($this->market_price)) {
			$params['market_price'] = $this->market_price;
		}
		if ($this->isNotNull($this->discount_price)) {
			$params['discount_price'] = $this->discount_price;
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
		if ($this->isNotNull($this->spec_id)) {
			$params['spec_id'] = $this->spec_id;
		}
		if ($this->isNotNull($this->spec_pic)) {
			$params['spec_pic'] = $this->spec_pic;
		}
		if ($this->isNotNull($this->mobile)) {
			$params['mobile'] = $this->mobile;
		}
		if ($this->isNotNull($this->weight)) {
			$params['weight'] = $this->weight;
		}
		if ($this->isNotNull($this->product_format)) {
			$params['product_format'] = $this->product_format;
		}
		if ($this->isNotNull($this->pay_type)) {
			$params['pay_type'] = $this->pay_type;
		}
		if ($this->isNotNull($this->recommend_remark)) {
			$params['recommend_remark'] = $this->recommend_remark;
		}
		if ($this->isNotNull($this->brand_id)) {
			$params['brand_id'] = $this->brand_id;
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
		if ($this->isNotNull($this->delivery_delay_day)) {
			$params['delivery_delay_day'] = $this->delivery_delay_day;
		}
		if ($this->isNotNull($this->quality_report)) {
			$params['quality_report'] = $this->quality_report;
		}
		if ($this->isNotNull($this->class_quality)) {
			$params['class_quality'] = $this->class_quality;
		}
		$this->param_json = $params;
	}
}
