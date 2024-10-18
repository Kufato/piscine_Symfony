<?php
// parse each line of the file in a array who match keys and values
function parse_mendeleiev_data($filePath)
{
    $fileData = file($filePath);
    $elements = [];
    foreach($fileData as $line)
    {
        list($name, $data) = explode(' = ', $line, 2);
        $elements['name'] = $name;
        $pairs = explode(', ', $data);
        foreach ($pairs as $pair) {
            list($key, $value) = explode(':', $pair, 2);
            $elements[trim($key)] = trim($value);
        }
    }
    return $elements;
}

// generate the base code for the html page
function generate_html_table()
{
    $htmlContent = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Periodic table of elements</title>
        <style>
            table {
                width: 10%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid blue;
                padding: 8px;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Periodic table of elements</h1>
        </header>
        <main>
            <table>
                <tr>
                    <td>
                        <h4>Hydrogen</h4>
                            <ul>
                                <li>No 42</li>
                                <li>H</li>
                                <Li>1.00794 </li>
                                <li>1 electron</li>
                            <ul>
                    </td>
                </tr>
            </table>
        </main>
    </body>
    </html>
    ";

    return ($htmlContent);
}

function main()
{
    $filePath = 'ex06.txt';
    $outputFile = 'mendeleiev.html';

    $elements = parse_mendeleiev_data($filePath);
    $htmlContent = generate_html_table($elements);
}


// $file = fopen("mendeleiev.html", "w");
// if ($file)
// {
//     // write the base code for the html page
//     $htmlContent = generate_html_base();
//     fwrite($file, $htmlContent);
//     fclose($file);

//     // get the data from "ex06.txt" and store it
//     $fileData = file("ex06.txt");

//     // foreach($fileData as $line)
//     // {
//     //     $element = parse_line_to_array($line);
//     // }
// }
// else
//     echo "Error: impossible to create the file";
?>