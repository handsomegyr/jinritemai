<?php

namespace Jinritemai\Request\Shop;

/**
 * 获取店铺的已授权品牌列表
 * https://op.jinritemai.com/docs/api-docs/13/54
 * 
 * 业务参数
无（注意：param_json请按照空对象 "{}" 传递）

请求示例
https://openapi-fxg.jinritemai.com/shop/brandList?app_key=your_appkey_here&method=shop.brandList&access_token=your_accesstoken_here&param_json={}&timestamp=2018-06-19%2016:06:59&v=2&sign=your_sign_here
响应参数
参数名称	参数类型	示例值	参数描述
id	Number	14133	品牌ID
brand_chinese_name	String	"品牌名"	品牌中文名
brand_english_name	String	"brand_name"	品牌英文名
brand_reg_num	String	"12363569"	商标注册号
响应示例
{
  "data": [
    {
      "id": 14133,
      "brand_chinese_name": "品牌名",	
      "brand_english_name": "brand_name",
      "brand_reg_num": "12363569"	
    }
  ],
  "err_no": 0,
  "message": "success"
}
 */
class BrandListRequest extends \Jinritemai\Request\Base
{
    // API名
    protected $methodName = "shop/brandList";
}
