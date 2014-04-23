<?php
namespace Pronamic\Twinfield\Factory;

use Pronamic\Twinfield\Secure\Config;
use Pronamic\Twinfield\Secure\Login;
use Pronamic\Twinfield\Service\AbstractService;
use Pronamic\Twinfield\Service\ProcessXmlRequestService;
use Pronamic\Twinfield\Response\Response;
use Pronamic\Twinfield\Secure\SessionLoginHandler;

/**
 * All Factories used by all components extend this factory for common
 * shared methods that help normalize the usage between different components.\
 * 
 * @note this is a facade pattern. Named factory now, cant change it.
 * 
 * @author Leon Rowland <leon@rowland.nl>
 */
class ProcessXmlRequestFactory
{
    /**
     * Holds the response from a request.
     * 
     * @var \Pronamic\Twinfield\Response\Response
     */
    private $response;

    /**
     * @var \Pronamic\Twinfield\Service\ProcessXmlRequestService
     */
    protected $processXmlRequestService;

    /**
     * Constructor
     * 
     * @param \Pronamic\Twinfield\Service\ProcessXmlRequestService $processXmlRequestService
     */
    public function __construct(ProcessXmlRequestService $processXmlRequestService)
    {
        $this->processXmlRequestService = $processXmlRequestService;
    }

    /**
     * [getProcessXmlRequestService description]
     * 
     * @return \Pronamic\Twinfield\Service\ProcessXmlRequestService
     */
    public function getProcessXmlRequestService()
    {
        return $this->processXmlRequestService;
    }

    /**
     * [getSessionLoginHandler description]
     * 
     * @return \Pronamic\Twinfield\Secure\SessionLoginHandler
     */
    public function getSessionLoginHandler()
    {
        return $this->getProcessXmlRequestService()->getSessionLoginHandler();
    }

    /**
     * [execute description]
     * 
     * @param  [type] $request [description]
     * 
     * @return \Pronamic\Twinfield\Response\Response
     */
    public function execute($request)
    {
        if($this->getSessionLoginHandler()->process()) {
            
            // Gets the secure service class
            $service = $this->getService();

            // Send the Request document and set the response to this instance.
            $this->response = $service->send($request);
            return $this->response;
        }
    }

    /**
     * Returns an new instance of Service with 
     * the already prepared Secure\SessionLoginHandler.
     * 
     * @access public
     * @return \Pronamic\Twinfield\Secure\Service
     */
    public function getService()
    {
        //return new ProcessXmlRequestService($this->getLogin());
        return $this->processXmlRequestService;
    }

    /**
     * Should be called by the child classes. Will set the response
     * document from an attempted SOAP request.
     * 
     * @access public
     * @param \Pronamic\Twinfield\Response\Response $response
     * @return \Pronamic\Twinfield\Factory\ParentFactory
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * Returns the response that was last set.
     * 
     * @access public
     * @return \Pronamic\Twinfield\Response\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
