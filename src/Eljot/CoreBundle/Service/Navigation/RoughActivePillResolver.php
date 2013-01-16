<?php
namespace Eljot\CoreBundle\Service\Navigation;

use Eljot\CoreBundle\Service\Navigation\ActivePillResolverInterface;
use Eljot\CoreBundle\Model\NavigationPill;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

class RoughActivePillResolver implements ActivePillResolverInterface
{
    public function isPillActive(NavigationPill $pill, Request $request, Router $router)
    {
        $currentUrl = $router->generate($request->attributes->get('_route'), $request->attributes->get('_route_params'));

        return (strstr($currentUrl, $pill->getUrl()) != false);
    }
}