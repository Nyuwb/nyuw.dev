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
     * Calls render method from AbstractController and adds automatically the menuLoader to the parameters
     */
    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $parameters = array_merge($parameters, [
            'menuLoader' => $this->menuLoader
        ]);
        return parent::render($view, $parameters, $response);
    }
}
