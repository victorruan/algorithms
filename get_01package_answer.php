<?php
/**
*	01背包的状态转换方程 f[i,j] = Max{ f[i-1,j-Wi]+Pi( j >= Wi ),  f[i-1,j] }
*	f[i,j]表示在前i件物品中选择若干件放在承重为 j 的背包中，可以取得的最大价值。
*	Pi表示第i件物品的价值。
*	决策：为了背包中物品总价值最大化，第 i件物品应该放入背包中吗 ？
**/
class PackageItem {
	public $name,$weight,$value;
	function __construct($name,$weight,$value){
		$this->name = $name;
		$this->weight = $weight;
		$this->value = $value;
	}
}
/**
*入参：放入哪些物品bagItems;背包的承重capacity！
**/
function get01_package_answer($bagItems=array(),$capacity=0){
	$total_value = array();//$total_value[1][1] 表示当只能装前两个物品的时候，背包容量为1的总价值！！！
	$length = count($bagItems);//背包物品的总数量
	for($i=0;$i<$length;$i++){//0~4

		//$i=0 一个物品的时候，需要判断物品的容量是否大于背包的容量
		for ($j=1; $j <= $capacity; $j++) { 
			# $i表示物品，$j表示容量
			if ($i==0) {
				if($bagItems[$i]->weight > $j){
					$total_value[$i][$j] = 0;
				}else{
					$total_value[$i][$j] = $bagItems[$i]->value;
				}
			}
			else {
				if($j<=$bagItems[$i]->weight)
					{$total_value[$i][$j]=$total_value[$i-1][$j];continue;}
				$total_value[$i][$j]
				=
				$total_value[$i-1][$j-$bagItems[$i]->weight]+
				$bagItems[$i]->value;
				$max = $total_value[$i-1][$j];
				if($total_value[$i][$j]<$max) $total_value[$i][$j] = $max; 
			}

		}
	}

return $total_value;
}

$names = array('a','b','c','d','e');
$weights = array(2,2,6,5,4);
$values = array(6,3,5,4,6);
$bagItems = array();
$length = count($names);
for($i=0;$i<$length;$i++)
{
	$bagItem = new PackageItem($names[$i],$weights[$i],$values[$i]);
	$bagItems[$i]=$bagItem;
}
$answer = get01_package_answer($bagItems,10);
var_dump($answer);

