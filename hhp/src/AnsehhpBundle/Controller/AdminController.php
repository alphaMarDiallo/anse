<?php

namespace AnsehhpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AnsehhpBundle\Entity\Members;
use AnsehhpBundle\Entity\Articles;
// use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller
{


    //Accueil ADMIN
    /**
     * @Route("/admin/admin_index", name="admin_index")
     */
    public function adminIndexAction()
    {

        return $this->render('@Ansehhp/Admin/adminIndex.html.twig');
    }
    //GESTION DES MEMBRES
    /**
     * @Route("/admin/allMembers", name="allMembers")
     */
    public function allMembersAction()
    {

        $repository = $this->getDoctrine()->getRepository(Members::class);

        $members = $repository->findAll();

        $params = array(
            'members' => $members

        );

        return $this->render('@Ansehhp/Admin/allMembers.html.twig', $params);
    }

    //GESTION PROFIL MEMBRE
    /**
     * @Route("/admin/profileMember", name="profileMember")
     */
    public function profileMembersAction()
    {
        return $this->render('@Ansehhp/Admin/profileMember.html.twig');
    }

    //GESTION DES ARTICLES
    /**
     * @Route("/admin/showArticles", name="showArticles")
     */
    public function showArticlesAction()
    {
        $repository = $this->getDoctrine()->getRepository(Articles::class);

        $articles = $repository->findAll();

        $params = array(
            'articles' => $articles

        );

        return $this->render('@Ansehhp/Admin/showArticles.html.twig', $params);
    }
}// FIN class AdminController