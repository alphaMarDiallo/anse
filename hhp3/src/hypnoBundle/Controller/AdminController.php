<?php

namespace hypnoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends Controller
{
    /*=================================== ACCUEIL ADMIN  ===================================*/
    /**
     * @Route("/dash", name="dashboard")
     */
    public function dashboardAction()
    {
        return $this->render('@hypno/dash/dashboard.html.twig');
    }
    /*=================================== LISTE DES PATIENTS  ===================================*/
    /**
     * @Route("/dash/patients", name="patients")
     */
    public function patientsAction()
    {
        return $this->render('@hypno/dash/patients.html.twig');
    }
    /*=================================== FICHE D'UN PATIENT  ===================================*/
    /**
     * @Route("/dash/patientProfile", name="patient-profile")
     */
    public function patientProfileAction()
    {
        return $this->render('@hypno/dash/patientProfile.html.twig');
    }
    /*=================================== LISTE DES ARTICLES  ===================================*/
    /**
     * @Route("/dash/articles", name="articles")
     */
    public function articlesAction()
    {
        return $this->render('@hypno/dash/articles.html.twig');
    }
    /*=================================== GESTION D'UN ART  ===================================*/
    /**
     * @Route("/dash/art", name="art")
     */
    public function artAction()
    {
        return $this->render('@hypno/dash/art.html.twig');
    }
}