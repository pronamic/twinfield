<?php
namespace Pronamic\Twinfield\Browse\DOM;

use \Pronamic\Twinfield\Browse\Browse;

/**
 * The Document Holder for making new XML customers. Is a child class
 * of DOMDocument and makes the required DOM tree for the interaction in
 * creating a new customer.
 *
 * @package Pronamic\Twinfield
 * @subpackage Invoice\DOM
 * @author Leon Rowland <leon@rowland.nl>
 * @copyright (c) 2013, Pronamic
 */
class BrowseDocument extends \DOMDocument
{

    private $columnsElement;

    public function __construct()
    {
        parent::__construct('1.0', 'UTF-8');

        $this->columnsElement = $this->createElement('columns');
        $this->appendChild($this->columnsElement);
    }

    /**
     * Turns a passed Customer class into the required markup for interacting
     * with Twinfield.
     *
     * This method doesn't return anything, instead just adds the invoice to
     * this DOMDOcument instance for submission usage.
     *
     * @access public
     * @param \Pronamic\Twinfield\Customer\Customer $customer
     * @return void | [Adds to this instance]
     */
    public function addBrowse(Browse $browse)
    {
        $code = $browse->getCode();
        if (!empty($code)) {
            $this->columnsElement->setAttribute('code', $code);
        }
        
        foreach($browse->getColumns() as $column)
        {
            $columnElement = $this->createElement('column');
            
            if($column->getId() !== null)
            {
                $columnElement->setAttribute('id', $column->getId());
            }
            
            if($column->getField() !== null)
            {
                $fieldElement = $this->createElement('field');
                
                $node = $this->createTextNode($column->getField());
                
                $fieldElement->appendChild($node);
                
                $columnElement->appendChild($fieldElement);
            }
            
            if($column->getLabel() !== null)
            {
                $labelElement = $this->createElement('label');
                
                $node = $this->createTextNode($column->getLabel());
                
                $labelElement->appendChild($node);
                
                $columnElement->appendChild($labelElement);
            }
            
            if($column->getVisible() !== null)
            {
                $visibleElement = $this->createElement('visible');
                
                $node = $this->createTextNode($column->getvisible() ? 'true' : 'false');
                
                $visibleElement->appendChild($node);
                
                $columnElement->appendChild($visibleElement);
            }
            
            if($column->getFrom() !== null)
            {
                $fromElement = $this->createElement('from');
                
                $node = $this->createTextNode($column->getfrom());
                
                $fromElement->appendChild($node);
                
                $columnElement->appendChild($fromElement);
            }
            
            if($column->getOperator() !== null)
            {
                $operatorElement = $this->createElement('operator');
                
                $node = $this->createTextNode($column->getoperator());
                
                $operatorElement->appendChild($node);
                
                $columnElement->appendChild($operatorElement);
            }
            
            if($column->getTo() !== null)
            {
                $toElement = $this->createElement('to');
                
                $node = $this->createTextNode($column->getTo());
                
                $toElement->appendChild($node);
                
                $columnElement->appendChild($toElement);
            } else if($column->getOperator() !== 'none') {
                
                $toElement = $this->createElement('to');
                
                $node = $this->createTextNode($column->getFrom());
                
                $toElement->appendChild($node);
                
                $columnElement->appendChild($toElement);
            }

            $this->columnsElement->appendChild($columnElement);

        }
    }
}
