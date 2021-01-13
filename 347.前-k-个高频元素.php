<?php
/*
 * @lc app=leetcode.cn id=347 lang=php
 *
 * [347] 前 K 个高频元素
 */

// @lc code=start
class MySplMinHeap extends SplMinHeap
{
    protected function compare($value1, $value2)
    {
        return $value1[1] < $value2[1] ? 1 : -1;
    }
}

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k)
    {
        // 使用系统函数统计条目出现的次数
        $maps = array_count_values($nums);
        // 使用自定义的最小堆利于操作
        $heap = new MySplMinHeap();
        foreach ($maps as $num => $time) {
            if ($heap->count() < $k) {
                $heap->insert([$num, $time]);
                continue;
            }
            [$top_num, $top_time] = $heap->top();
            if ($top_time < $time) {
                $heap->extract();
                $heap->insert([$num, $time]);
            }
        }
        $res = [];
        while (!$heap->isEmpty()) {
            [$top_num, $top_time] = $heap->extract();
            $res[] = $top_num;
        }
        return $res;
    }
}
// @lc code=end
