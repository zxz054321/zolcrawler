<?php

use AbelHalo\ZolCrawler\Repository\Filters\DiskCapacity;

class DiskCapacityTest extends TestCase
{
    public function test()
    {
        $filter = new DiskCapacity();

        $this->assertEquals(500, $filter->apply('500GB'));
        $this->assertEquals(1000, $filter->apply('1TB'));
        $this->assertEquals(500, $filter->apply('8GB+500GB'));
        $this->assertEquals(1000, $filter->apply('1TB+16GB'));
    }
}