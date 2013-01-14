<?php

namespace Eljot\CoreBundle\Controller;

use Eljot\CoreBundle\Model\InitializableControllerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityManager;

class CoreController extends Controller implements InitializableControllerInterface
{
    protected $viewData;

    /**
     * Returns session object
     * @return Session
     */
    protected function getSession()
    {
        return $this->get('session');
    }

    /**
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        return $this->getDoctrine()->getEntityManager();
    }

    /**
     * @return \Inhouse\MigrationBundle\Service\EmailManager
     */
    protected function getEmailManager()
    {
        return $this->get('inhouse.migration.email.manager');
    }

    public function initialize(Request $request, Container $container)
    {
        $this->viewData = array();
    }
}