<?php
/*
 * @lc app=leetcode.cn id=385 lang=php
 *
 * [385] 迷你语法分析器
 */

// @lc code=start

/**
 * // This is the interface that allows for creating nested lists.
 * // You should not implement it, or speculate about its implementation
 * class NestedInteger {

 *     // if value is not specified, initializes an empty list.
 *     // Otherwise initializes a single integer equal to value.
 *     function __construct($value = null)

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

class Solution
{
    /**
     * @param String $s
     * @return NestedInteger
     */
    function deserialize($s)
    {
        $stack = new SplStack();
        if ($s[0] !== '[') {
            return new NestedInteger($s);
        }
        [$num, $f] = ['', false];
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] === '[') {
                $stack->push(new NestedInteger());
            } elseif ($s[$i] === ']') {
                $ni = $stack->pop();
                if ($num !== '') {
                    $ni->add(new NestedInteger($f ? (0 - $num) : $num));
                    [$num, $f] = ['', false];
                }
                if ($stack->count() === 0) {
                    return $ni;
                }
                $stack->top()->add($ni);
            } elseif ($s[$i] === ',') {
                if ($num !== '') {
                    $ni = new NestedInteger($f ? (0 - $num) : $num);
                    $stack->top()->add($ni);
                    [$num, $f] = ['', false];
                }
            } elseif ($s[$i] === '-') {
                $f = true;
            } else {
                $num .= $s[$i];
            }
        }
    }
}
// @lc code=end


class Solution111
{
    /**
     * @param String $s
     * @return NestedInteger
     */
    function deserialize($s)
    {
        $queue = new SplQueue();
        [$num, $f] = ['', true];
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] === '[' || $s[$i] === ']' || $s[$i] === ',') {
                if ($num !== '') {
                    $queue->enqueue($f ? $num : ($num - $num - $num));
                    [$num, $f] = ['', true];
                }
                if ($s[$i] !== ',') {
                    $queue->enqueue($s[$i]);
                }
                continue;
            }
            if ($s[$i] === '-') {
                $f = false;
                continue;
            }
            $num .= $s[$i];
        }
        if ($num !== '') {
            $queue->enqueue($f ? $num : ($num - $num - $num));
        }
        return $this->dfs($queue);
    }

    /**
     * @param SplQueue $queue
     * @param NestedInteger $NestedInteger
     * @return void
     */
    public function dfs($queue, $NestedInteger = null)
    {
        if ($queue->isEmpty()) {
            return $NestedInteger;
        }
        $str = $queue->dequeue();
        if ($str === '[') {
            $ni = new NestedInteger();
            $ni = $this->dfs($queue, $ni);
            if ($NestedInteger !== null) {
                $NestedInteger->add($ni);
                return $this->dfs($queue, $NestedInteger);
            }
            return $ni;
        }
        if ($str === ']') {
            // 这里就不能继续递归了
            return $NestedInteger;
        }
        if ($NestedInteger !== null) {
            $ni = new NestedInteger($str);
            $NestedInteger->add($ni);
            return $this->dfs($queue, $NestedInteger);
        }
        return new NestedInteger($str);
    }
}

$s = new Solution();
$res = $s->deserialize("[123,456,[788,799,833],[[]],10,[]]");
// var_dump($res);
