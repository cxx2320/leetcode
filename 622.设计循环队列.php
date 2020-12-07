<?php
/*
 * @lc app=leetcode.cn id=622 lang=php
 *
 * [622] 设计循环队列
 */

// @lc code=start
class MyCircularQueue
{

    public $cap = 0;

    public $front = 0;

    public $rear = 0;

    public $size = 0;

    public $queue = [];

    /**
     * Initialize your data structure here. Set the size of the queue to be k.
     * @param Integer $k
     */
    function __construct($k)
    {
        $this->cap = $k;
    }

    /**
     * Insert an element into the circular queue. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function enQueue($value)
    {
        if ($this->isFull()) {
            return false;
        }
        $this->queue[$this->rear] = $value;
        if ($this->rear + 1 === $this->cap) {
            $this->rear = 0;
        } else {
            $this->rear++;
        }
        return true;
    }

    /**
     * Delete an element from the circular queue. Return true if the operation is successful.
     * @return Boolean
     */
    function deQueue()
    {
        if ($this->isEmpty()) {
            return -1;
        }
        $value = $this->queue[$this->front];
        if ($this->front === $this->size - 1) {
            $this->front = 0;
        } else {
            $this->front++;
        }
        $this->size--;
        return $value;
    }

    /**
     * Get the front item from the queue.
     * @return Integer
     */
    function Front()
    {
        if ($this->isEmpty()) {
            return -1;
        }
        return $this->queue[$this->front];
    }

    /**
     * Get the last item from the queue.
     * @return Integer
     */
    function Rear()
    {
        if ($this->isEmpty()) {
            return -1;
        }
        return $this->queue[$this->rear];
    }

    /**
     * Checks whether the circular queue is empty or not.
     * @return Boolean
     */
    function isEmpty()
    {
        return $this->size === 0;
    }

    /**
     * Checks whether the circular queue is full or not.
     * @return Boolean
     */
    function isFull()
    {
        return $this->size === $this->cap;
    }
}

/**
 * Your MyCircularQueue object will be instantiated and called as such:
 * $obj = MyCircularQueue($k);
 * $ret_1 = $obj->enQueue($value);
 * $ret_2 = $obj->deQueue();
 * $ret_3 = $obj->Front();
 * $ret_4 = $obj->Rear();
 * $ret_5 = $obj->isEmpty();
 * $ret_6 = $obj->isFull();
 */
// @lc code=end
