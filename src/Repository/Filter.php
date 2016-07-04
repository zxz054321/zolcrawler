<?php

namespace AbelHalo\ZolCrawler\Repository;

interface Filter
{
    public function apply($value);
}