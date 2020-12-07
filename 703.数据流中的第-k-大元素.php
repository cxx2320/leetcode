<?php
/*
 * @lc app=leetcode.cn id=703 lang=php
 *
 * [703] 数据流中的第 K 大元素
 */

// @lc code=start
class KthLargest
{

    public $k = 0;

    public $heap = null;

    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct($k, $nums)
    {
        $this->k = $k;
        $this->heap = new SplMinHeap();
        foreach ($nums as $value) {
            $this->_add($value);
        }
    }

    public function _add($val)
    {
        if ($this->heap->count() < $this->k) {
            $this->heap->insert($val);
        } elseif ($val > $this->heap->top()) {
            $this->heap->extract();
            $this->heap->insert($val);
        }
    }

    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val)
    {
        $this->_add($val);
        return $this->heap->top();
    }
}

/**
 * Your KthLargest object will be instantiated and called as such:
 * $obj = KthLargest($k, $nums);
 * $ret_1 = $obj->add($val);
 */
// @lc code=end
