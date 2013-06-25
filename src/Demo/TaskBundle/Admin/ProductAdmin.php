<?php

namespace Demo\TaskBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
 
class ProductAdmin extends Admin
{
    // setup the defaut sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
    );
 
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('category')
            ->add('itenname')
            ->add('costprice')
            ->add('unitprice')
            ->add('promoprice')
            ->add('quantity')
            ->add('location')
            ->add('description')
        ;
    }
 
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('category')
            ->add('itenname')
            ->add('costprice')
            ->add('unitprice')
            ->add('location')
        ;
    }
    
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('category')
            ->add('itenname')
            ->add('costprice')
            ->add('unitprice')
            ->add('promoprice')
            ->add('quantity')
            ->add('location')                    
        ;
    }
 
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('category')
            ->add('itenname')
            ->add('costprice')
            ->add('unitprice')
            ->add('promoprice')
            ->add('quantity')
            ->add('location')
            ->add('description')
                ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }
    public function getBatchActions()
    {
        // retrieve the default (currently only the delete action) actions
        $actions = parent::getBatchActions();

        // check user permissions
        if($this->hasRoute('edit') && $this->isGranted('EDIT') && $this->hasRoute('delete') && $this->isGranted('DELETE')) {
            $actions['extend'] = array(
                'label'            => 'Extend',
                'ask_confirmation' => true // If true, a confirmation will be asked before performing the action
            );

        }

        return $actions;
    }

}
?>
