<?php

namespace AbelHalo\ZolCrawler\Repository\Filters;

use AbelHalo\ZolCrawler\Repository\Filter;

class CpuCore implements Filter
{
    protected $coreDict = [
        '双核心' => 2,
        '四核心' => 4,
    ];

    protected $threadDict = [
        '双线程' => 2,
        '四线程' => 4,
    ];

    public function apply($value)
    {
        $result = [
            'cpu_cores'   => 0,
            'cpu_threads' => 0,
        ];

        if ($core = $this->consult($this->coreDict, $value)) {
            $result['cpu_cores'] = $core;
        }

        if ($thread = $this->consult($this->threadDict, $value)) {
            $result['cpu_threads'] = $thread;
        }

        return $result;
    }

    protected function consult($dict, $value)
    {
        foreach ($dict as $key => $paraphrase) {
            if (false !== strpos($value, $key)) {
                return $paraphrase;
            }
        }

        return false;
    }
}