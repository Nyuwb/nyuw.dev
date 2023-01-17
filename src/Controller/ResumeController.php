<?php

namespace App\Controller;

use App\Controller\AbstractMenuController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResumeController extends AbstractMenuController
{
    #[Route('/resume', name: 'app_resume')]
    public function index(): Response
    {
        return $this->render('resume/index.html.twig', [
            'controller_name' => 'ResumeController',
        ]);
    }
}
