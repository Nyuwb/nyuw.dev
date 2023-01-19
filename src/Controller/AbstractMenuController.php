<?php

namespace App\Controller;

use App\Services\MenuLoader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractMenuController extends AbstractController
{
    protected $menuLoader;

    public function __construct(MenuLoader $menuLoader)
    {
        $this->menuLoader = $menuLoader;
    }

    /**
     * Appelle la méthode render de AbstractController en y ajoutant par défaut le menu
     */
    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $parameters = array_merge($parameters, [ 'menuLoader' => $this->menuLoader ]);
        return parent::render($view, $parameters, $response);
    }
}
