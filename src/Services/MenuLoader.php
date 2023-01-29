<?php

namespace App\Services;

use App\Services\AbstractLoader;

class MenuLoader extends AbstractLoader
{
    protected string $filename = 'menu';

    public function getRouteContent(string $route): array
    {
        $searchRoute = array_search($route, array_column($this->content['items'], 'route'));
        if ($searchRoute === false) {
            throw new \Exception(sprintf('The round has not been found: %s', $route));
        }
        return $this->content['items'][$searchRoute];
    }
}
