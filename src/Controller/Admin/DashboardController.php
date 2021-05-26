<?php

namespace App\Controller\Admin;


use App\Entity\Carouselhome;

use App\Controller\Admin\UserCrudController;
use App\Entity\Message;
use Symfony\Component\HttpFoundation\Response;


use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Routing\Annotation\Route;

use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
   
    /**
     * @Route("/admin", name="admin")
     */

    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());
        //return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('AML-PC Development');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Administration', 'fa fa-home', User::class);
        yield MenuItem::linkToCrud('Le Carousel Homepage', 'far fa-images', Carouselhome::class);
        yield MenuItem::linkToCrud('Les Messages reçus', 'far fa-envelope', Message::class);
    }
}
