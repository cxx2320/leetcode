<?php
/*
 * @lc app=leetcode.cn id=63 lang=php
 *
 * [63] 不同路径 II
 */

// @lc code=start
class Solution
{

    /**
     * 比62题 多了一个判断
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid)
    {
        $m = count($obstacleGrid);
        $n = count($obstacleGrid[0]);
        $grid = array_fill(0, $m, array_fill(0, $n, 0));
        for ($i = 0; $i < $m && $obstacleGrid[$i][0] !== 1; $i++) {
            $grid[$i][0] = 1;
        }
        for ($i = 0; $i < $n && $obstacleGrid[0][$i] !== 1; $i++) {
            $grid[0][$i] = 1;
        }
        for ($i = 1; $i < $m; $i++) {
            for ($j = 1; $j < $n; $j++) {
                if ($obstacleGrid[$i][$j] === 1) {
                    continue;
                }
                $grid[$i][$j] = $grid[$i - 1][$j] + $grid[$i][$j - 1];
            }
        }
        return $grid[$m - 1][$n - 1];
    }
}
// @lc code=end
