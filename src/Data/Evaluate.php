<?php

namespace Amsify42\PHPVarsData\Data;

class Evaluate
{
	/**
	 * Convert value to its string version
	 * @param  mixed $value
	 * @param  boolean $quotesForMultipleWords
	 * @return mixed
	 */
	public static function toString($value, $quotesForMultipleWords=false)
	{
		/**
		 * If value having space in between
		 */
		if($quotesForMultipleWords && strpos($value, ' ') !== false)
		{
			return '"'.$value.'"';
		}
		/**
		 * Convert to str version if value is bool or null
		 */
		else if(is_bool($value) || is_null($value))
		{
			return var_export($value, true);
		}
		else
		{
			return $value;
		}
	}

	/**
	 * Converts str to its evaluated value
	 * @param  string $str [description]
	 * @return mixed
	 */
	public static function toValue($str)
	{
		$value = trim($str);
		if(is_numeric($value))
		{
			$value = strpos($value, '.') === false ? intval($value) : floatval($value);
		}
		else
		{
			$lower = strtolower($value);
			if($lower == 'true' || $lower == 'false' || $lower == 'null')
			{
				$value = json_decode($lower);
			}
		}
		return $value;
	}

	/**
	 * Evaualte k/m/b to it equivalent number
	 * @param  string $str
	 * @return int
	 */
	public static function toCount($str)
	{
		$str = strtolower(trim($str));
		if(strpos($str, 'k') !== false)
		{
			$str = str_replace('k', '', $str);
			$str = (float)$str;
			$str = $str*1000;
		}
		else if(strpos($str, 'm') !== false)
		{
			$str = str_replace('m', '', $str);
			$str = (float)$str;
			$str = $str*100000;
		}
		else if(strpos($str, 'b') !== false)
		{
			$str = str_replace('b', '', $str);
			$str = (float)$str;
			$str = $str*1000000000;
		}
		
		return (int)$str;
	}
}