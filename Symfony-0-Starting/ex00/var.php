<?php
$a = 10;
$b = "10";
$c = "ten";
$d = 10.0;

$typeA = gettype($a);
$typeB = gettype($b);
$typeC = gettype($c);
$typeD = gettype($d);

echo "a contains : {$a} and has type : {$typeA}\n";
echo "a contains : {$b} and has type : {$typeB}\n";
echo "a contains : {$c} and has type : {$typeC}\n";
echo "a contains : {$d} and has type : {$typeD}\n";
?>