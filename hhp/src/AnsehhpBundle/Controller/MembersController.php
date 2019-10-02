<?php

namespace AnsehhpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AnsehhpBundle\Entity\Members;



class MembersController extends Controller
{
    //GESTION DU PROFIL MEMBRE
    /**
     * @Route("/members/profileMember/{idMember}", name="profileMember")
     */
    public function profileMemberAction($id)
    {
        $repo = $this->getDoctrine()->getRepository(Members::class);
        $members = $repo->find($id);

        $params = array(
            'members' => $members
        );

        return $this->render('@Ansehhp/Members/profileMember.html.twig', $params);
    }
    //GESTION DE MISE A JOUR DE'UN MEMBRE
    /**
     * @Route("/admin/adminMemberUpdate/{idMember}", name="adminMemberUpdate")
     */
    public function adminMemberUpdateAction($idMember)
    {
        $repo = $this->getDoctrine()->getRepository(Members::class);
        $members = $repo->find($idMember);

        $params = array(
            'idMember' => $idMember,
            'members' => $members
        );

        return $this->render('@Ansehhp/Members/profileMember.html.twig', $params);
    }
    //SUPPRESSION D'UN MEMBRE
    /**
     * @Route("/admin/adminMemberDelete/{idMember}", name="adminMemberDelete")
     */
    public function adminMemberDeleteAction($idMember, Request $request)
    {

        $params = array();
        $request->getSession()->getFlashBag()->add('success', 'Le patient N°' . $idMember . 'a bien été supprimé');


        return $this->redirecToRoute('home/index.html.twig');
    }
     

}