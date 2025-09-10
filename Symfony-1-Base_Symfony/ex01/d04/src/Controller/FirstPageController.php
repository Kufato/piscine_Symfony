<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstPageController extends AbstractController
{
    #[Route('/e00/firstpage', name: 'first_page')]
    public function first_page(): Response
    {
        return new Response('Hello World!');
    }
}