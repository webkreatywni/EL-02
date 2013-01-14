<?php
namespace Eljot\ManagerBundle\Service\Grid;

use Eljot\CoreBundle\Service\Grid\AbstractGridBuilder;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Action\RowAction;

class ProductOrderGridBuilder extends AbstractGridBuilder
{
    /**
     * Allow to customize grid before returning its instance
     */
    protected function applyCustomOptions()
    {
        $source = new Entity('EljotManagerBundle:ProductOrder');
        $this->grid->setId('product-order');
        $this->grid->setSource($source);
        $showAction = new RowAction('label.action.read', 'order_show', null, null, array('class' => $this->defaultOptions['row_action_class']));
        $updateAction = new RowAction('label.action.update', 'order_edit', null, null, array('class' => $this->defaultOptions['row_action_class']));
        $this->grid->addRowAction($showAction);
        $this->grid->addRowAction($updateAction);
        $this->grid->hideColumns(array(
            'id',
            'model',
            'invoice',
            'ebay',
            'color',
            'isSeat',
            'frame',
            'wheels',
            'extra',
            'client',
            'dateOfReceipt',
            'dateOfPayment',
            'updateTime',
            'insertTime',
        ));
    }

}
