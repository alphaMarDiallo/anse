<?php

namespace AnsehhpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AnsehhpBundle\Entity\Members;


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
     * @Route("/admin/all_members", name="all_members")
     */
    public function allMembersAction()
    {

        $repository = $this->getDoctrine()->getRepository(Members::class);
         
        $members = $repository->findAll();
        
        $params = array(
        'membres' => $members
        
        );

        return $this->render('@Ansehhp/Admin/allMembers.html.twig');
    }

    //GESTION PROFIL MEMBRE
    /**
     * @Route("/admin/profile_member", name="profile_member")
     */
    public function profileMembersAction()
    {
        return $this->render('@Ansehhp/Admin/profileMember.html.twig');
    }

    //GESTION DES ARTICLES
    /**
     * @Route("/admin/show_articles", name="show_articles")
     */
    public function showArticlesAction()
    {
        return $this->render('@Ansehhp/Admin/showArticles.html.twig');
    }
}