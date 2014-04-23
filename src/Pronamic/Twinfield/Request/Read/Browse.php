<?php
/**
 * Browse.php
 * Definition of class Browse
 * 
 * Created 14-Mar-2014 16:24:00
 *
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 * @copyright (c) 2014, Byng Systems/SkillsWeb Ltd
 */

namespace Pronamic\Twinfield\Request\Read;



/**
 * Browse
 * 
 * @author M.D.Ward <matthew.ward@byng-systems.com>
 */
class Browse extends Read
{
    
    /**
     * 
     * @param type $office
     * @param type $code
     */
    public function __construct($office = null, $code = null)
    {
        parent::__construct();
        
        $this->add("type", "browse");
        
        if ($office !== null) {
            $this->setOffice($office);
        }
        
        if ($code !== null) {
            $this->setCode($code);
        }
    }
    
    /**
     * 
     * @param mixed $office
     * @return \Pronamic\Twinfield\Request\Read\Browse
     */
    public function setOffice($office)
    {
        $this->add("office", $office);
        
        return $this;
    }
    
    /**
     * 
     * @param mixed $code
     * @return \Pronamic\Twinfield\Request\Read\Browse
     */
    public function setCode($code)
    {
        $this->add("code", $code);
        
        return $this;
    }
    
    
    
}


