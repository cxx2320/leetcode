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
// @lc code=end


class Solution111
{

    /**
     * @param String $s
     * @return NestedInteger
     */
    function deserialize($s)
    {
        $ni = new NestedInteger();
        $this->dfs($s, 0, '', true, $ni);
        var_dump($ni);
    }

    public function dfs($s, $index, $num, $z, $NestedInteger)
    {
        if (strlen($s) <= $index) {
            if ($num !== '') {
                $NestedInteger->setInteger($z ? $num : ($num - $num - $num));
            }
            return $NestedInteger;
        }
        if ($s[$index] === '[') {
            $ni = new NestedInteger();
            $NestedInteger->add($ni);
            $this->dfs($s, $index + 1, '', true, $ni);
            return $NestedInteger;
        }

        if ($s[$index] === ']') {
            $ni = new NestedInteger($z ? $num : ($num - $num - $num));
            $NestedInteger->add($ni);
            return $this->dfs($s, $index + 1, '', true, new NestedInteger());
        }

        if ($s[$index] === '-') {
            return $this->dfs($s, $index + 1, '', false, $NestedInteger);
        }

        if ($s[$index] === ',') {
            $ni = new NestedInteger($z ? $num : ($num - $num - $num));
            $NestedInteger->add($ni);
            return $this->dfs($s, $index + 1, '', true, $NestedInteger);
        }
        return $this->dfs($s, $index + 1, $num . $s[$index], $z, $NestedInteger);
    }
}

$s = new Solution();
$res = $s->deserialize("[123,456,[788,799,833],[[]],10,[]]");
// var_dump($res);
