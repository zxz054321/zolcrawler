<?php

use AbelHalo\ZolCrawler\Repository\Filters\CpuNumber;

class CpuNumberTest extends TestCase
{
    public function test()
    {
        $filter = new CpuNumber();

        $cpu    = $filter->apply('Intel 酷睿i3 5005U');
        $this->assertEquals('intel', $cpu['cpu_brand']);
        $this->assertEquals('酷睿i3', $cpu['cpu_series']);
        $this->assertEquals('5005U', $cpu['cpu_number']);

        $cpu    = $filter->apply('Intel 酷睿M5 6Y54');
        $this->assertEquals('intel', $cpu['cpu_brand']);
        $this->assertEquals('酷睿M5', $cpu['cpu_series']);
        $this->assertEquals('6Y54', $cpu['cpu_number']);

        $cpu    = $filter->apply('Intel 赛扬四核 N2930');
        $this->assertEquals('intel', $cpu['cpu_brand']);
        $this->assertEquals('赛扬四核', $cpu['cpu_series']);
        $this->assertEquals('N2930', $cpu['cpu_number']);

        $cpu    = $filter->apply('Intel Atom X5 Z8500');
        $this->assertEquals('intel', $cpu['cpu_brand']);
        $this->assertEquals('Atom X5', $cpu['cpu_series']);
        $this->assertEquals('Z8500', $cpu['cpu_number']);

        $cpu    = $filter->apply('AMD A6-6310');
        $this->assertEquals('amd', $cpu['cpu_brand']);
        $this->assertEquals('A6', $cpu['cpu_series']);
        $this->assertEquals('6310', $cpu['cpu_number']);

        $cpu    = $filter->apply('AMD FX-7600P');
        $this->assertEquals('amd', $cpu['cpu_brand']);
        $this->assertEquals('FX', $cpu['cpu_series']);
        $this->assertEquals('7600P', $cpu['cpu_number']);

        $cpu    = $filter->apply('AMD A10 PRO-870');
        $this->assertEquals('amd', $cpu['cpu_brand']);
        $this->assertEquals('A10', $cpu['cpu_series']);
        $this->assertEquals('PRO-870', $cpu['cpu_number']);
    }
}