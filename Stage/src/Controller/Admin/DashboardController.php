<?php

namespace App\Controller\Admin;

use App\Entity\Communaute;
use App\Entity\Onboarding;
use App\Entity\Tutorial;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Asset;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UtilisateurCrudController::class)->generateUrl());
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureAssets(): Assets
    {
        return Assets::new()
        ->addCssFile('assets/css/admin.css');

        // ->addJsFile(Asset::new('js/custom.js'));

    }

    public function configureCrud(): Crud
    {
        return Crud::new()
            ->renderContentMaximized()//ca c'est pour prendre tout l'espace du trvail
            ->showEntityActionsInlined();//ca c'est pour afficher supprimer et editer dans tout les crud
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Beguide Administration')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fa-regular fa-user', Utilisateur::class);
        yield MenuItem::linkToCrud('Onboarding', 'fa-solid fa-table', Onboarding::class);
        yield MenuItem::linkToCrud('Tutoriel', 'fa-solid fa-lines-leaning', Tutorial::class);
        yield MenuItem::linkToCrud('Communauté', 'fa-solid fa-people-group', Communaute::class);
    }
}
