<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

abstract class AbstractLoader
{
    protected string $filename;
    protected array $content = [];
    protected string $route;

    public function __construct(RequestStack $requestStack)
    {
        try {
            $this->content = Yaml::parseFile(dirname(__DIR__) . '/../config/' . $this->filename . '.yaml');
            $this->route = $requestStack->getCurrentRequest()->get('_route');
        } catch (ParseException $exception) {
            throw new \Exception(sprintf('Unable to parse the YAML file: %s', $exception->getMessage()));
        }
    }

    public function getContent(): array
    {
        return $this->content;
    }
}
