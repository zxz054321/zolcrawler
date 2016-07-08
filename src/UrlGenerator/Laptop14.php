<?php

namespace AbelHalo\ZolCrawler\UrlGenerator;

use AbelHalo\ZolCrawler\Contracts\UrlGenerator;

/**
 * Class Laptop14
 * 笔记本14寸最新
 * 
 * @package AbelHalo\ZolCrawler\UrlGenerator
 */
class Laptop14 implements UrlGenerator
{
    public function generate($page)
    {
        return "http://detail.zol.com.cn/notebook_advSearch/subcate16_1_s859_9_1__$page.html";
    }
}