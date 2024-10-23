<?php
class Text
{
    // For contain all the strings
    private $texts  = array();

    // Constructor that take an array of string
    public function __construct($arrayString)
    {
        $this->texts = $arrayString;
    }

    // Add a new string in the array
    public function append($newText)
    {
        $this->texts[] = $newText;
    }

    // Return each string in a <p> beacon
    public function readData()
    {
        $html = '';
        foreach($this->texts as $text)
            $html .= '<p>' . htmlspecialchars($text) . '</p>';
        return ($html);
    }
}
?>