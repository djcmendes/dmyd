<?php
/*
	Exercise FizzBuzz
	Create a loop that will print all the numbers for the range, 1-20. If the number is:
	divisible by 3, print 'Fizz'
	divisible by 5, print 'Buzz'
	divisible by 3 & 5, 'FizzBuzz'
	otherwise print the number
	Your answer does not need to be minimal, just working and understandable
	You can use the JavaScript vanilla, Typescript or PHP7
*/

for($i=1; $i<=20;$i++){
	switch ($i) {
		case ($i % 3 == 0 && $i % 5 == 0):
			echo 'FizzBuzz';
			break;
		case ($i % 3 == 0):
			echo 'Fizz';
			break;
		case ($i % 5 == 0):
			echo 'Buzz';
			break;
		default:
			echo $i;
	}
	echo '<br/>';
}


