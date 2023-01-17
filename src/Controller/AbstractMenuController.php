<?php

namespace App\Controller;

use App\Services\MenuLoader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class AbstractMenuController extends AbstractController
{
    protected $menuLoader;

    public function __construct(MenuLoader $menuLoader)
    {
        $this->menuLoader = $menuLoader;
    }
}
