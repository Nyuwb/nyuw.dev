<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractMenuController
{
    #[Route('/projects', name: 'app_projects')]
    public function index(): Response
    {
        return $this->render('pages/projects.html.twig', [
            'controller_name' => 'ProjectsController',
        ]);
    }
}
