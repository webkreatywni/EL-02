<?php

namespace Eljot\ManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Container;

use APY\DataGridBundle\Grid\Grid;
use Eljot\ManagerBundle\Entity\ProductOrder;
use Eljot\ManagerBundle\Form\ProductOrderType;
use Eljot\CoreBundle\Controller\CoreController;

/**
 * ProductOrder controller.
 *
 */
class ProductOrderController extends CoreController
{
    public function initialize(Request $request, Container $container)
    {
        parent::initialize($request, $container);
        $this->viewData['navigation'] = $container->get('eljot.manager.navigation.manager_navigation_factory')->getNavigation($request);
    }

    /**
     * Lists all ProductOrder entities.
     *
     */
    public function indexAction()
    {
        /**
         * @var Grid $grid
         */
        $grid = $this->get('eljot.manager.grid.product_order_grid_builder')->buildGrid($this->getRequest());
        return $grid->getGridResponse('EljotManagerBundle:ProductOrder:index.html.twig', $this->viewData);
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EljotManagerBundle:ProductOrder')->findAll();
        $this->viewData['entities'] = $entities;

        return $this->render('EljotManagerBundle:ProductOrder:index.html.twig', $this->viewData);
    }

    /**
     * Finds and displays a ProductOrder entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EljotManagerBundle:ProductOrder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductOrder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $this->viewData['entity'] = $entity;
        $this->viewData['delete_form'] = $deleteForm->createView();

        return $this->render('EljotManagerBundle:ProductOrder:show.html.twig', $this->viewData);
    }

    /**
     * Displays a form to create a new ProductOrder entity.
     *
     */
    public function newAction()
    {
        $entity = new ProductOrder();
        $form   = $this->createForm(new ProductOrderType(), $entity);

        $this->viewData['entity'] = $entity;
        $this->viewData['form'] = $form->createView();

        return $this->render('EljotManagerBundle:ProductOrder:new.html.twig', $this->viewData);
    }

    /**
     * Creates a new ProductOrder entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ProductOrder();
        $form = $this->createForm(new ProductOrderType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('order_show', array('id' => $entity->getId())));
        }

        $this->viewData['entity'] = $entity;
        $this->viewData['form'] = $form->createView();

        return $this->render('EljotManagerBundle:ProductOrder:new.html.twig', $this->viewData);
    }

    /**
     * Displays a form to edit an existing ProductOrder entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EljotManagerBundle:ProductOrder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductOrder entity.');
        }

        $editForm = $this->createForm(new ProductOrderType(), $entity);
        $deleteForm = $this->createDeleteForm($id);
        $this->viewData['entity'] = $entity;
        $this->viewData['edit_form'] = $editForm->createView();
        $this->viewData['delete_form'] = $deleteForm->createView();

        return $this->render('EljotManagerBundle:ProductOrder:edit.html.twig', $this->viewData);
    }

    /**
     * Edits an existing ProductOrder entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EljotManagerBundle:ProductOrder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductOrder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProductOrderType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('order_edit', array('id' => $id)));
        }

        $this->viewData['entity'] = $entity;
        $this->viewData['edit_form'] = $editForm->createView();
        $this->viewData['delete_form'] = $deleteForm->createView();

        return $this->render('EljotManagerBundle:ProductOrder:edit.html.twig', $this->viewData);
    }

    /**
     * Deletes a ProductOrder entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EljotManagerBundle:ProductOrder')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProductOrder entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('order'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
