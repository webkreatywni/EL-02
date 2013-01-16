<?php
namespace Eljot\ManagerBundle\Service\Navigation;

use Eljot\CoreBundle\Service\Navigation\AbstractNavigationFactory;
use Eljot\CoreBundle\Service\Navigation\RoughActivePillResolver;

class ManagerNavigationFactory extends AbstractNavigationFactory
{
    protected function getNavigationData()
    {
        return array(
            array(
                'name' => 'product_order.action.new',
                'route' => 'order_new',
                'parameters' => array()
            ),
            array(
                'name' => 'product_order.action.list',
                'route' => 'order',
                'parameters' => array()
            )
        );
    }

    protected function buildNavigation($navigationData)
    {
        foreach ($navigationData as $part) {
            $url = $this->generateUrl($part['route'], $part['parameters']);
            $this->builder->add($part['name'], $url);
        }
    }

    public function getDefaultActivePillResolver()
    {
        return new RoughActivePillResolver();
    }
}