<?php
/*
 * @lc app=leetcode.cn id=933 lang=php
 *
 * [933] 最近的请求次数
 */

// @lc code=start
class RecentCounter
{

    public $queue = [];

    /**
     */
    function __construct()
    {
    }

    /**
     * @param Integer $t
     * @return Integer
     */
    function ping($t)
    {
        array_push($this->queue,$t);
        $num = $t - 3000;
        foreach ($this->queue as $value) {
            if($value <= $num){
                array_pop($this->queue);
            }
        }
        return count($this->queue);
    }
}

/**
 * Your RecentCounter object will be instantiated and called as such:
 * $obj = RecentCounter();
 * $ret_1 = $obj->ping($t);
 */
// @lc code=end
