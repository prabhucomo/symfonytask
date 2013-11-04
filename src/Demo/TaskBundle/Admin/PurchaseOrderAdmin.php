<?php

namespace Demo\TaskBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Exception\FormException;
use Demo\Taskbundle\Entity\Customer;

class PurchaseOrderAdmin extends Admin {

    // setup the defaut sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
    );

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                //->add('status','hidden')
                ->add('status', 'choice', array(
                    'choices' => array('Opened' => 'Opened', 'Closed' => 'Closed', 'InProgress' => 'InProgress', 'Delevired' => 'Delevired'),
                    'empty_value' => 'Select a Status',
                    'attr' => array('onchange' => 'getStatus(this)')
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
//            ->add('customer','genemu_jqueryautocomplete_entity', array(
//            'class' => 'Demo\TaskBundle\Entity\Customer',
//            'property' => 'firstname',
//        ))
                //->add('customer')
                ->add('customer', 'shtumi_ajax_autocomplete', array('entity_alias' => 'customers', 'attr' => array('class' => 'cust span5')))
                //->add('customer', 'text',array('attr'=> array('class' => 'total_enter span5')))
                //->add('customer', 'mawi_ajax_autocomplete', array('entity_alias'=>'customer'))
                //->add('product', null, array('by_reference' => false, 'expanded' => true, 'compound' => true))Not Neededd
//                ->add('orderitem','entity',array('collapsed' => false, 'class' => 'Demo\TaskBundle\Entity\OrderItem'))
//                ->add('amount', 'sonata_type_admin')
//                ->add('orderitem', 'sonata_type_collection', array(), array(
//                    'type' => new \Demo\TaskBundle\Form\OrderItemType(),
//                    'allow_add' => true,
//                    'allow_delete' => true,
//                    'by_reference' => true
//                )
//            )
                   ->add('orderitem','sonata_type_collection', array('label' => 'Order Item', 'by_reference' => false), 
                        array('edit' => 'inline',
                            'inline' => 'table',
                            'targetEntity'=>'Demo\TaskBundle\Entity\Orderitem'
                            ))     
                
//                ->add('orderitem', 'sonata_type_collection', array(
//                        //'type' => new \Demo\TaskBundle\Form\OrderItemType(),
//                        //'by_reference' => false // true doesn't work neither
//                        ), array(
//                    'edit' => 'inline',
//                    'inline' => 'table'
//                ))
        //->add('product', 'shtumi_ajax_autocomplete', array('entity_alias'=>'order'));
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('status')
                ->add('customer')
        ;
    }

    protected function configureShowField(ShowMapper $showMapper) {
        $showMapper
                ->add('status')
                ->add('customer')
                ->add('order_date')
                ->add('orderitem')
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
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

    public function getBatchActions() {
        // retrieve the default (currently only the delete action) actions
        $actions = parent::getBatchActions();

        // check user permissions
        if ($this->hasRoute('edit') && $this->isGranted('EDIT') && $this->hasRoute('delete') && $this->isGranted('DELETE')) {
            $actions['extend'] = array(
                'label' => 'Extend',
                'ask_confirmation' => true // If true, a confirmation will be asked before performing the action
            );
        }

        return $actions;
    }

}

?>
