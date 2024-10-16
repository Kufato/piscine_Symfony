<?php
$fileArray = file("ex01.txt");

foreach($fileArray as $line)
{
    $modifiedLine=str_replace(",", "\n", $line);
    echo "{$modifiedLine}";
}
?>