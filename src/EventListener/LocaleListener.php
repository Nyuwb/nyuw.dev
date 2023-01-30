<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RouterInterface;

class LocaleListener
{
    private string $defaultLocale;
    private UrlMatcher $urlMatcher;

    public function __construct(RouterInterface $router, string $defaultLocale)
    {
        $this->defaultLocale = $defaultLocale;
        $this->urlMatcher = new UrlMatcher($router->getRouteCollection(), $router->getContext());
    }

    /**
     * Redirect the request if the locale parameter is not set
     */
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        if (!$request->get('_locale')) {
            try {
                $url = '/' . $this->defaultLocale . $request->getPathInfo();
                $this->urlMatcher->match($url);
                $event->setResponse(new RedirectResponse($url, 301));
            } catch (RouteNotFoundException | MethodNotAllowedException | ResourceNotFoundException $e) {
            }
        }
    }
}
