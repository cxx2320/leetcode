<?php
/*
 * @lc app=leetcode.cn id=341 lang=php
 *
 * [341] 扁平化嵌套列表迭代器
 */

// @lc code=start
/**
 * // This is the interface that allows for creating nested lists.
 * // You should not implement it, or speculate about its implementation
 * class NestedInteger {
 *
 *     // if value is not specified, initializes an empty list.
 *     // Otherwise initializes a single integer equal to value.
 *     function __construct($value = null)
 *
 *     // Return true if this NestedInteger holds a single integer, rather than a nested list.
 *     function isInteger() : bool
 *
 *     // Return the single integer that this NestedInteger holds, if it holds a single integer
 *     // The result is undefined if this NestedInteger holds a nested list
 *     function getInteger()
 *
 *     // Set this NestedInteger to hold a single integer.
 *     function setInteger($i) : void
 *
 *     // Set this NestedInteger to hold a nested list and adds a nested integer to it.
 *     function add($ni) : void
 *
 *     // Return the nested list that this NestedInteger holds, if it holds a nested list
 *     // The result is undefined if this NestedInteger holds a single integer
 *     function getList() : array
 * }
 */

class NestedIterator
{
    private $write_stack = null;

    private $read_stack = null;

    /**
     * @param NestedInteger[] $nestedList
     */
    function __construct($nestedList)
    {
        // 使用了两个栈作为辅助
        $this->write_stack = new SplStack();

        // 用于存储扁平化后的数据
        $this->read_stack = new SplStack();
        for ($i = 0; $i < count($nestedList); $i++) {
            $this->write_stack->push($nestedList[$i]);
        }
        while (!$this->write_stack->isEmpty()) {
            $nestedList = $this->write_stack->pop();
            if ($nestedList->isInteger()) {
                $this->read_stack->push($nestedList->getInteger());
                continue;
            }
            $list = $nestedList->getList();
            for ($i = 0; $i < count($list); $i++) {
                $this->write_stack->push($list[$i]);
            }
        }
    }

    /**
     * @return Integer
     */
    function next()
    {
        return $this->read_stack->pop();
    }

    /**
     * @return Boolean
     */
    function hasNext()
    {
        return !$this->read_stack->isEmpty();
    }
}

/**
 * Your NestedIterator object will be instantiated and called as such:
 * $obj = NestedIterator($nestedList);
 * $ret_1 = $obj->next();
 * $ret_2 = $obj->hasNext();
 */
// @lc code=end

/**
 * dfs实现
 */
class NestedIterator1
{

    private $queue = null;

    /**
     * @param NestedInteger[] $nestedList
     */
    function __construct($nestedList)
    {
        $this->queue = new SplQueue();
        $this->dfs($nestedList);
    }

    /**
     * @param NestedInteger[] $nestedList
     */
    private function dfs($nestedList)
    {
        for ($i = 0; $i < count($nestedList); $i++) {
            if ($nestedList[$i]->isInteger()) {
                $this->queue->push($nestedList[$i]->getInteger());
            } else {
                $this->dfs($nestedList[$i]->getList());
            }
        }
    }

    /**
     * @return Integer
     */
    function next()
    {
        return $this->queue->dequeue();
    }

    /**
     * @return Boolean
     */
    function hasNext()
    {
        return !$this->queue->isEmpty();
    }
}
