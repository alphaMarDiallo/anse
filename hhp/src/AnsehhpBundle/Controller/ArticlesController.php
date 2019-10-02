<?php
//Gestion de des pages "show_article" & "article"
namespace AnsehhpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AnsehhpBundle\Entity\Articles;

class ArticlesController extends Controller
{
    /**
     * @Route("/articles/articles", name="articles")
     */
    public function showArticlesAction()
    {
        $repository = $this->getDoctrine()->getRepository(Articles::class);

        $articles = $repository->findAll();

        $params = array(
            'articles' => $articles

        );
        return $this->render('@Ansehhp/Articles/articles.html.twig', $params);
    }

    /**
     * @Route("/articles/art/{idArticle}", name="art")
     */
    public function showArtAction($idArticle)
    {
        $repo = $this->getDoctrine()->getRepository(Articles::class);
        $article = $repo->find($idArticle);

        $params = array(
            'idArticle' => $idArticle,
            'article' => $article
        );


        return $this->render('@Ansehhp/Articles/art.html.twig', $params);
    }
}