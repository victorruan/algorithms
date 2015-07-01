<?php
/**
*快速排序
*对$nums从$left到$right之间的数，进行从小到大的排序
*
*
*
*/
function quick_sort(&$nums,$left,$right){
	//如果$left<$right,那么排序才能正常进行，否则，已经不需要排序！
	if($left<$right){
		$x = $nums[$left];#选择一个基准
		$l=$left;
		$r=$right;
		while($l<$r){
			while($l<$r&&$nums[$r]>$x) $r--;
			if($l<$r) $nums[$l] = $nums[$r];
			while($l<$r&&$nums[$l]<=$x) $l++;
			if($l<$r) $nums[$r] = $nums[$l];
		}
		
			$nums[$l] = $x;
	quick_sort($nums,$left,$l-1);
	quick_sort($nums,$l+1,$right);
	}
}

$nums = array(1,5,65,7,92,3,54,32,24,4);
$l = 0;
$r = count($nums)-1;
quick_sort($nums,$l,$r);
var_dump($nums);