<?php
require_once 'HotBeverage.php';

class TemplateEngine
{
    public function createFile(HotBeverage $beverage)
    {
        // Get all the attributes 
        $reflection = new ReflectionClass($beverage);
        $properties = $reflection->getProperties();
        
        $attributes = [];

        // Use the getter funtion to get the value of each attributes
        foreach($properties as $property)
        {
            $propertyName = $property->getName();
            $getter = 'get' . ucfirst($propertyName);
            if (method_exists($beverage, $getter))
                $attributes[$propertyName] = $beverage->$getter();
        }

        // Get the content of the template.html file
        $template = file_get_contents('template.html');

        // Replace the key with the correct value
        foreach($attributes as $key => $value)
            $template = str_replace("{{$key}}", $value, $template);
        
        // Create the file name and put the content in
        $fileName = $reflection->getShortName() . ".html";
        file_put_contents($fileName, $template);
    }
}
?>