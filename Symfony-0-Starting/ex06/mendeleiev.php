<?php
// Parse each line of the file into an array with keys and values
function parse_mendeleiev_data($filePath)
{
    $fileData = file($filePath);
    $elements = [];

    foreach($fileData as $line)
    {
        list($name, $data) = explode(' = ', $line, 2);
        $element = [];
        $element['name'] = $name;
        $pairs = explode(', ', $data);
        foreach ($pairs as $pair) {
            list($key, $value) = explode(':', $pair, 2);
            $element[trim($key)] = trim($value);
        }
        $elements[] = $element;
    }
    return $elements;
}

// Generate the HTML code for the periodic table 
function generate_html_table($elements)
{
    // Create the base code for the html file
    $htmlContent = <<< HTML
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Periodic table of elements</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            td {
                border: 1px solid black;
                padding: 10px;
                text-align: center;
                vertical-align: top;
                box-sizing: border-box;
            }
            .empty {
                border: none;
            }
            h4 {
                font-size: 16px;
            }
            ul {
                padding-left: 20px;
                margin: 0;
                list-style-position: inside;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Periodic table of elements</h1>
        </header>
        <table>
    HTML;

    $current_row = "";
    $previous_position = 0;
    $maxColumns = 18;
    
    // Itarate on each elements of the array 
    foreach ($elements as $element)
    {
        $position = $element['position'];

        // If position is 0, close the previous row and start a new one
        if ($position == 0 && !empty($current_row))
        {
            if ($previous_position < $maxColumns)
                $current_row .= str_repeat('<td class="empty"></td>', $maxColumns - $previous_position);                
            $htmlContent .= "<tr>$current_row</tr>\n";
            $current_row = "";
            $previous_position = 0;
        }

        // Add empty cells if needed
        if ($position > $previous_position + 1)
            $current_row .= str_repeat('<td class="empty"></td>', $position - $previous_position - 1);

        // Create the element's cell
        $cell = <<<CELL
        <td>
            <h4>{$element['name']} ({$element['small']})</h4>
            <ul>
                <li>Number: {$element['number']}</li>
                <li>Molar Mass: {$element['molar']}</li>
                <li>Electrons: {$element['electron']}</li>
            </ul>
        </td>
        CELL;

        $current_row .= $cell;
        $previous_position = $position;
    }

    // Close the last row
    if (!empty($current_row))
    {
        if ($previous_position < $maxColumns)
            $current_row .= str_repeat('<td class="empty"></td>', $maxColumns - $previous_position);
        $htmlContent .= "<tr>$current_row</tr>\n";
    }

    // Close the HTML document
    $htmlContent .= "</table>\n</body>\n</html>";

    return $htmlContent;
}    

function add_html_content($htmlContent, $outputFile)
{
    $HTMLFile = fopen($outputFile, "w");
    if ($HTMLFile)
    {
        fwrite($HTMLFile, $htmlContent);
        fclose($HTMLFile);
    }
    else
        echo "Error: impossible to create the file";
}

$filePath = 'ex06.txt';
$outputFile = 'mendeleiev.html';

$elements = parse_mendeleiev_data($filePath);
$htmlContent = generate_html_table($elements);
add_html_content($htmlContent, $outputFile);
?>
