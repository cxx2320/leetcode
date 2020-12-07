<?php
/*
 * @lc app=leetcode.cn id=641 lang=php
 *
 * [641] 设计循环双端队列
 */

// @lc code=start
class MyCircularDeque
{
    public $cap = 0;
    public $queue = [];
    public $head = 0;
    public $tail = 0;
    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     * @param Integer $k
     */
    function __construct($k)
    {
        $this->cap = $k;
    }

    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value)
    {
    }

    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value)
    {
    }

    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteFront()
    {
    }

    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteLast()
    {
    }

    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront()
    {
    }

    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear()
    {
    }

    /**
     * Checks whether the circular deque is empty or not.
     * @return Boolean
     */
    function isEmpty()
    {
        return empty($this->queue);
    }

    /**
     * Checks whether the circular deque is full or not.
     * @return Boolean
     */
    function isFull()
    {
        return count($this->queue) === $this->cap;
    }
}

/**
 * Your MyCircularDeque object will be instantiated and called as such:
 * $obj = MyCircularDeque($k);
 * $ret_1 = $obj->insertFront($value);
 * $ret_2 = $obj->insertLast($value);
 * $ret_3 = $obj->deleteFront();
 * $ret_4 = $obj->deleteLast();
 * $ret_5 = $obj->getFront();
 * $ret_6 = $obj->getRear();
 * $ret_7 = $obj->isEmpty();
 * $ret_8 = $obj->isFull();
 */
// @lc code=end
