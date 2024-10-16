<?php
function array2hash_sorted($array)
{
    $hash = array();
    foreach($array as $person)
        $hash[$person[0]] = $person[1];
    krsort($hash);
    return ($hash);
}
?>