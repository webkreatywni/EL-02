<?php

namespace Eljot\CoreBundle\Service\Navigation;

use Doctrine\Common\Collections\ArrayCollection;
use Eljot\CoreBundle\Model\NavigationPill;

class NavigationBuilder
{
    protected $pillsCollection;

    public function __construct()
    {
        $this->pillsCollection = new ArrayCollection();
    }

    /**
     * @param  string            $name
     * @param  null|string       $url
     * @return NavigationBuilder
     */
    public function add($name, $url = null)
    {
        $navPill = new NavigationPill($name, $url);
        $this->pillsCollection->add($navPill);

        return $this;
    }

    /**
     * @param  string            $name
     * @return NavigationBuilder
     */
    public function addActive($name, $url = null)
    {
        $navPill = new NavigationPill($name, $url, true);
        $this->pillsCollection->add($navPill);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getPillsCollection()
    {
        return $this->pillsCollection;
    }

}