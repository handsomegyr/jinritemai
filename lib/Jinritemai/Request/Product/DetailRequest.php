<?php

namespace Jinritemai\Request\Product;

/**
 * 获取商品详情
获取商品的详细信息（默认读取的是线上数据，而非草稿数据；如无线上数据，则读取草稿数据）
 * https://op.jinritemai.com/docs/api-docs/14/56
 * 
 * 二、业务参数
参数名称	参数类型	是否必须	示例值	参数描述
product_id	String	是	3539925204033339668	商品id
show_draft	String	否	"true"	"true"：读取草稿数据；"false"：读取上架数据
三、请求示例
https://openapi-fxg.jinritemai.com/product/detail?app_key=your_app_key_here&method=product.detail&access_token=your_accesstoken_here&param_json={"product_id":"product_id_here"}&timestamp=2018-06-19 16:06:59&v=2&sign=your_sign_here
四、响应示例
{
    "data": {
        "product_id": 3276192774554309600,
        "open_user_id": 353992520403334****,
        "name": "气质时尚女装碎花修身显瘦裙子",
        "description": "<img src='https://sf6-ttcdn-tos.pstatp.com/obj/temai/93addf0cd27c5ac835767731e33aa1dfe02c5854' style='width:100%;'><img src='https://sf6-ttcdn-tos.pstatp.com/obj/temai/d63de94a01d287f10cc1e58da57b162e594986c5' style='width:100%;'>",
        "img": "https://sf6-ttcdn-tos.pstatp.com/obj/temai/0c71ce6acb4e3b508e0d30042b1a94262818ab41",
        "market_price": 29800,
        "discount_price": 26800,
        "status": 0,
        "spec_id": 1,
        "check_status": 2,
        "mobile": "13122223333",
        "first_cid": 2,
        "second_cid": 123,
        "third_cid": 1234,
        "pay_type": 2,
        "recommend_remark": "remark...",
        "is_create": 0,
        "create_time": "2018-05-06 16:42:25",
        "pic": [
            "https://sf6-ttcdn-tos.pstatp.com/obj/temai/0c71ce6acb4e3b508e0d30042",
            "https://sf3-ttcdn-tos.pstatp.com/obj/temai/b4c2ab334236f8141e41faa14"
        ],
        "product_format": "{\"上市年份季节\":\"2018年秋季\",\"品牌\":\"ss\",\"货号\":\"8888\"}",
        "spec_pics": [
            {
                "spec_detail_id": 5,
                "pic": "https://sf1-ttcdn-tos.pstatp.com/obj/temai/b637513c50b994f4c89de56a1788"
            }
        ],
        "spec_prices": [
            {
                "sku_id": 1431,
                "spec_detail_ids": [
                    3141,
                    3142,
                    3143
                ],
                "stock_num": 500,
                "price": 32800,
                "settlement_price": 26000,
                "code": "A00018001"
            }
        ],
        "specs": [
            {
                "id": 3144,
                "spec_id": 123,
                "name": "颜色",
                "pid": 0,
                "is_leaf": 0,
                "values": [
                    {
                        "id": 3148,
                        "spec_id": 316314,
                        "name": "黑色",
                        "pid": 3148915,
                        "is_leaf": 1,
                        "status": 0
                    },
                    {
                        "id": 3149,
                        "spec_id": 316314,
                        "name": "白色",
                        "pid": 3148915,
                        "is_leaf": 1,
                        "status": 0
                    },
                    {
                        "id": 3150,
                        "spec_id": 316314,
                        "name": "黄色",
                        "pid": 3148915,
                        "is_leaf": 1,
                        "status": 0
                    }
                ]
            }
        ]
    },
    "err_no": 0,
    "message": "success"
}
 */
class DetailRequest extends \Jinritemai\Request\Base
{
  // API名
  protected $methodName = "product/detail";

  // 参数名称	参数类型	是否必须	示例值	参数描述
  // product_id	String	是	3539925204033339668	商品id
  // show_draft	String	否	"true"	"true"：读取草稿数据；"false"：读取上架数据
  public $product_id = NULL;
  public $show_draft = NULL;

  protected function buildParams()
  {
    $params = array();
    if ($this->isNotNull($this->product_id)) {
      $params['product_id'] = $this->product_id;
    }
    if ($this->isNotNull($this->show_draft)) {
      if (is_numeric($this->show_draft)) {
        $params['show_draft'] = trim(boolval($this->show_draft));
      } else {
        $params['show_draft'] = trim($this->show_draft);
      }
    }
    $this->param_json = $params;
  }
}
