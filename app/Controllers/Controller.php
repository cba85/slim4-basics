<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;

class Controller
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __get($key)
    {
        if ($key == 'container')
        {
            return $this->container;
        }
        return $this->container->get($key);
    }
}