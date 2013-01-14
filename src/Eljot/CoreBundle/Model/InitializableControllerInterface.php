<?php
namespace Eljot\CoreBundle\Model;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\Container;

interface InitializableControllerInterface
{
    public function initialize(Request $request, Container $container);
}