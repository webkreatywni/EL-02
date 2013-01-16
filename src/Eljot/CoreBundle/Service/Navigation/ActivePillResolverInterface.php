<?php
namespace Eljot\CoreBundle\Service\Navigation;

use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Eljot\CoreBundle\Model\NavigationPill;

interface ActivePillResolverInterface
{
    public function isPillActive(NavigationPill $pill, Request $request, Router $router);
}
