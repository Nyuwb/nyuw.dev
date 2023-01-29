<?php

namespace App\Controller;

use App\Services\MenuLoader;
use App\Services\SocialLoader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractMenuController extends AbstractController
{
    protected MenuLoader $menuLoader;
    protected SocialLoader $socialLoader;
    protected string $route;

    public function __construct(RequestStack $requestStack, MenuLoader $menuLoader, SocialLoader $socialLoader)
    {
        $this->menuLoader = $menuLoader;
        $this->socialLoader = $socialLoader;
        $this->route = $requestStack->getCurrentRequest()->get('_route');
    }

    /**
     * Calls render method from AbstractController and adds automatically the menuLoader
     * and the socialLoader to the parameters
     */
    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $parameters = array_merge($parameters, [
            'menu' => $this->menuLoader->getContent(),
            'socials' => $this->socialLoader->getContent(),
            'current_page' => $this->menuLoader->getRouteContent($this->route)
        ]);
        return parent::render($view, $parameters, $response);
    }
}
