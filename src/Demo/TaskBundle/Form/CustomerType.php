<?php

namespace Demo\TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('emailaddress')
            ->add('phonenumber')
            ->add('addressline1')
            ->add('addressline2')
            ->add('state')
            ->add('zip')
            ->add('country')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Demo\TaskBundle\Entity\Customer'
        ));
    }

    public function getName()
    {
        return 'demo_taskbundle_customertype';
    }
}
