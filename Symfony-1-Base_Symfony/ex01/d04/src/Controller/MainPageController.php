<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    #[Route('/e01', name: 'main_page')]
    public function main_page(): Response
    {
        return $this->render('main_page.html.twig');
    }

    #[Route('/e01/{slug}',name: 'main_page_redirect',requirements: ['slug' => '^(?!pierre_ponce$|shrek$|laos$).+'])]
    public function article(string $slug): Response
    {
        return $this->render('main_page.html.twig');
    }
}
