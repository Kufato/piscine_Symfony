<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LaosController extends AbstractController
{
    #[Route('/e01/laos', name: 'laos_page')]
    public function laos_page(): Response
    {
        return $this->render('articles/laos.html.twig');
    }
}