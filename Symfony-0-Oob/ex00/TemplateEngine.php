<?php
    class TemplateEngine
    {
        public function createFile($fileName, $templateName, $parameters)
        {
            $templateContent = file_get_contents($templateName);
            foreach($parameters);
        }
    }
?>