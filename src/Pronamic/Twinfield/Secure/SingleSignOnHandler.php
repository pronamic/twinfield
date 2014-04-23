<?php

namespace Pronamic\Twinfield\Secure;

class SingleSignOnHandler extends AbstractAuthenticationHandler
{
    /**
     * @var string
     */
    protected $token;

    /**
     * [getToken description]
     * 
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * [setToken description]
     * 
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    public function process()
    {

    }

} 