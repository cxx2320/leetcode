<?php
/*
 * @lc app=leetcode.cn id=9 lang=php
 *
 * [9] 回文数
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        if($x < 0){
            return false;
        }
        $y = str_split($x);
        $z = $y;
        foreach ($y as $key => $value) {
            if($value != array_pop($z)){
                return false;
            }
        }
        return true;
    }
}
// @lc code=end

$new = new Solution();
var_dump($new->isPalindrome(0));
