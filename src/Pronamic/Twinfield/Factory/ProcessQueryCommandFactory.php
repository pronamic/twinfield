<?php
namespace Pronamic\Twinfield\Factory;

use Pronamic\Twinfield\Service\AbstractService;
use Pronamic\Twinfield\Service\ProcessQueryCommandService;

/**
 * All Factories used by all components extend this factory for common
 * shared methods that help normalize the usage between different components.\
 * 
 * @note this is a facade pattern. Named factory now, cant change it.
 * 
 * @author Leon Rowland <leon@rowland.nl>
 */
class ProcessQueryCommandFactory
{
    /**
     * @var \Pronamic\Twinfield\Service\ProcessQueryCommandService
     */
    protected $processQueryCommandService;

    /**
     * Constructor
     * 
     * @param \Pronamic\Twinfield\Service\ProcessQueryCommandService $processQueryCommandService
     */
    public function __construct(ProcessQueryCommandService $processQueryCommandService)
    {
        $this->processQueryCommandService = $processQueryCommandService;
    }

    /**
     * [getProcessXmlRequestService description]
     * 
     * @return \Pronamic\Twinfield\Service\ProcessXmlRequestService
     */
    public function getProcesQueryCommandService()
    {
        return $this->processQueryCommandService;
    }

    public function execute($request)
    {

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
        return $this->processQueryCommandService;
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
