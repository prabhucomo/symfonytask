<?php

namespace Demo\TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('itenname')
            ->add('costprice')
            ->add('unitprice')
            ->add('promoprice')
            ->add('location')
            ->add('description')
            ->add('quantity')
            ->add('category')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Demo\TaskBundle\Entity\Product'
        ));
    }

    public function getName()
    {
        return 'demo_taskbundle_producttype';
    }
}
