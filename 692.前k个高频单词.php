<?php
/*
 * @lc app=leetcode.cn id=692 lang=php
 *
 * [692] 前K个高频单词
 */

// @lc code=start

class MyminHeap extends SplMinHeap
{
    public function compare($a, $b)
    {
        if ($a[0] === $b[0]) {
            if ($a[1] === $b[1]) {
                return 0;
            } else {
                return $a[1] < $b[1] ? -1 : 1;
            }
        }
        return $a[0] > $b[0] ? -1 : 1;
    }
}

class Solution
{

    /**
     * @param String[] $words
     * @param Integer $k
     * @return String[]
     */
    function topKFrequent($words, $k)
    {
        $counts = array_count_values($words);
        $heap = new MyminHeap();
        foreach ($counts as $word => $count) {
            if ($heap->count() < $k) {
                $heap->insert([$count, $word]);
            } else {
                $top_word = $heap->top();
                if ($top_word[0] < $count) {
                    $heap->extract();
                    $heap->insert([$count, $word]);
                }
                if ($top_word[0] === $count && $word < $top_word[1]) {
                    $heap->extract();
                    $heap->insert([$count, $word]);
                }
            }
        }
        $res = array_fill(0, $heap->count() - 1, '');
        while (!$heap->isEmpty()) {
            [, $word] = $heap->extract();
            $size = $heap->count();
            $res[$size] = $word;
        }
        return $res;
    }
}
// @lc code=end

/**
 * 使用系统函数实现
 */
class Solution1
{

    /**
     * @param String[] $words
     * @param Integer $k
     * @return String[]
     */
    function topKFrequent($words, $k)
    {
        $map = [];
        foreach ($words as $value) {
            $map[$value] = [
                'name' => $value,
                'num' => isset($map[$value]) ? $map[$value]['num'] + 1 : 1
            ];
        }
        uasort($map, function ($a, $b) {
            if ($a['num'] === $b['num']) {
                if ($a['name'] === $b['name']) {
                    return 0;
                } else {
                    return $a['name'] < $b['name'] ? -1 : 1;
                }
            }
            return $a['num'] > $b['num'] ? -1 : 1;
        });
        return array_splice(array_keys($map), 0, $k);
    }
}
