<?php

namespace Demo\TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrderItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amount')
            ->add('tax')
            ->add('quantity')
            ->add('total')
            ->add('product')
            ->add('purchaseorder')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Demo\TaskBundle\Entity\OrderItem'
        ));
    }

    public function getName()
    {
        return 'demo_taskbundle_orderitemtype';
    }
}
