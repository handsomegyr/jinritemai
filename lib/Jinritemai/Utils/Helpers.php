<?php

namespace Jinritemai\Utils;

/**
 * Defines a few helper methods.
 *
 * @author guoyongrong <handsomegyr@126.com>
 */
class Helpers
{

	/**
	 * 检测一个字符串否为Json字符串
	 *
	 * @param string $string        	
	 * @return true/false
	 *
	 */
	public static function isJson($string)
	{
		if (strpos($string, "{") !== false) {
			json_decode($string);
			return (json_last_error() == JSON_ERROR_NONE);
		} else {
			return false;
		}
	}

	/**
	 * 获取随机字符串
	 *
	 * @param number $length        	
	 * @return string
	 */
	public static function createNonceStr($length = 16)
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$str = "";
		for ($i = 0; $i < $length; $i++) {
			$str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
		}
		return $str;
	}

	/**
	 * 作用：array转xml
	 */
	public static function arrayToXml($arr)
	{
		$xml = "<xml>";
		foreach ($arr as $key => $val) {
			if (is_numeric($val)) {
				$xml .= "<" . $key . ">" . $val . "</" . $key . ">";
			} else
				$xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
		}
		$xml .= "</xml>";
		return $xml;
	}

	/**
	 * 作用：将xml转为array
	 */
	public static function xmlToArray($xml)
	{
		libxml_disable_entity_loader(true);
		$object = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
		return @json_decode(preg_replace('/{}/', '""', @json_encode($object)), 1);
	}
}
