<?php

namespace App\Services;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

/**
 * Chargement du contenu du menu
 */
class MenuLoader
{
    private array $menu;

    public function __construct()
    {
        try {
            $this->menu = Yaml::parseFile(dirname(__DIR__) . '/../config/menu.yaml');
        } catch (ParseException $exception) {
            printf('Unable to parse the YAML string: %s', $exception->getMessage());
        }
    }

    public function getMenu(): array
    {
        return $this->menu;
    }
}
