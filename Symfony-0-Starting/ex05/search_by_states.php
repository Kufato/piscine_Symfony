<?php
$states = [
    'Oregon' => 'OR',
    'Alabama' => 'AL',
    'New Jersey' => 'NJ',
    'Colorado' => 'CO',
];
$capitals = [
    'OR' => 'Salem',
    'AL' => 'Montgomery',
    'NJ' => 'trenton',
    'KS' => 'Topeka',
];

function search_by_states($string)
{
    global $states, $capitals;
    $array = explode(", ", $string);
    foreach ($array as $name)
    {
        // if the $name variable is the state
        if (array_key_exists($name, $states))
        {
            $abbreviation = $states[$name];
            if (array_key_exists($abbreviation, $capitals))
            {
                $capital = $capitals[$abbreviation];
                echo "{$capital} is the capital of {$name}\n";
            }
            else
                echo "{$name} is neither a capital nor a state.\n";
        }
        // if the $name variable is the capital
        else if (in_array($name, $capitals, true))
        {
            $abbreviation = array_search($name, $capitals);
            if ($abbreviation !== false && in_array($abbreviation, $states))
            {
                $state = array_search($abbreviation, $states);
                echo "{$name} is the capital of {$state}\n";
            }
            else
                echo "{$name} is neither a capital nor a state.\n";
        }
        // if the $name variable don't match a state with his capital
        else
            echo "{$name} is neither a capital nor a state.\n";
    }
}
?>