<?php

namespace Demo\TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PurchaseOrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status')
            ->add('order_date')
            ->add('customer')
            ->add('product', null, array('by_reference' => false, 'expanded' => true, 'compound' => true))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Demo\TaskBundle\Entity\PurchaseOrder'
        ));
    }

    public function getName()
    {
        return 'demo_taskbundle_purchaseordertype';
    }
}
