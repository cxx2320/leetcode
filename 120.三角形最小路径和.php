<?php
/*
 * @lc app=leetcode.cn id=120 lang=php
 *
 * [120] 三角形最小路径和
 */

// @lc code=start
class Solution
{
    /**
     * @param int[][] $triangle
     * @return int
     */
    function minimumTotal($triangle)
    {
        $result = [];
        for ($i = count($triangle) - 2; $i >= 0; $i--) {
            for ($j = 0; $j < count($triangle[$i]); $j++) {
                if (!isset($result[$i])) {
                    $result[$i] = [];
                }
                $result[$i][$j] = min($triangle[$i + 1][$j], $triangle[$i + 1][$j + 1]) + $triangle[$i][$j];
            }
        }
        return $result[0][0];
    }
}
// @lc code=end

// 递归，在数据量大的时候可以会出现内存溢出
class Solution1
{
    public $sum = PHP_INT_MAX;

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle)
    {
        $this->dfs($triangle, 1, $triangle[0][0], 0);
        return $this->sum;
    }

    public function dfs($triangle, $level, $sum, $index)
    {
        if (count($triangle) === $level) {
            if ($this->sum > $sum) {
                $this->sum = $sum;
            }
            return;
        }

        for ($i = $index; $i <= $index + 1; $i++) {
            $this->dfs($triangle, $level + 1, $sum + $triangle[$level][$i], $i);
        }
    }
}

$triangle = [[-1], [2, 3], [1, -1, -3]];
$s = new Solution();
$result = $s->minimumTotal($triangle);
var_dump($result);
