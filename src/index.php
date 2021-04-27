<?php
/*
Apresenta os resultados de todos os scripts
*/

include './fizzbuzz.php';
include './fibonacci.php';


DEFINE('FNUM', 50);

function fibonacci($n){
	$A = 1;
	$B = 0;
	for($i=0; $i<$n;$i++){
		$tmp = null;
		//echo 'iteração ' . ($i+1) . ' = ' . $A;
		$tmp = $A + $B;
		$B = $A;
		$A = $tmp;
		//
	}
	echo 'F('.$n.') = '.$B.'<br/>';
	return true;
}

//main
$res1 = fibonacci(5);
$res1 = fibonacci(10);
$res1 = fibonacci(1);



