<?php
require_once 'HotBeverage.php';
require_once 'Coffee.php';
require_once 'Tea.php';
require_once 'TemplateEngine.php';

$coffee = new Coffee(1.73, 3.92, "A hot and energizing beverage.", "Better with cream");
$tea = new Tea(0.75, 2.38, "A calming and soothing drink.", "Better with sugar");

$templateEngine = new TemplateEngine();
$templateEngine->createFile($coffee);
$templateEngine->createFile($tea);
?>