<?php
/*
 * @lc app=leetcode.cn id=692 lang=php
 *
 * [692] 前K个高频单词
 */

// @lc code=start
class Solution
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
// @lc code=end
