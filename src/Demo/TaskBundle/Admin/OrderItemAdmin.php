<?php

namespace Demo\TaskBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
 
class OrderItemAdmin extends Admin
{
// setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'ASC'
    );
 
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('product', 'entity', array('class' => 'Demo\TaskBundle\Entity\Product',
                    'empty_value' => 'Select a Product',
                    'property' => 'itenname',
                    'attr'=> array('onchange' => 'updateData(this)')))
            ->add('amount', 'integer',array('attr'=> array('class' => 'amount_int span5')))
                //->add('tax','hidden')
                ->add('quantity', 'integer',array('attr'=> array('onchange' => 'updateTotal()')))
                ->add('total', 'integer',array('attr'=> array('class' => 'total_int span5')))
                
                //->add('purchaseorder')
        ;
    }
 
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('product')
                ->add('purchaseorder')
        ;
    }
 
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper            
            ->addIdentifier('amount')
            ->addIdentifier('tax')
            ->addIdentifier('quantity')
            ->addIdentifier('total')
            ->add('product')
            ->add('purchaseorder')
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
