<?php
require_once 'TemplateEngine.php';

$templateEngine = new TemplateEngine();

$parameters = [
    'nom' => 'Le Petit Prince',
    'auteur'=> 'Antoine de Saint-Exupéry',
    'description' => 'Un jeune prince parcourt les planètes, à la recherche de réponses aux grandes questions de la vie.',
    'prix' => '7,5',
];

$templateEngine->createFile('le_petit_prince.html', 'book_description.html', $parameters);
?>