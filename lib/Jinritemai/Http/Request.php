<?php

/**
 * 处理HTTP请求
 * 
 * 使用Guzzle http client库做为请求发起者，以便日后采用异步请求等方式加快代码执行速度
 *
 */

namespace Jinritemai\Http;

class Request
{

    protected $_accessToken = null;

    protected $_tmp = null;

    protected $_json = true;

    protected $_accessTokenName = 'access_token';

    public function __construct($accessToken = '', $json = true, $accessTokenName = 'access_token')
    {
        $this->setAccessTokenName($accessTokenName);
        $this->setAccessToken($accessToken);
        $this->setJson($json);
    }

    /**
     * 设定access token
     *
     * @param string $accessToken            
     */
    public function setAccessToken($accessToken)
    {
        $this->_accessToken = $accessToken;
        return $this;
    }

    /**
     * 设定access token所对应的字段名字
     *
     * @param string $accessTokenName            
     */
    public function setAccessTokenName($accessTokenName)
    {
        $this->_accessTokenName = $accessTokenName;
        return $this;
    }

    /**
     * 设定是否是json输出
     *
     * @param string $accessTokenName            
     */
    public function setJson($json)
    {
        $this->_json = $json;
        return $this;
    }

    /**
     * 获取服务器信息
     *
     * @param string $url            
     * @param array $params            
     * @return mixed
     */
    public function get($url, $params = array(), $options = array())
    {
        $options['Content-Type'] = "application/json";
        $client = new \GuzzleHttp\Client($options);
        $query = $this->getQueryParam4AccessToken();
        $params = array_merge($params, $query);
        $response = $client->get($url, array(
            'query' => $params
        ));
        if ($this->isSuccessful($response)) {
            return $this->getJson($response); // $response->json();
        } else {
            throw new \Exception("服务器未有效的响应请求");
        }
    }

    /**
     * 推送消息给到服务器
     *
     * @param string $url            
     * @param array $params            
     * @return mixed
     */
    public function post($url, $params = array(), $options = array())
    {
        $options['Content-Type'] = "application/json";
        $client = new \GuzzleHttp\Client($options);
        $response = $client->post($url, array(
            'form_params' => $params
        ));
        if ($this->isSuccessful($response)) {
            return $this->getJson($response); // $response->json();
        } else {
            throw new \Exception("服务器未有效的响应请求");
        }
    }


    /**
     * JSON request.
     *
     * @param string $url
     * @param        $params
     */
    public function json($url, $params = [])
    {
        $options['Content-Type'] = "application/json";
        $client = new \GuzzleHttp\Client($options);
        $response = $client->post($url, array(
            'json' => $params
        ));
        if ($this->isSuccessful($response)) {
            return $this->getJson($response); // $response->json();
        } else {
            throw new \Exception("服务器未有效的响应请求");
        }
    }

    /**
     * Checks if HTTP Status code is Successful (2xx | 304)
     *
     * @return bool
     */
    public function isSuccessful($response)
    {
        $statusCode = $response->getStatusCode();
        return ($statusCode >= 200 && $statusCode < 300) || $statusCode == 304;
    }

    /**
     * 下载文件
     *
     * @param string $url            
     * @throws Exception
     * @return array
     */
    public function getFileByUrl($url = '', $file_ext = "")
    {
        $opts = array(
            'http' => array(
                'follow_location' => 3,
                'max_redirects' => 3,
                'timeout' => 10,
                'method' => "GET",
                'header' => "Connection: close\r\n",
                'user_agent' => 'R&D'
            )
        );
        $context = stream_context_create($opts);
        $fileBytes = file_get_contents($url, false, $context);

        if (empty($file_ext)) {
            $ext = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
            if (empty($ext)) {
                $ext = "jpg";
            }
        } else {
            $ext = $file_ext;
        }
        $filename = uniqid() . ".{$ext}";
        return array(
            'name' => $filename,
            'bytes' => $fileBytes
        );
    }

    /**
     * 将指定文件名和内容的数据，保存到临时文件中，在析构函数中删除临时文件
     *
     * @param string $fileName            
     * @param bytes $fileBytes            
     * @return string
     */
    protected function saveAsTemp($fileName, $fileBytes)
    {
        $this->_tmp = sys_get_temp_dir() . '/temp_files_' . $fileName;
        file_put_contents($this->_tmp, $fileBytes);
        return $this->_tmp;
    }

    protected function getJson($response)
    {
        $body = $response->getBody();
        $contents = $response->getBody()->getContents();
        try {
            if ($this->_json) {
                $json = json_decode($body, true);
                if (JSON_ERROR_NONE !== json_last_error()) {
                    throw new \InvalidArgumentException('Unable to parse JSON data: ');
                }
                return $json;
            } else {
                return $contents;
            }
        } catch (\Exception $e) {
            return $contents;
        }
    }

    protected function getQueryParam4AccessToken()
    {
        $params = array();
        if (!empty($this->_accessTokenName) && !empty($this->_accessToken)) {
            $params[$this->_accessTokenName] = $this->_accessToken;
        }
        return $params;
    }

    public function __destruct()
    {
        if (!empty($this->_tmp)) {
            unlink($this->_tmp);
        }
    }
}
