<?php

namespace Eljot\UserBundle\Controller;

use Eljot\CoreBundle\Controller\CoreController;

class UserController extends CoreController
{
    public function indexAction($name = 'Marian')
    {
        return $this->render('EljotUserBundle:User:index.html.twig', array('name' => $name));
    }
}