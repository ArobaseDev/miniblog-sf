<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home', methods: ['GET'])]
    public function index(ArticleRepository $ar): Response
    {
        $lastArticles = $ar->findLatestSix();
        return $this->render('home/index.html.twig', [
            'lastArticles' => $lastArticles
        ]);
    }
}
