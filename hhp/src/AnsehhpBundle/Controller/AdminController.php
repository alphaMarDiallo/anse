<?php

namespace AnsehhpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

use AnsehhpBundle\Entity\Members;
use AnsehhpBundle\Entity\Articles;



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

    //GESTION DU PROFIL MEMBRE
    /**
     * @Route("/admin/adminProfileMember/{id}", name="adminProfileMember")
     */
    public function adminProfileMemberAction($id)
    {
        $repo = $this->getDoctrine()->getRepository(Members::class);
        $members = $repo->find($id);

        $params = array(
            'members' => $members
        );

        return $this->render('@Ansehhp/Admin/adminProfileMember.html.twig', $params);
    }
    
    //GESTION DE MISE A JOUR DE'UN MEMBRE
    /**
     * @Route("/admin/adminMemberUpdate/{idMember}", name="adminMemberUpdate")
     */ 
     public function adminMemberUpdateAction($idMember)
     {
         $repo=$this->getDoctrine()->getRepository(Members::class);
         $members = $repo->find($idMember);

         $params =array(
             'idMember'=>$idMember,
             'members'=>$members
         );

         return $this->render('@Ansehhp/Members/adminMemberUpdate.html.twig', $params);
     }
    //SUPPRESSION D'UN MEMBRE
    /**
     * @Route("/admin/adminMemberDelete/{idMember}", name="adminMemberDelete")
     */ 
     public function adminMemberDeleteAction($idMember, Request $request)
     {
    
         $params =array();
             $request->getSession()->getFlashBag()->add('success', 'Le patient N°'.$idMember.'a bien été supprimé');
         

         return $this->redirecToRoute('admin/allMembers');
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
    /**
     * @Route("/admin/adminArt/{idArticle}", name="adminArt")
     */
    public function adminArtAction($idArticle)
    {
        $repo = $this->getDoctrine()->getRepository(Articles::class);
        $article = $repo->find($idArticle);

        $params = array(
            'idArticle' => $idArticle,
            'article' => $article
        );


        return $this->render('@Ansehhp/Admin/adminArt.html.twig', $params);
    }
}// FIN class AdminController