<?php

namespace Jinritemai\Request;

/**
 * 基础类
 */
abstract class Base
{
    // API名
    protected $methodName = "";
    // 参数
    protected $param_json = array();

    // 是否需要AccessToken
    public function isNeedAccessToken()
    {
        return true;
    }

    public function getApiMethodName()
    {
        if (empty($this->methodName)) {
            throw new \Exception('api method未指定');
        }
        return $this->methodName;
    }

    protected function buildParams()
    {
    }

    public function getParams()
    {
        $this->buildParams();

        if (!empty($this->param_json)) {
            // 确保key和值都是字符串
            foreach ($this->param_json as $key => $value) {
                $this->param_json[strval(trim($key))] = strval(trim($value));
            }
            // 排序
            ksort($this->param_json);
        }
        return $this->param_json;
    }

    public function checkParams()
    {
        return true;
    }

    protected function isNotNull($var)
    {
        return !is_null($var);
    }
}
