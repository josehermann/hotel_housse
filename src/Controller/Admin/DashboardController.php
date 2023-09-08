<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Slider;
use App\Entity\Chambre;
use App\Entity\Commande;
use App\Entity\Spa;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // !Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        //! (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        
        return $this->render('admin/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hotelhouse');
    }

    public function configureMenuItems(): iterable
    {
        //  yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        return [
        MenuItem::linkToDashboard('accueil', 'fa-solid fa-house'),
        MenuItem::section('Membre'),
    
        MenuItem::section('Utilisateurs', 'fas fa-user', User::class),
        MenuItem::subMenu('Gestion', 'fa fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('Chambre', 'fa fa-book', Chambre::class),
            MenuItem::linkToCrud('Commande', 'fa fa-comment', Commande::class),
            MenuItem::linkToCrud('Slider', 'fa fa-layer-group', Slider::class),
            MenuItem::linkToCrud('Spa', 'fa fa-book', Spa::class),
        ]),
        
        MenuItem::section('retour au site'),
        MenuItem::linkToRoute('Accueil du site', 'fa fa-igloo', 'accueil'),

        ];
    }
}
