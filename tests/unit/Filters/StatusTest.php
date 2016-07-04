<?php

use AbelHalo\ZolCrawler\Repository\Filters\Status;

class StatusTest extends TestCase
{
    public function test()
    {
        $filter = new Status();

        $this->assertEquals('discontinued', $filter->apply('[停产]'));
        $this->assertEquals('discontinued', $filter->apply('停产'));
        $this->assertEquals('upcoming', $filter->apply('即将上市'));
        $this->assertEquals('conceptual', $filter->apply('概念产品'));
        $this->assertEquals('normal', $filter->apply('停0产'));
        $this->assertEquals('normal', $filter->apply(''));
    }
}