<?php
class TemplateEngine
{
    public function createFile($fileName, $templateName, Text $text)
    {
        // Get the content of the html file
        $templateContent = file_get_contents($templateName);

        // Use readData() to get all the string from the Text object 
        $commentHtml = $text->readData();
        
        // Replace the {comment} beacon with the string from the Text object
        $templateContent = str_replace("{comment}", $commentHtml, $templateContent);

        // Put the content in the final html file
        file_put_contents($fileName, $templateContent);
    }
}
?>