<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 17/04/14
 * Time: 17:26
 */

namespace Pronamic\Twinfield\Secure;

use Pronamic\Twinfield\SoapClient;

abstract class AbstractAuthenticationHandler
{

    /**
     * The SoapClient used to login to Twinfield
     *
     * @var SoapClient
     */
    protected $authenticationSoapClient;

    /**
     * @var \Pronamic\Twinfield\Secure\Config
     */
    protected $config;

    /**
     * [__construct description]
     * 
     * @param \Pronamic\Twinfield\SoapClient $authenticationSoapClient
     */
    public function __construct(SoapClient $authenticationSoapClient)
    {
        $this->authenticationSoapClient = $authenticationSoapClient;
    }

    /**
     * [setConfig description]
     * 
     * @param \Pronamic\Twinfield\Secure\ConfigInterface $config
     */
    public function setConfig(ConfigInterface $config)
    {
        $this->config = $config;
    }

    abstract function process();

} 