<?php
/**
 * Created by PhpStorm.
 * User: matei
 * Date: 29/10/2016
 * Time: 22.49
 */

use Bretuobay\App as Leaf;
use PHPUnit\Framework\TestCase;


class ModelTest extends TestCase{

    public function setUp()
    {
        $this->testmod = new Leaf\Model();
    }

    public function testEmpty()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }



} 