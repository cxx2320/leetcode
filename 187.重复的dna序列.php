<?php
/*
 * @lc app=leetcode.cn id=187 lang=php
 *
 * [187] 重复的DNA序列
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return String[]
     */
    function findRepeatedDnaSequences($s)
    {
        $len = strlen($s);
        if ($len < 10) {
            return [];
        }
        $map = [];
        for ($i = 0; $i < $len; $i++) {
            if ($len - $i < 10) {
                break;
            }
            $map[] = substr($s, $i, 10);
        }
        $res = [];
        foreach (array_count_values($map) as $str => $count) {
            if ($count > 1) {
                $res[] = $str;
            }
        }
        return $res;
    }
}
// @lc code=end

$s = new Solution();
$result = $s->findRepeatedDnaSequences('AAAAACCCCCAAAAACCCCCCAAAAAGGGTTT');
var_dump($result);
