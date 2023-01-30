<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractMenuController
{
    #[Route('/{_locale}/projects', name: 'app_projects', requirements: ['_locale' => '%app_locales%'])]
    public function index(): Response
    {
        return $this->render('pages/projects.html.twig', [
            'controller_name' => 'ProjectsController',
        ]);
    }
}
