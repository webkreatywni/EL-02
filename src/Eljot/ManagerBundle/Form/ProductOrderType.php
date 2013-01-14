<?php

namespace Eljot\ManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductOrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model')
            ->add('invoice')
            ->add('ebay')
            ->add('color')
            ->add('is_seat')
            ->add('frame')
            ->add('extra')
            ->add('wheels')
            ->add('client')
            ->add('dateOfReceipt')
            ->add('dateOfPayment')
            ->add('updateTime')
            ->add('insertTime')
            ->add('readyToReceipt')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eljot\ManagerBundle\Entity\ProductOrder'
        ));
    }

    public function getName()
    {
        return 'eljot_managerbundle_productordertype';
    }
}
