<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Entity\Commande;
use App\Form\SliderType;
use App\Repository\SpaRepository;
use App\Repository\SliderRepository;
use App\Repository\ChambreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(SliderRepository $repo): Response
    {

        $slider = $repo->findBy([],['ordre'=> 'ASC']);
        return $this->render('app/index.html.twig', [
           'sliders'=>$slider
        ]);
    }

    #[Route('/app/chambre', name: 'chambre')]
    public function chambres(ChambreRepository $repo): Response
    {
        $chambres = $repo->findAll();
        return $this->render('app/chambre.html.twig', [
            'chambres' =>$chambres
        ]);
    }
    #[Route('/app/restaurant', name: 'restaurant')]
    public function restau(): Response
    {
        return $this->render('app/restaurant.html.twig', [
            // 
        ]);
    }
    #[Route('/app/spa', name: 'spa')]
    public function spa(SpaRepository $repo): Response
    {
        $spas = $repo->findAll();
        return $this->render('app/spa.html.twig', [
            'spas' =>$spas
            
        ]);
    }
    #[Route('/app/avis', name: 'avis')]
    public function avis(): Response
    {
        return $this->render('app/avis.html.twig', [
            // 
        ]);
    }
    // #[Route('/app/hotel', name: 'hotel')]
    // public function hotel(): Response
    // {
    //     return $this->render('app/hotel.html.twig', [
    //         // 
    //     ]);
    // }
    #[Route('/app/actualite', name: 'actualite')]
    public function actu(): Response
    {
        return $this->render('app/actualite.html.twig', [
            // 
        ]);
    }
    #[Route('/app/reservation', name: 'reservation')]
    public function reser(): Response
    {
        return $this->render('app/reservation.html.twig', [
            // 
        ]);
    }
    #[Route('/app/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('app/contact.html.twig', [
            // 
        ]);
    }

    public function chambre(Chambre $chambre, Request $request, EntityManagerInterface $manager): Response
    {
        $commande = new Commande;

        $form = $this->createForm(CommandeType::class, $commande);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $interval = $commande->getDateArrivee()->diff($commande->getDateDepart());
            $days = $interval->days;
            if($interval->invert == 0 && $days > 0){
                $commande->setChambre($chambre)
            ->setDateEnregistrement(new \DateTime)
            ->setPrixTotal($days * $chambre->getPrixJournalier());
            $manager->persist($commande);
            $manager->flush();
            $this->addFlash( "success","Réservation valide" );
            return $this->redirectToRoute('home');
            }
            else{
                $this->addFlash( "danger","date de départ et d'arriver invalide" );
                return $this->redirectToRoute('chambres_detail', ['id' => $chambre->getId()]);
            }
            
        }

        return $this->render('reservation.html.twig', [
            'chambre' => $chambre,
            'form' => $form
        ]);
    }

    
}                                                                                                  





