<?php
require_once 'TemplateEngine.php';
require_once 'Text.php';

$text = new Text([
    'J’ai acheté ce livre pour mon fils et il a adoré ! Le livre contient quelque illustration intéressante et enseigne de bonne chose je recommande pour vos enfants ou pour les adultes qui souhaitent faire un voyage dans le passé.',
    'Super livre je recommande vivement à votre enfant'
]);

$text->append('Ouais pas mal...');

$templateEngine = new TemplateEngine();

$templateEngine->createFile('le_petit_prince.html', $text);
?>