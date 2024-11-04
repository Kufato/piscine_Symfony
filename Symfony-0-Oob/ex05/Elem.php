<?php
require_once 'MyException.php';

// Array of all valid tags
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
    'div',
    'table',
    'tr',
    'th',
    'td',
    'ul',
    'ol',
    'li'
];

class Elem
{
    public $element;
    public $content;
    public $attributes;

    public function __construct($element, $content = NULL, $attributes = NULL)
    {
        global $tags;

        // Check if the $element variable is in the array $tags
        if (in_array($element, $tags))
            $this->element = $element;
        else
        {
            try
            {
                $obj = new MyException ("Error: unauthorized tag");
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
        }
        
        // Add the content if the $content variable exist otherwise create it
        if ($content === NULL)
            $this->content = [];
        elseif (is_array($content))
            $this->content = $content;
        else
            $this->content = [$content];

        // Add the array $attributes
        if ($attributes !== NULL)
        {
            foreach ($attributes as $key => $value)
                $this->attributes[$key] = $value;  
        }
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

        // Open the beacon depends if the $attributes variable is NULL or not
        if ($this->attributes !== NULL)
        {
            $html = "<{$this->element}";
            foreach ($this->attributes as $key => $value)
                $html .= " {$key}=\"{$value}\">";
        }
        else
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

    public function validPage()
    {
        // If the root element is not 'html', the structure is invalid.
        if ($this->element !== 'html')
            return false;

        // Check the structure of the HTML page
        return $this->checkStructure($this);
    }

    private function checkStructure(Elem $element)
    {
        // Checking the <html> root element with <head> followed by <body>.
        if ($element->element === 'html')
        {
            $hasHead = false;
            $hasBody = false;

            foreach ($element->content as $child)
            {
                if ($child instanceof Elem)
                {
                    if ($child->element === 'head')
                    {
                        if ($hasHead) 
                            return false;
                        $hasHead = true;
                    }
                    elseif ($child->element === 'body')
                    {
                        if (!$hasHead || $hasBody)
                            return false;
                        $hasBody = true;
                    } 
                    else 
                        return false;
                }
            }
            if (!($hasHead && $hasBody))
                return false;
        }

        // Checking <head> tags
        if ($element->element === 'head')
        {
            $hasTitle = false;
            $hasMetaCharset = false;

            foreach ($element->content as $child)
            {
                if ($child instanceof Elem)
                {
                    if ($child->element === 'title')
                    {
                        if ($hasTitle)
                            return false;
                        $hasTitle = true;
                    }
                    elseif ($child->element === 'meta' && isset($child->attributes['charset']))
                    {
                        if ($hasMetaCharset)
                            return false;
                        $hasMetaCharset = true;
                    }
                    else
                        return false;
                }
            }
            if (!($hasTitle && $hasMetaCharset))
                return false;
        }

        // Check <p> for text only
        if ($element->element === 'p')
        {
            foreach ($element->content as $child)
            {
                if ($child instanceof Elem)
                    return false;
            }
        }

        // Check for <table> containing only <tr>.
        if ($element->element === 'table')
        {
            foreach ($element->content as $child)
            {
                if (!$child instanceof Elem || $child->element !== 'tr')
                    return false;
            }
        }

        // Check for <tr> containing only <th> or <td>.
        if ($element->element === 'tr')
        {
            foreach ($element->content as $child)
            {
                if (!$child instanceof Elem || ($child->element !== 'th' && $child->element !== 'td'))
                    return false;
            }
        }

        // Checking <ul> and <ol> to only have <li>
        if ($element->element === 'ul' || $element->element === 'ol')
        {
            foreach ($element->content as $child)
            {
                if (!$child instanceof Elem || $child->element !== 'li')
                    return false;
            }
        }

        // Recursive call to validate sub-elements
        foreach ($element->content as $child)
        {
            if ($child instanceof Elem && !$this->checkStructure($child))
                return false;
        }

        return true;
    }

}
?>