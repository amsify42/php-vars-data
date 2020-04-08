<?php

namespace Amsify42\Tests;

use PHPUnit\Framework\TestCase;
use Amsify42\PHPVarsData\PHPVarsData;
use Amsify42\PHPVarsData\Data\Evaluate;

final class EvaluateTest extends TestCase
{
    public function testToString()
    {
        $this->assertEquals('amsify', PHPVarsData::evaluateToString('amsify'));
        $this->assertEquals('true', Evaluate::toString(true));
        $this->assertEquals('false', Evaluate::toString(false));
        $this->assertEquals('NULL', Evaluate::toString(NULL));
        $this->assertEquals('two words', evaluate_to_string('two words'));
        $this->assertEquals('"two words"', Evaluate::toString('two words', true));
    }

    public function testToValue()
    {
        $this->assertEquals('amsify', PHPVarsData::evaluateToValue('amsify'));
        $this->assertEquals(42, Evaluate::toValue('42'));
        $this->assertEquals(4.2, Evaluate::toValue('4.2'));
        $this->assertEquals(true, Evaluate::toValue('true'));
        $this->assertEquals(false, Evaluate::toValue('false'));
        $this->assertEquals(null, evaluate_to_value('null'));
    }

    public function testToCount()
    {
        $this->assertEquals(2500, Evaluate::toCount('2.5K'));
        $this->assertEquals(420000, Evaluate::toCount('4.2M'));
        $this->assertEquals(3100, Evaluate::toCount('3.1k'));
        $this->assertEquals(4000, Evaluate::toCount('4000'));
        $this->assertEquals(1100000000 , Evaluate::toCount('1.1B'));
    }
}