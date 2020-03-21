<?php

namespace Amsify42\PHPVarsData;

class PHPVarsData
{
	public static function arraySimple($array)
	{
		return new \Amsify42\PHPVarsData\Data\ArraySimple($array);
	}

	public static function evaluateToString($value)
	{
		return \Amsify42\PHPVarsData\Data\Evaluate::toString($value);
	}

	public static function evaluateToValue($string)
	{
		return \Amsify42\PHPVarsData\Data\Evaluate::toValue($string);
	}
}