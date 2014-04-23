<?php
namespace Pronamic\Twinfield\Factory;

use Pronamic\Twinfield\Secure\SessionLoginHandler;
use Pronamic\Twinfield\Secure\ConfigInterface;
use Pronamic\Twinfield\Response\Response;
use Pronamic\Twinfield\Customer\CustomerFactory;

/**
 * All Factories used by all components extend this factory for common
 * shared methods that help normalize the usage between different components.\
 * 
 * @note this is a facade pattern. Named factory now, cant change it.
 * 
 * @author Leon Rowland <leon@rowland.nl>
 */
class ProcessXmlServiceFactory
{
    /**
     * @var SessionLoginHandler
     */
    protected $sessionLoginHandler;

    /**
     * Pass in the Secure\Config class and it will automatically
     * make the Secure\SessionLoginHandler for you.
     * 
     * @access public
     * @param \Pronamic\Twinfield\Secure\Config $config
     */
    public function __construct(SessionLoginHandler $sessionLoginHandler)
    {
        $this->sessionLoginHandler = $sessionLoginHandler;
    }

    /**
     * [buildCustomerFactory description]
     * 
     * @param \Pronamic\Twinfield\Secure\ConfigInterface $config
     * 
     * @return \Pronamic\Twinfield\Customer\CustomerFactory
     */
    public function buildCustomerFactory(ConfigInterface $config)
    {
        return new CustomerFactory($config);
    }
}
