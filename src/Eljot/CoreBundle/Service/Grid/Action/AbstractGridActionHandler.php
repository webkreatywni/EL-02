<?php
namespace Eljot\CoreBundle\Servcie\Grid\Action;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class AbstractGridActionHandler
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    abstract public function handleMassAction($keys, $actionAllKeys, Session $session, $params);

    public function getEntityManager()
    {
        return $this->getEntityManager;
    }
}