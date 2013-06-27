<?php

namespace Demo\TaskBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
 
class CustomerAdmin extends Admin
{
    // setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'ASC'
    );
 
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('firstname', 'text',array('attr'=> array('onchange' => 'checkName(this)')))
            ->add('lastname')
            ->add('emailaddress', 'text',array('attr'=> array('onchange' => 'checkEmail(this)')))
            ->add('phonenumber', 'integer',array('attr'=> array('onchange' => 'checkPhone(this)')))
            ->add('addressline1')
            ->add('addressline2')
            ->add('state')
            ->add('zip')
            ->add('country')
                
        ;
    }
 
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('firstname')
            //->add('lastname')
            //->add('emailaddress')
            //->add('phonenumber')
            ->add('addressline1')
            //->add('addressline2')
            ->add('state')
            ->add('zip')
            ->add('country')
        ;
    }
 
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('firstname')
            ->add('lastname')
            ->add('phonenumber')
            ->add('emailaddress')
            ->add('country')
            ->add('_action', 'actions', array(
           'actions' => array(
               'view' => array(),
               'edit' => array(),
               'delete' => array(),
           )
       ))
        ;
    }
    
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
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
}
?>
