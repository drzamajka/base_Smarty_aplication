<?php

namespace PhpOption\Tests;

use PhpOption\None;
use PhpOption\Option;
use PhpOption\Some;

class OptionTest extends \PHPUnit_Framework_TestCase
{
    public function testfromValueWithDefaultNoneValue()
    {
        $this->assertInstanceOf('PhpOption\None', \PhpOption\Option::fromValue(null));
        $this->assertInstanceOf('PhpOption\Some', \PhpOption\Option::fromValue('value'));
    }

    public function testFromValueWithFalseNoneValue()
    {
        $this->assertInstanceOf('PhpOption\None', \PhpOption\Option::fromValue(false, false));
        $this->assertInstanceOf('PhpOption\Some', \PhpOption\Option::fromValue('value', false));
        $this->assertInstanceOf('PhpOption\Some', \PhpOption\Option::fromValue(null, false));
    }

    public function testFromArraysValue()
    {
        $this->assertEquals(None::create(), Option::fromArraysValue('foo', 'bar'));
        $this->assertEquals(None::create(), Option::fromArraysValue(null, 'bar'));
        $this->assertEquals(None::create(), Option::fromArraysValue(array('foo' => 'bar'), 'baz'));
        $this->assertEquals(None::create(), Option::fromArraysValue(array('foo' => null), 'foo'));
        $this->assertEquals(new Some('foo'), Option::fromArraysValue(array('foo' => 'foo'), 'foo'));

        $object = new SomeArrayObject();
        $object['foo'] = 'foo';
        $this->assertEquals(new Some('foo'), Option::fromArraysValue($object, 'foo'));
    }

    public function testFromReturn()
    {
        $null = function() { return null; };
        $false = function() { return false; };
        $some = function() { return 'foo'; };

        $this->assertTrue(\PhpOption\Option::fromReturn($null)->isEmpty());
        $this->assertFalse(\PhpOption\Option::fromReturn($false)->isEmpty());
        $this->assertTrue(\PhpOption\Option::fromReturn($false, array(), false)->isEmpty());
        $this->assertTrue(\PhpOption\Option::fromReturn($some)->isDefined());
        $this->assertFalse(\PhpOption\Option::fromReturn($some, array(), 'foo')->isDefined());
    }

    public function testOrElse()
    {
        $a = new \PhpOption\Some('a');
        $b = new \PhpOption\Some('b');

        $this->assertEquals('a', $a->orElse($b)->get());
    }

    public function testOrElseWithNoneAsFirst()
    {
        $a = \PhpOption\None::create();
        $b = new \PhpOption\Some('b');

        $this->assertEquals('b', $a->orElse($b)->get());
    }

    public function testOrElseWithLazyOptions()
    {
        $throws = function() { throw new \LogicException('Should never be called.'); };

        $a = new \PhpOption\Some('a');
        $b = new \PhpOption\LazyOption($throws);

        $this->assertEquals('a', $a->orElse($b)->get());
    }

    public function testOrElseWithMultipleAlternatives()
    {
        $throws = new \PhpOption\LazyOption(function() { throw new \LogicException('Should never be called.'); });
        $returns = new \PhpOption\LazyOption(function() { return new \PhpOption\Some('foo'); });

        $a = \PhpOption\None::create();

        $this->assertEquals('foo', $a->orElse($returns)->orElse($throws)->get());
    }
}

class SomeArrayObject implements \ArrayAccess
{
    private $data = array();

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}
