<?php

namespace AbelHalo\ZolCrawler\UrlGenerator;

use AbelHalo\ZolCrawler\Contracts\UrlGenerator;

class Laptop implements UrlGenerator
{
    public function generate($page)
    {
        return "http://detail.zol.com.cn/notebook_advSearch/subcate16_1_s859_9_1__$page.html";
    }
}