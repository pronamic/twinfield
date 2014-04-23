<?php

namespace Pronamic\Twinfield\Service;

use Pronamic\Twinfield\Secure\SessionLoginHandler;

class AbstractService
{
    /**
     * @var \Pronamic\Twinfield\Secure\SessionLoginHandler
     */
    protected $sessionLoginHandler;

    /**
     * [__construct description]
     * 
     * @param \Pronamic\Twinfield\Secure\SessionLoginHandler $sessionLoginHandler
     */
    public function __construct(SessionLoginHandler $sessionLoginHandler)
    {
        $this->sessionLoginHandler = $sessionLoginHandler;
    }

    /**
     * [getSessionLoginHandler description]
     * 
     * @return \Pronamic\Twinfield\Secure\SessionLoginHandler
     */
    public function getSessionLoginHandler()
    {
        return $this->sessionLoginHandler;
    }
    
    /**
     * [setSessionLoginHandler description]
     * 
     * @param \Pronamic\Twinfield\Secure\SessionLoginHandler $sessionLoginHandler
     *
     * @return \Pronamic\Twinfield\Service\AbstractService
     */
    public function setSessionLoginHandler(SessionLoginHandler $sessionLoginHandler)
    {
        $this->sessionLoginHandler = $sessionLoginHandler;
        return $this;
    }
    
}