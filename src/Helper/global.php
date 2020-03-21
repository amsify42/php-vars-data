<?php

function get_array_simple($array)
{
	return new \Amsify42\PHPVarsData\Data\ArraySimple($array);
}

function evaluate_to_string($value, $quotes=false)
{
	return \Amsify42\PHPVarsData\Data\Evaluate::toString($value, $quotes);
}

function evaluate_to_value($string)
{
	return \Amsify42\PHPVarsData\Data\Evaluate::toValue($string);
}