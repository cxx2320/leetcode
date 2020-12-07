<?php
/*
 * @lc app=leetcode.cn id=234 lang=php
 *
 * [234] 回文链表
 */
class ListNode
{
    public $val = 0;
    public $next = null;
    function __construct($val)
    {
        $this->val = $val;
    }
}
// @lc code=start
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution
{
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function isPalindrome($head)
    {
        if ($head === null) {
            return true;
        }
        if ($head->next === null) {
            return true;
        }
        $root = $head;
        return $this->reverse($head, $root);
    }

    function reverse($head, $root)
    {
        if ($head === null) {
            return true;
        }
        $res = $this->reverse($head->next, $root);
        if ($root->var !== $head->val) {
            return false;
        }
        $res = $res && ($root->var === $head->val);
        $root = $root->next;
        return $res;
    }
}
// @lc code=end
