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
    /**
     * @Route("/membre/inscription/", name="membre_inscription")
     */
    // public function inscriptionMemberAction(Request $request, UserPasswordEncoderInterface $encoder)
    // {

    //     $member = new Members;

    //     $form = $this->createForm(
    //         MembersType::class,
    //         $member
    //     );

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $em = $this->getDoctrine()->getManager();

    //         $em->persist($member);
    //         $member->setStatut('0');

    //         $password = $member->getPassword();
    //         // password saisi dans le formulaire

    //         $password_crypte = $encoder->encodePassword($member, $password);

    //         $member->setPassword($password_crypte);
    //         // cryptage du password

    //         $member->setSalt(NULL);
    //         $member->setRoles(['ROLE_USER']);

    //         $em->flush();
    //         // je l' enregistre puis execute vers la bdd

    //         $request->getSession()->getFlashBag()->add('success', $member->getNom() . ' vous avez réussi votre inscription !');
    //         // message de validation

    //         return $this->redirectToRoute('connexion');
    //         // redirection 
    //     }

    //     $params = array(
    //         'memberForm' => $form->createView(),
    //     );
    //     return $this->render('@Ansehhp/Members/suscribe.html.twig', $params);
    // }



    /**
     * @Route("/membre/profil/", name="membre_profil")
     */
    public function profileMemberAction()
    {
        $params = array();
        return $this->render('@Ansehhp/Members/memberProfile.html.twig', $params);
    }
}