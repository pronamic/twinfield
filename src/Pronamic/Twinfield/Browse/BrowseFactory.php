<?php
namespace Pronamic\Twinfield\Browse;

use \Pronamic\Twinfield\Factory\ParentFactory;
use \Pronamic\Twinfield\Customer\Mapper\CustomerMapper;
use \Pronamic\Twinfield\Request as Request;

use \Pronamic\Twinfield\Browse\Browse;
use \Pronamic\Twinfield\Browse\BrowseDocument;
use \Pronamic\Twinfield\Browse\Mapper\BrowseMapper;

/**
 * CustomerFactory
 * 
 * A facade factory to make interaction with the the twinfield service easier
 * when trying to retrieve or send information about Customers.
 * 
 * Each function has detailed explanation over what is required, and what
 * happens.
 * 
 * If you require more complex interactions or a heavier amount of control
 * over the requests to/from then look inside the methods or see
 * the advanced guide detailing the required usages.
 * 
 * @package Pronamic\Twinfield
 * @subpackage Customer
 * @author Leon Rowland <leon@rowland.nl>
 * @copyright (c) 2013, Pronamic
 * @version 0.0.1
 */
class BrowseFactory extends ParentFactory
{
    /**
     * Sends a \Pronamic\Twinfield\Customer\Customer instance to Twinfield
     * to update or add.
     * 
     * First attempts to login with the passed configuration in the constructor.
     * If successful will get the secure Service class.
     * 
     * It will then make an instance of 
     * \Pronamic\Twinfield\Customer\DOM\CustomersDocument where it will
     * pass in the Customer class in this methods parameter.
     * 
     * It will then attempt to send the DOM document from CustomersDocument
     * and set the response to this instances method setResponse() (which you
     * can get with getResponse())
     * 
     * If successful will return true, else will return false.
     * 
     * If you want to map the response back into a customer use getResponse()->
     * getResponseDocument()->asXML() into the CustomerMapper::map method.
     * 
     * @access public
     * @param \Pronamic\Twinfield\Customer\Customer $customer
     * @return boolean
     */
    public function send(Browse $browse)
    {
        // Attempts the process login
        if ($this->getLogin()->process()) {
            // Gets the secure service
            $service = $this->getService();

            // Gets a new instance of CustomersDocument and sets the $customer
            $browseDocument = new DOM\BrowseDocument();
            
            $browseDocument->addBrowse($browse);
            
            // Send the DOM document request and set the response
            $response = $service->send($browseDocument);
            
            $this->setResponse($response);

            // Return a bool on status of response.
            if ($response->isSuccessful()) {
                return BrowseMapper::map($response);
            } else {
                return false;
            }
        }
    }
}
