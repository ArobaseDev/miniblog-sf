<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_articles_all', methods: ['GET'])]
    public function index(ArticleRepository $ar): Response
    {
        $allArticles = $ar->findAll();
        return $this->render('article/all.html.twig', [
            'articles' => $allArticles,
        ]);
    }

    #[Route('/a/{id}', name: 'app_article_show', methods: ['GET'])]
    public function show(int $id, ArticleRepository $ar, Request $request, EntityManagerInterface $em): Response
    {
        $article = $ar->findOneById($id);

        if (!$article) {
            throw $this->createNotFoundException('Article not found');
        }
//dd($article);
        return $this->render('article/show.html.twig', [
            'article' => $article,
        //    'authorArticle' => $nr->findByCreator($article->getAuthor()->getId()),
        ]);
    }
}
