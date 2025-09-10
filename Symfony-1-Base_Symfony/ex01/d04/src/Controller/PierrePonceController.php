<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PierrePonceController extends AbstractController
{
    #[Route('/e01/pierre_ponce', name: 'pierre_ponce_page')]
    public function pierre_ponce_page(): Response
    {
        return $this->render('articles/pierre_ponce.html.twig');
    }
}