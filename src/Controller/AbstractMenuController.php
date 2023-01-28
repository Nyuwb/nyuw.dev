<?php

namespace App\Controller;

use App\Services\MenuLoader;
use App\Services\SocialLoader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractMenuController extends AbstractController
{
    protected array $menu;
    protected array $socials;

    public function __construct(MenuLoader $menuLoader, SocialLoader $socialLoader)
    {
        $this->menu = $menuLoader->getContent();
        $this->socials = $socialLoader->getContent();
    }

    /**
     * Calls render method from AbstractController and adds automatically the menuLoader
     * and the socialLoader to the parameters
     */
    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $parameters = array_merge($parameters, [
            'menu' => $this->menu,
            'socials' => $this->socials
        ]);
        return parent::render($view, $parameters, $response);
    }
}
