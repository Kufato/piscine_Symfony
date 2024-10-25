<?php
require_once 'Elem.php';

class TemplateEngine
{
    public $rootElem;

    public function __construct(Elem $element)
    {
        // Add the element
        $this->rootElem = $element;
    } 

    public function createFile($fileName)
    {
        $htmlContent = $this->rootElem->getHTML();

        $file = fopen($fileName, "w");
        if ($file)
        {
            fwrite($file, $htmlContent);
            fclose($file);
        }
        else
            echo "Error: impossible to create the file";
    }
}
?>