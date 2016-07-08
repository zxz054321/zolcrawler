<?php

namespace AbelHalo\ZolCrawler\Contracts;

interface Filter
{
    public function apply($value);
}