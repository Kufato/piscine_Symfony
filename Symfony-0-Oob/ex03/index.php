<?php
include 'Elem.php';
include 'TemplateEngine.php';

$html = new Elem('html');
$head = new Elem('head');
$title = new Elem('title', 'Ma Page Web');
$body = new Elem('body');
$header = new Elem('h1', 'Bienvenue sur ma page');
$paragraph = new Elem('p', '意にぐうげ中終トゆ齢問イマムロ横果ム告査く第浦トあと様画アラ健声経せ香字び最京59域ノ詳些づっけ。1止ル本際タ思要感くず愛何旨フ京供26社づ供師モタム康観ヨチ軽敵ゃゅ運唐寒桐たゃ。3著専ぼ棋美ヒユ例要ワテニノ連応野ぴっぞ主作カクフヒ無東ラとめの講料メシ心有フ現転びへ聞業年ゆ航妻描待だたトご。');

$head->pushElement($title);
$body->pushElement($header);
$body->pushElement($paragraph);
$html->pushElement($head);
$html->pushElement($body);

$templateEngine = new TemplateEngine($html);
$templateEngine->createFile('japanese.html');
?>