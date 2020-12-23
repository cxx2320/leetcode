<?php
/*
 * @lc app=leetcode.cn id=387 lang=php
 *
 * [387] 字符串中的第一个唯一字符
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s)
    {
        $map = []; // 记录之前重复的字符，下次直接跳过

        // 获取字符串的长度使用strlen，之前使用count调试了很长时间
        for ($i = 0; $i < strlen($s); $i++) {
            if (isset($map[$s[$i]])) {
                continue;
            }
            for ($j = $i + 1; $j < strlen($s); $j++) {
                if ($s[$i] === $s[$j]) {
                    $map[$s[$i]] = true;
                    continue 2; // 跳出两个循环，不能使用break;
                }
            }
            return $i;
        }
        return -1;
    }
}
// @lc code=end

$a = new Solution();
$res = $a->firstUniqChar("loveleetcode");
var_dump($res);