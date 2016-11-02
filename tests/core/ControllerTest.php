<?php
/**
 * Created by PhpStorm.
 * User: matei
 * Date: 29/10/2016
 * Time: 22.50
 */

namespace Bretuobay\App;


use PHPUnit\Framework\TestCase;

class ControllerTest extends TestCase {

    public function testEmpty()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

} 