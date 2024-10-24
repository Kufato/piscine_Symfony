<?php
$tags = [
    'meta',
    'img',
    'hr',
    'br', 
    'html',
    'head',
    'body',
    'title',
    'h1',
    'h2',
    'h3',
    'h4',
    'h5',
    'h6',
    'p',
    'span',
    'div'
];

class Elem
{
    public $element;
    public $content;

    public function __construct($element, $content = NULL)
    {
        global $tags;

        // Check if the $element is in the array $tags
        if (in_array($element, $tags))
            $this->element = $element;
        else
            throw new InvalidArgumentException("The element '$element' is not valid.");
        
        // Add the content if the $content exist otherwise create it
        if ($content === NULL)
            $this->content = [];
        elseif (is_array($content))
            $this->content = $content;
        else
            $this->content = [$content];
    }

    public function pushElement(Elem $newElement)
    {
        // Add the new element in the content
        $this->content[] = $newElement;
    }

    public function getHTML()
    {
        // Open the beacon
        $html = "<{$this->element}>";

        foreach($content as $item)
        {
            
        }
    }
}
?>