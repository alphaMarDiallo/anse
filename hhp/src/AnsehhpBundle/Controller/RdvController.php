<?php

namespace AnsehhpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

use AnsehhpBundle\Entity\Rdv;

class RdvController extends Controller
{
    //GESTION DES RDV
    /**
     * @Route("/members/rdv", name="profileMember")
     */
    public function profileMemberAction()
    {
        $repo = $this->getDoctrine()->getRepository(Rdv::class);
        $rdv = $repo->findAll();

        $params = array(
            'rdv' => $rdv
        );

        return $this->render('@Ansehhp/Members/profileMember.html.twig', $params);
    }

}