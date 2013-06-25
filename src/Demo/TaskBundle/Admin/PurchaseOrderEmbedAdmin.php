<?php

namespace Demo\TaskBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
 
class PurchaseOrderEmbedAdmin extends Admin
{
    // setup the defaut sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
    );
 
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            //->add('status')
                ->add('status', 'choice', array(
    'choices' => array('Opened' => 'Opened', 'Closed' => 'Closed', 'InProgress' => 'InProgress', 'Delevired' => 'Delevired'),
                    'empty_value' => 'Select a Status',
))
            //->add('order_date')
//                ->add('order_date', null, array(
//                    'widget' => 'single_text',
//                    'format' => 'd.M.y',
//                    'required' => false,
//                    'attr' => array('class' => 'datepick-input',  "data-date-format"=>"dd.mm.yyyy"))
//                     )
//            ->add('order_date', 'doctrine_orm_datetime_range', array(), null, array(
//                'widget' => 'single_text',
//                'required' => false, 
//                'attr' => array('class' => 'datepicker')))
                ->add('order_date', null, array(
                    'widget' => 'single_text',
                    'required' => false, 
                    'attr' => array('class' => 'datepicker')))
            ->add('customer')
            ->add('product', null, array('by_reference' => false, 'expanded' => true, 'compound' => true))
                //->add('product', 'shtumi_ajax_autocomplete', array('entity_alias'=>'order'));
        ;
    }
 
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('status')
            ->add('customer')
        ;
    }
 
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('status')
            ->add('order_date')
            ->add('customer')
                ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
            //->add('product', null, array('by_reference' => false, 'expanded' => true, 'compound' => true))
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
