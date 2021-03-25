<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/devisForme1", name="forme")
     */
    public function devis(): Response
    {
        return $this->render('site/forme.html.twig', [
            'controller_name' => 'SiteController',
        ]);


    }

    /**
     * @Route("/devisFond2", name="fond")
     */
    public function fond(): Response
    {
        return $this->render('site/fond.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/devisCouleur3", name="couleur")
     */
    public function couleur(): Response
    {
        return $this->render('site/couleur.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/devisTailleRect4", name="tailleRect")
     */
    public function tailleRect(): Response
    {
        return $this->render('site/tailleRect.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('site/contact.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

}
