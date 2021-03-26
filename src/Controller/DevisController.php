<?php


namespace App\Controller;


use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DevisController extends AbstractController
{


    /**
     * @Route("/etapeVersFond" , name="Devis-fond")
     * @param SessionInterface $session
     * @return null
     */
    public function etapeVersFondAction(SessionInterface $session, Request $request)
    {
        $forme_piscine = $request->request->get("choix1", "rectangulaire");

        $session->set('forme', $forme_piscine);

        return $this->render('site/fond.html.twig');
    }

    /**
     * @Route("/etapeVersCouleur" , name="Devis-couleur")
     * @param Request $request
     * @return null
     */
    public function etapeVersCouleurAction(SessionInterface $session, Request $request)
    {

        $fond_piscine = $request->request->get("choix2", "plate");

        $session->set('fond', $fond_piscine);

        return $this->render('site/couleur.html.twig');
    }

    /**
     * @Route("/etapeVersTaille" , name="Devis-taille")
     * @param Request $request
     * @return null
     */
    public function etapeVersTailleAction(SessionInterface $session, Request $request)
    {

        $couleur_piscine = $request->request->get("choix3", "blanc");

        $session->set('couleur', $couleur_piscine);

        $forme = $session->get('forme');


        if ($forme == "rectangulaire") {
            return $this->render('site/tailleRect.html.twig');
        } else if ($forme == "ronde") {
            return $this->render('site/tailleRond.html.twig');
        }
    }

    /**
     * @Route("/etapeVersOption" , name="Devis-option")
     * @param Request $request
     * @return null
     */
    public function etapeVersOptionAction(SessionInterface $session, Request $request)
    {

        $largeur = $request->request->get("largeur", 0);
        $longueur = $request->request->get("longueur", 0);
        $diametre = $request->request->get("diametre", 0);


        if ($largeur != 0) $session->set('largeur', $largeur);
        if ($longueur != 0) $session->set('longueur', $longueur);
        if ($diametre != 0) $session->set('diametre', $diametre);


        return $this->render('site/options.html.twig');


    }

    /**
     * @Route("/envoiDevis" , name="envoiDevis")
     * @return Response
     */
    public function envoieDevisAction(SessionInterface $session, Request $request,\Swift_Mailer $mailer)
    {

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        $forme = $session->get('forme');
        $fond = $session->get('fond');
        $couleur = $session->get('couleur');

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            // ici on envoi me mail
            $message = (new \Swift_Message('Votre Devis - TOPISCINES'))

                // On attribue l'expéditeur
                ->setFrom('trochon.arthur@gmail.com')

                // On attribue le destinataire
                ->setTo($contact['email'])

                // On attribue le message avec la vue Twig
                ->setBody(
                    $this->renderView('emails/contact.html.twig', compact('contact', 'forme', 'fond', 'couleur')),
                    'text/html'
                );

            // On envoie le message
            $mailer->send($message);

            $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi
            return $this->redirectToRoute('accueil');
        }


        return $this->render('site/envoiDevis.html.twig', [
            'devisForm' => $form->createView()
        ]);
    }


}