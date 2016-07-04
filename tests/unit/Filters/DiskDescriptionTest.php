<?php

use AbelHalo\ZolCrawler\Repository\Filters\DiskDescription;

class DiskDescriptionTest extends TestCase
{
    public function test()
    {
        $filter = new DiskDescription();

        $disk = $filter->apply('SSD固态硬盘');
        $this->assertEquals('ssd', $disk['disk_type']);
        $this->assertEquals(0, $disk['disk_rpm']);

        $disk = $filter->apply('混合硬盘（SSD+5400转HDD）');
        $this->assertEquals('sshd', $disk['disk_type']);
        $this->assertEquals(5400, $disk['disk_rpm']);

        $disk = $filter->apply('7200转');
        $this->assertEquals('hdd', $disk['disk_type']);
        $this->assertEquals(7200, $disk['disk_rpm']);
    }
}