<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShrekController extends AbstractController
{
    #[Route('/e01/shrek', name: 'shrek_page')]
    public function shrek_page(): Response
    {
        return $this->render('articles/shrek.html.twig');
    }
}