<?php

namespace Amsify42\PHPVarsData\Data;

class ArraySimple implements \Iterator, \ArrayAccess, \Countable 
{
    /**
     * Position of array
     * @var integer
     */
	private $position = 0;

    /**
     * Array data
     * @var array
     */
	private $array = [];

    /**
     * Instantiate and validate array
     * @param array  $array
     */
	function __construct(array $array)
	{
        $this->array    = $array;
        $this->position = 0;
	}

    /**
     * Call pre defined functions if exist
     * @param  string   $name
     * @param  array    $arguments
     * @return mixed
     */
    function __call($name, $arguments)
    {
	    if(empty($arguments))
	    {
	        $value = $name($this->array);    
	    }
	    else
	    {
	        $arguments[] = $this->array;
	        $value = $name(...$arguments);
	    }
    }

    /**
     * Iterator Methods
     */
    
	public function rewind()
	{
        $this->position = 0;
    }

    public function current()
    {
        return $this->array[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->array[$this->position]);
    }

    /**
     * ArrayAccess Methods
     */

    public function offsetSet($offset, $value)
    {
        $this->array[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return isset($this->array[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->array[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->array[$offset]) ? $this->array[$offset] : null;
    }

    /**
     * Countable Method
     */
    
    public function count()
    {
        return count($this->array);
    }


    /**
     * set/get method for getting direct key value
     */

    public function set($path, $value)
	{
		$path = trim($path);
		if($path)
		{
			$pathArray = explode('.', $path);
			if(sizeof($pathArray)> 0)
			{
				return $this->setValue($pathArray, $value);
			}
		}
		else if(is_array($value))
		{
			$this->array = $value;
		}
	}

	private function setValue($keysPath, $value)
	{
		for($i=&$this->array; $key=array_shift($keysPath),$key!==NULL; $i=&$i[$key])
		{
			if(!isset($i[$key])) $i[$key] = array();
	    }
	    $i = $value;
	}

	public function get($path='')
	{
		$path = trim($path);
		if($path)
		{
			$pathArray = explode('.', $path);
			if(sizeof($pathArray)> 0)
			{
				return $this->getValue($pathArray);
			}
		}
		return $this->array;
	}

	private function getValue($keysPath)
	{
		for($i=$this->array; $key=array_shift($keysPath),$key!==NULL; $i=$i[$key])
		{
			if(!isset($i[$key])) return null;
	    }
	    return $i;
	}
}