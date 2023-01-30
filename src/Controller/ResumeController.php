<?php

namespace App\Controller;

use App\Controller\AbstractMenuController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResumeController extends AbstractMenuController
{
    #[Route('/{_locale}/resume', name: 'app_resume', requirements: ['_locale' => '%app_locales%'])]
    public function index(): Response
    {
        return $this->render('pages/resume.html.twig', [
            'controller_name' => 'ResumeController',
        ]);
    }
}
