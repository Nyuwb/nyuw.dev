<?php

namespace App\Twig;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    protected ParameterBagInterface $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('other_locale', [$this, 'otherLocale']),
            new TwigFunction('locale_list', [$this, 'localeList']),
        ];
    }

    /**
     * Returns the list of available locales
     */
    public function localeList(): array
    {
        return explode('|', $this->params->get('app_locales'));
    }

    /**
     * Returns the remaining app locale
     */
    public function otherLocale(string $currentLocale): string
    {
        $otherLocale = array_diff(explode('|', $this->params->get('app_locales')), [$currentLocale]);
        return reset($otherLocale);
    }
}
