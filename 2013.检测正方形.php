<?php
class DetectSquares
{
    /**
     * 当前数据表
     *
     * @var array
     */
    private $map = [];

    /**
     * 最大的x轴位置
     *
     * @var integer
     */
    private $max_x = 0;

    /**
     * 最大的y轴位置
     *
     * @var integer
     */
    private $max_y = 0;

    /**
     * 最小的x轴位置
     *
     * @var integer
     */
    private $min_x = 1000;

    /**
     * 最小的y轴位置
     *
     * @var integer
     */
    private $min_y = 1000;

    /**
     * 坐标总数
     *
     * @var integer
     */
    private $point_num = 0;

    /**
     * 当前使用过的节点
     *
     * @var array
     */
    private $used = [];

    /**
     * count 节点
     *
     * @var array
     */
    private $point = [];

    /**
     */
    function __construct()
    {
    }

    /**
     * @param Integer[] $point
     * @return NULL
     */
    function add($point)
    {
        [$x, $y] = $point;
        if (isset($this->map[$x][$y])) {
            // 记录位置出现的次数
            $this->map[$x][$y]++;
        } else {
            $this->map[$x][$y] = 1;
            // 记录总数量
            $this->point_num++;
        }

        // 记录四个参数，count传入的参数必须在这个四个参数组成的图形内
        $this->max_x = max($this->max_x, $x);
        $this->max_y = max($this->max_y, $y);
        $this->min_x = min($this->min_x, $x);
        $this->min_y = min($this->min_y, $y);
    }

    /**
     * @param Integer[] $point
     * @return Integer
     */
    function count($point)
    {
        [$x, $y] = $point;
        $this->point = $point;

        // 排除当前位置
        $this->used[$x][$y] = true;

        // 特判
        if ($this->point_num < 3) {
            return 0;
        }
        // 特判
        if ($x > $this->max_x || $y > $this->max_y) {
            return 0;
        }
        // 特判
        if ($x < $this->min_x || $y < $this->min_y) {
            return 0;
        }

        // 结果
        $result = 0;

        // 水平方向寻找和 point 在一条线的节点
        for ($i = $this->min_x; $i <= $this->max_x; $i++) {
            if (isset($this->map[$i][$y]) && !isset($this->used[$i][$y])) {
                // 两点确认一条直线
                $parallel_points = $this->getParallelPoint([$i, $y]);
                foreach ($parallel_points as $parallel_point) {
                    // 传入四个节点计算结果
                    $result += $this->getPointNum(
                        $this->point,
                        [$i, $y],
                        ...$parallel_point
                    );
                }
            }
        }
        // 垂直方向寻找和 point 在一条线的节点
        for ($i = $this->min_y; $i <= $this->max_y; $i++) {
            if (isset($this->map[$x][$i]) && !isset($this->used[$x][$i])) {
                // 两点确认一条直线
                $vertical_points = $this->getVerticalPoint([$x, $i]);
                foreach ($vertical_points as $vertical_point) {
                    // 传入四个节点计算结果
                    $result += $this->getPointNum(
                        $this->point,
                        [$x, $i],
                        ...$vertical_point
                    );
                }
            }
        }

        // 重置
        $this->point = [];
        $this->used = [];
        return $result;
    }

    /**
     * 根据两个节点获取水平的节点
     *
     * @return array|null
     */
    private function getParallelPoint($other_point): ?array
    {
        $res = [];
        // 距离
        $distance = abs($this->point[0] - $other_point[0]);
        $distances = [$distance, -$distance];
        // 根据一条直线可以确定正方形所在的坐标
        for ($i = 0; $i < 2; $i++) {
            if (
                isset($this->map[$other_point[0]][$other_point[1] + $distances[$i]])
                && isset($this->map[$this->point[0]][$this->point[1] + $distances[$i]])
            ) {
                $res[] = [
                    [$other_point[0], $other_point[1] + $distances[$i]],
                    [$this->point[0], $this->point[1] + $distances[$i]]
                ];
                // 防止重复计算，这里做记录
                $this->used[$other_point[0]][$other_point[1] + $distances[$i]] = true;
                $this->used[$this->point[0]][$this->point[1] + $distances[$i]] = true;
            }
        }
        return $res;
    }

    /**
     * 根据两个节点获取垂直的节点
     *
     * @return array|null
     */
    private function getVerticalPoint($other_point): ?array
    {
        $res = [];
        // 距离
        $distance = abs($this->point[1] - $other_point[1]);
        $distances = [$distance, -$distance];
        // 根据一条直线可以确定正方形所在的坐标
        for ($i = 0; $i < 2; $i++) {
            if (
                isset($this->map[$other_point[0] + $distances[$i]][$other_point[1]])
                && isset($this->map[$this->point[0] + $distances[$i]][$this->point[1]])
            ) {
                $res[] = [
                    [$other_point[0] + $distances[$i], $other_point[1]],
                    [$this->point[0] + $distances[$i], $this->point[1]]
                ];
                // 防止重复计算，这里做记录
                $this->used[$other_point[0] + $distances[$i]][$other_point[1]] = true;
                $this->used[$this->point[0] + $distances[$i]][$this->point[1]] = true;
            }
        }

        return $res;
    }

    /**
     * 获取结果数
     * 
     * $point1 是count的传参，不需要
     *
     * @param array $point1
     * @param array $point2
     * @param array $point3
     * @param array $point4
     * @return int
     */
    private function getPointNum($point1, $point2, $point3, $point4): int
    {
        // 这三个点的次数相乘
        return array_product([
            $this->map[$point2[0]][$point2[1]],
            $this->map[$point3[0]][$point3[1]],
            $this->map[$point4[0]][$point4[1]],
        ]);
    }

    // 辅助函数
    public function getMap()
    {
        return $this->map;
    }

    // 辅助函数
    public function getThisPointNum()
    {
        return $this->point_num;
    }
}

/**
 * Your DetectSquares object will be instantiated and called as such:
 * $obj = DetectSquares();
 * $obj->add($point);
 * $ret_2 = $obj->count($point);
 */

$obj = new DetectSquares();
$obj->add([419, 351]);
$obj->add([798, 351]);
$obj->add([798, 730]);
$ret_2 = $obj->count([419, 730]);

$obj->add([998, 1]);
$obj->add([0, 999]);
$obj->add([998, 999]);
$ret_3 = $obj->count([0, 1]);

var_dump($ret_3);
exit;


// 1 1 2 2
// 1 1 1 2
// 1 1 1 1
// 1 1 2 1

// 1 1 1 1
// 1 1 1 1
// 1 1 1 2
// 1 1 2 1
// 1 2 1 1
// 1 2 2 1
// 1 1 2 2
// 1 2 1 2