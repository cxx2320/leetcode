<?php
/*
 * @lc app=leetcode.cn id=2 lang=php
 *
 * [2] 两数相加
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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        /** @var ListNode $root */
        $root = new ListNode(0);
        $cursor = $root;
        $carry = 0;
        while ($l1 !== null || $l2 !== null) {
            $l1val = $l1->val ?? 0;
            $l2val = $l2->val ?? 0;
            $value = $l1val + $l2val + $carry;
            $carry = floor($value / 10);
            $cursor->next = new ListNode($value % 10);
            $cursor = $cursor->next;
            if ($l1 !== null) {
                $l1 = $l1->next;
            }
            if ($l2 !== null) {
                $l2 = $l2->next;
            }
        }
        if($carry > 0){
            $cursor->next = new ListNode(1);
            $cursor = $cursor->next;
        }
        return $root->next;
    }
}
// @lc code=end
