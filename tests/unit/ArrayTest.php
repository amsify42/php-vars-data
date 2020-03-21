<?php

namespace Amsify42\Tests;

use PHPUnit\Framework\TestCase;
use Amsify42\PHPVarsData\PHPVarsData;
use Amsify42\PHPVarsData\Data\ArraySimple;

final class ArrayTest extends TestCase
{
    private $arraySimple = NULL;

    public function testSetterGetter()
    {
        $this->setSimpleArray();
        $this->arraySimple->set('name', 'amsify2');
        $this->assertEquals('amsify2', $this->arraySimple->get('name'));

        $this->assertEquals('somewhere', $this->arraySimple->get('detail.location'));
        $this->arraySimple->set('detail.location', 'nowhere');
        $this->assertEquals('nowhere', $this->arraySimple->get('detail.location'));

        $this->assertEquals('something', $this->arraySimple->get('detail.more_detail.do'));
        $this->arraySimple->set('detail.more_detail.do', 'nothing');
        $this->assertEquals('nothing', $this->arraySimple->get('detail.more_detail.do'));

        $this->assertEquals(42, $this->arraySimple->get('detail.more_detail.ids.0'));
        $this->arraySimple->set('detail.more_detail.ids.1', 43);
        $this->assertEquals([42,43], $this->arraySimple->get('detail.more_detail.ids'));
    }

    private function setSimpleArray()
    {
        if(!$this->arraySimple)
        {
            $this->arraySimple = new ArraySimple($this->sampleData());
        }
    }

    private function sampleData()
    {
        return [
            'name' => 'amsify',
            'detail' => [
                'location' => 'somewhere',
                'more_detail' => [
                    'do' => 'something',
                    'ids' => [42]
                ]
            ]
        ];
    }

    public function testKeys()
    {
        $arraySimple = get_array_simple([42, 'and', ['more', 'array']]);
        $this->assertEquals(42, $arraySimple[0]);
        $this->assertEquals('and', $arraySimple[1]);
        $this->assertEquals(['more', 'array'], $arraySimple[2]);
        $arraySimple[3] = 42.42;
        $this->assertEquals(42.42, $arraySimple[3]);
    }

    public function testIteration()
    {
        $arraySimple = PHPVarsData::arraySimple([1, 2, 3]);
        foreach($arraySimple as $key => $item)
        {
            $this->assertEquals($key+1, $item);
        }
    }
}