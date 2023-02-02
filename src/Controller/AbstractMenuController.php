<?php

namespace App\Controller;

use App\Entity\Social;
use App\Services\MenuLoader;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractMenuController extends AbstractController
{
    protected MenuLoader $menuLoader;
    /** @var Social[] */
    protected array $socials;
    protected string $route;

    public function __construct(RequestStack $requestStack, ManagerRegistry $doctrine, MenuLoader $menuLoader)
    {
        $this->menuLoader = $menuLoader;
        $this->route = $requestStack->getCurrentRequest()->get('_route');
        // Loading socials from Database
        $this->socials = $doctrine->getRepository(Social::class)->findAll();
    }

    /**
     * Calls render method from AbstractController and adds automatically the menuLoader
     * and the socialLoader to the parameters
     */
    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $parameters = array_merge($parameters, [
            'menu' => $this->menuLoader->getContent(),
            'socials' => $this->socials,
            'current_page' => $this->menuLoader->getRouteContent($this->route)
        ]);
        return parent::render($view, $parameters, $response);
    }
}
