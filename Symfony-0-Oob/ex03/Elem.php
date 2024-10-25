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

        // Check if the $element variable is in the array $tags
        if (in_array($element, $tags))
            $this->element = $element;
        else
        {
            echo "Error: the element '$element' is not valid.";
            return ;
        }
        
        // Add the content if the $content variable exist otherwise create it
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
        // Check for the self-closing beacon
        $selfClosingTags = ['meta', 'img', 'hr', 'br'];
        if (in_array($this->element, $selfClosingTags))
            return "<{$this->element} />";

        // Open the beacon
        $html = "<{$this->element}>";

        // Check if the item is a instance of the Elem class and make a recursive call 
        // Otherwise simply add the content
        foreach($this->content as $item)
        {
            if ($item instanceof Elem)
                $html .= $item->getHTML();
            else
                $html .= htmlspecialchars($item);
        }

        // Close the beacon
        $html .= "</{$this->element}>";

        return ($html);
    }
}
?>