<?php
/*
Write a function, to obtain a given Fibonacci number (n):
fibonacci(5);
fibonacci(10);
fibonacci(1);
We're looking for use of iteration or recursion here
You can use the JavaScript vanilla, Typescript or PHP7
NB: We will not accept the mathematical formula for a given Fibonacci number.
*/

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



