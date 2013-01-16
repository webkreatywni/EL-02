<?php

namespace Eljot\CoreBundle\Model;

class NavigationPill
{
    protected $name;
    protected $url;
    protected $active;

    public function __construct($name, $url = null, $active = false)
    {
        $this->name = $name;
        $this->url = $url;
        $this->active = (bool) $active;
    }

    public function isActive()
    {
        return $this->active;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setActive($active = false)
    {
        $this->active = $active;
    }
}