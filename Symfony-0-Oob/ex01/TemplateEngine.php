<?php
class TemplateEngine
{
    public function createFile($fileName, Text $text)
    {
        $templateContent = <<<HTML
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTf-8">
                <title>Le Petit Prince</title>
            </head>
            <body>
                <h1>Le Petit Prince</h1>
                <p>
                    Price: 7.5 &euro;<br />
                    Sleeping resistance: 2/5
                </p>
                <p>Description: Un jeune prince parcourt les planètes à la recherche de réponses aux grandes questions de la vie.</p>
                <p>Comment: {comment}</p>
            </body>
        </html>
        HTML;
        // Use readData() to get all the string from the Text object 
        $commentHtml = $text->readData();
        
        // Replace the {comment} beacon with the string from the Text object
        $templateContent = str_replace("{comment}", $commentHtml, $templateContent);

        // Put the content in the final html file
        file_put_contents($fileName, $templateContent);
    }
}
?>