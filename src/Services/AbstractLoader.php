<?php

namespace App\Services;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

abstract class AbstractLoader
{
    protected string $filename;
    protected array $content = [];

    public function __construct()
    {
        try {
            $this->content = Yaml::parseFile(dirname(__DIR__) . '/../config/' . $this->filename . '.yaml');
        } catch (ParseException $exception) {
            throw new \Exception(sprintf('Unable to parse the YAML file: %s', $exception->getMessage()));
        }
    }

    public function getContent(): array
    {
        return $this->content;
    }
}
