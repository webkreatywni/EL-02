<?php

namespace Eljot\CoreBundle\Service\Grid;

use APY\DataGridBundle\Grid\Grid;
use Doctrine\ORM\EntityManager;
use Eljot\CoreBundle\Servcie\Grid\Action\AbstractGridActionHandler;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractGridBuilder
{
    /**
     * @var Request
     */
    protected $request;

    protected $defaultOptions;

    /**
     * @var Grid
     */
    protected $grid;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var AbstractGridActionHandler
     */
    protected $massActionHandler;

    public function __construct(Grid $grid, EntityManager $entityManager, $options)
    {
        $this->entityManager = $entityManager;
        $this->grid = $grid;
        $this->defaultOptions = $options;
    }

    /**
     * Allow to customize grid before returning its instance
     */
    abstract protected function applyCustomOptions();

    public function setMassActionHandler(AbstractGridActionHandler $massActionHandler)
    {
        $this->massActionHandler = $massActionHandler;
    }

    /**
     * Applies default configruation
     */
    protected function applyGridDefaults()
    {
        $this->grid->setLimits($this->defaultOptions['limits']);
        $this->grid->setPage($this->defaultOptions['page']);
    }

    /**
     * Builds and configures grid
     * @return Grid
     */
    public function buildGrid(Request $request)
    {
        $this->request = $request;

        $this->applyGridDefaults();
        $this->applyCustomOptions();

        return $this->grid;
    }
}