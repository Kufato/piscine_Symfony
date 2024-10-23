<?php
require_once 'TemplateEngine.php';

$templateEngine = new TemplateEngine();

$parameters = [
    'nom' => 'Le Petit Prince',
    'auteur'=> 'Antoine de Saint-Exupéry',
    'description' => 'Il y a six ans, j\'avais une panne dans le désert du Sahara. 
                    Quelque chose s\'était cassé dans mon moteur. 
                    Et comme je n\'avais avec moi ni mécanicien, ni passagers, je me préparai à essayer de réussir, tout seul, une réparation difficile. 
                    C\'était pour moi une question de vie ou de mort. J\'avais à peine de l\'eau à boire pour huit jours.
                    Le premier soir je me suis donc endormi sur le sable à mille milles de toute terre habitée. 
                    J\'étais bien plus isolé qu\'un naufragé sur un radeau au milieu de l\'océan. 
                    Alors vous imaginez ma surprise, au lever du jour, quand une drôle de petite voix m\'a réveillé. 
                    Elle disait:
                    - S\'il vous plaît... dessine-moi un mouton !
                    J\'ai sauté sur mes pieds comme si j\'avais été frappé par la foudre. J\'ai bien frotté mes yeux. 
                    J\'ai bien regardé. Et j\'ai vu un petit bonhomme tout à fait extraordinaire qui me considérait gravement. 
                    Je regardai donc cette apparition avec des yeux tout ronds d\'étonnement. 
                    N\'oubliez pas que je me trouvais à mille milles de toute région habitée. Quand je réussis enfin à parler, je lui dis:
                    - Mais... qu\'est-ce que tu fais là ?
                    Et il me répéta alors, tout doucement, comme une chose très sérieuse:
                    - S\'il vous plaît... dessine-moi un mouton...
                    Et c\'est ainsi que je fis la connaissance du petit prince.',
    'prix' => '7,5'
];

$templateEngine->createFile('le_petit_prince.html', 'book_description.html', $parameters);
?>