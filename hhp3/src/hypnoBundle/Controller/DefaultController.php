<?php

namespace hypnoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="Accueil")
     */
    public function indexAction()
    {
        return $this->render('@hypno/Default/index.html.twig');
    }
}