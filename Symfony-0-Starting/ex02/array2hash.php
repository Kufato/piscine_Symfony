<?php
function array2hash($array)
{
    $hash = array();
    foreach($array as $person)
        $hash[$person[1]] = $person[0];
    return ($hash);
}
?>