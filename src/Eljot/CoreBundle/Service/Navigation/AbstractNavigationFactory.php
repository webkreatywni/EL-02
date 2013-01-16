<?php

namespace Eljot\CoreBundle\Service\Navigation;

use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\Request;

use Eljot\CoreBundle\Service\Navigation\NavigationBuilder;
use Eljot\CoreBundle\Model\NavigationPill;
use Eljot\CoreBundle\Service\Navigation\ActivePillResolverInterface;
use Eljot\CoreBundle\Service\Navigation\RoughActivePillResolver;

abstract class AbstractNavigationFactory
{
    /**
     * @var ActivePillResolverInterface
     */
    protected $activePillResolver;

    /**
     * @var NavigationBuilder
     */
    protected $builder;

    /**
     * @var Router
     */
    protected $router;

    abstract protected function buildNavigation($navigationData);

    abstract protected function getNavigationData();

    public function __construct(Router $router)
    {
        $this->builder = new NavigationBuilder();
        $this->router = $router;
        $this->buildNavigation($this->getNavigationData());
        $this->activePillResolver = $this->getDefaultActivePillResolver();
    }

    public function getNavigation(Request $request)
    {
        $pills = $this->builder->getPillsCollection();

        foreach ($pills as $pill) {
            $active = $this->isPillActive($pill, $request);
            $pill->setActive($active);
        }

        return $pills;
    }

    protected function isPillActive(NavigationPill $pill, Request $request)
    {
        return $this->activePillResolver->isPillActive($pill, $request, $this->router);
    }

    protected function generateUrl($route, $parameters)
    {
        try {
            $result = $this->router->generate($route, $parameters);

        } catch (\Exception $e) {
            echo $e->getMessage();die;
        }

        return $result;
    }

    public function setActivePillResolver(ActivePillResolverInterface $activePillResolver)
    {
        $this->activePillResolver = $activePillResolver;
    }

    /**
     * @return ActivePillResolverInterface
     */
    public function getDefaultActivePillResolver()
    {
        return new RoughActivePillResolver();
    }
}