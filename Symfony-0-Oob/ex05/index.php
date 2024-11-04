<?php
include 'Elem.php';
include 'TemplateEngine.php';

$elem = new Elem('html');

$head = new Elem('head');
$head->pushElement(new Elem('meta', null, ['charset' => 'UTF-8']));
$head->pushElement(new Elem('title', 'Exemple de page valide'));

$elem->pushElement($head);

$body = new Elem('body');
$paragraph = new Elem('p', 'Ceci est un paragraphe simple.');
$body->pushElement($paragraph);

$orderedList = new Elem('ol');
$orderedList->pushElement(new Elem('li', 'Élément de liste 1'));
$orderedList->pushElement(new Elem('li', 'Élément de liste 2'));
$body->pushElement($orderedList);

$elem->pushElement($body);

if ($elem->validPage())
    echo "The page is valid";
else
    echo "Error: the page is not valid";

$template = new TemplateEngine($elem);
$template->createFile("output.html");
?>
