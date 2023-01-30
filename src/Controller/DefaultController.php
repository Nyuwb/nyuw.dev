<?php

namespace App\Controller;

use App\Controller\AbstractMenuController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractMenuController
{
    #[Route('//', name: 'homepage')]
    #[Route('/{_locale}/', name: 'app_index', requirements: ['_locale' => '%app_locales%'])]
    public function index(): Response
    {
        return $this->render('pages/index.html.twig', [
            'controller_name' => 'DefaultController'
        ]);
    }
}
