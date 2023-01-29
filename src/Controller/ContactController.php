<?php

namespace App\Controller;

use App\Controller\AbstractMenuController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractMenuController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        return $this->render('pages/contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
