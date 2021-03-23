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
     * @Route("/devis1", name="forme")
     */
    public function devis(Request $request): Response
    {
        $session = $request->getSession();
        $maReponse = $session->get('maReponse');
        if (isset($maReponse))

        return $this->render('site/forme.html.twig', [
            'controller_name' => 'SiteController',
        ]);


    }

    /**
     * @Route("/devis2", name="fond")
     */
    public function next(): Response
    {
        return $this->render('site/fond.html.twig', [
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

    /**
     * @Route("/reponse/{choix}", name="reponse")
     */
    public function add($choix, Request $request){

        $session->set('reponse', $choix);
        dd($session->get('reponse'));


    }
}
