<?php

use AbelHalo\ZolCrawler\Filters\Price;

class PriceTest extends TestCase
{
    public function test()
    {
        $filter = new Price();

        $this->assertEquals(1234, $filter->apply('1234'));
        $this->assertEquals(13000, $filter->apply('1.3万'));
        $this->assertEquals(-1, $filter->apply('停产'));
        $this->assertEquals(-1, $filter->apply('即将上市'));
    }
}