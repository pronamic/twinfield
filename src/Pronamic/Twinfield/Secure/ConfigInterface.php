<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 17/04/14
 * Time: 17:13
 */

namespace Pronamic\Twinfield\Secure;


interface ConfigInterface {
    /**
     * Returns the set user
     *
     * @return string
     */
    public function getUsername();

    /**
     * Returns the set password
     *
     * @return string
     */
    public function getPassword();

    /**
     * Returns the set organisation code
     *
     * @return string
     */
    public function getOrganisation();

    /**
     * Returns the set office code
     *
     * @return string
     */
    public function getOffice();
} 