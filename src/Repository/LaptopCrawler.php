<?php

namespace AbelHalo\ZolCrawler\Repository;

class LaptopCrawler extends AbstractParamCrawler
{
    protected $match = [
        // CPU
        'CPU型号'  => 'cpu_number',
        'CPU主频'  => 'cpu_freq',
        '最高睿频'   => 'cpu_turbofreq',
        '二级缓存'   => 'cpu_l2',
        '三级缓存'   => 'cpu_l3',
        '核心/线程数' => 'cpu_cores',
        '制程工艺'   => 'cpu_lithography',
        '功耗'     => 'cpu_tdp',

        // Disk
        '硬盘容量'   => 'disk_capacity',
        '硬盘描述'   => 'disk_description',

        // Screen
        '屏幕尺寸'   => 'screen_size',
        '屏幕分辨率'  => 'screen_resolution',

        '笔记本重量' => 'weight',
        '厚度'    => 'thickness',
    ];
}