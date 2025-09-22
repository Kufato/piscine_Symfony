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

    #[Route('/e01/{slug}', name: 'main_page_redirect')]
    public function article(string $slug): Response
    {
        $articles = [
            'laos' => 'e01/articles/laos.html.twig',
            'pierre-ponce' => 'e01/articles/pierre_ponce.html.twig',
            'shrek' => 'e01/articles/shrek.html.twig',
        ];

        if (array_key_exists($slug, $articles)) {
            return $this->render($articles[$slug]);
        }

        return $this->render('main_page.html.twig');
    }
}