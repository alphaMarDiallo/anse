<?php

namespace AnsehhpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AnsehhpBundle\Entity\Members;
use AnsehhpBundle\Form\MembersType;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MembersController extends Controller
{
    //GESTION DU PROFIL MEMBRE
    /**
     * @Route("/members/profileMember/{idMember}", name="profileMember")
     */
    public function profileMemberAction($idMember)
    {
        $repo = $this->getDoctrine()->getRepository(Members::class);
        $members = $repo->find($idMember);

        $params = array(
            'idMember' => $idMember,
            'members' => $members
        );

        return $this->render('@Ansehhp/Members/profileMember.html.twig', $params);
    }
}