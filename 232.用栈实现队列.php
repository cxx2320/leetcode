<?php
/*
 * @lc app=leetcode.cn id=232 lang=php
 *
 * [232] 用栈实现队列
 */

// @lc code=start
class MyQueue {
    public $queue = [];
    /**
     * Initialize your data structure here.
     */
    function __construct() {

    }

    /**
     * Push element x to the back of queue.
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        array_push($this->queue, $x);
    }

    /**
     * Removes the element from in front of queue and returns that element.
     * @return Integer
     */
    function pop() {
        return array_shift($this->queue);
    }

    /**
     * Get the front element.
     * @return Integer
     */
    function peek() {
        return $this->queue[0];
    }

    /**
     * Returns whether the queue is empty.
     * @return Boolean
     */
    function empty() {
        return empty($this->queue);
    }
}

/**
 * Your MyQueue object will be instantiated and called as such:
 * $obj = MyQueue();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->empty();
 */
// @lc code=end

