<?php
//Gestion de des pages "show_article" & "article"
namespace AnsehhpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
        return $this->render('@Ansehhp/Articles/articles.html.twig',$params);
    }

    /**
     * @Route("/articles/art", name="art")
     */
    public function showArtAction()
    {
        return $this->render('@Ansehhp/Articles/art.html.twig');
    }
}