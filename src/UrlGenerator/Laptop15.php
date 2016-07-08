<?php

namespace AbelHalo\ZolCrawler\UrlGenerator;

use AbelHalo\ZolCrawler\Contracts\UrlGenerator;

/**
 * Class Laptop15
 * 笔记本15寸最新
 *
 * @package AbelHalo\ZolCrawler\UrlGenerator
 */
class Laptop15 implements UrlGenerator
{
    public function generate($page)
    {
        return "http://detail.zol.com.cn/notebook_advSearch/subcate16_1_s860_9_1_0_$page.html";
    }
}