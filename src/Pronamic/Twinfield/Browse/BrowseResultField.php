<?php

namespace Pronamic\Twinfield\Browse;

class BrowseResultField
{

    private $hideForUser;
    private $type;
    private $field;
    private $value;
    
    const TYPE_STRING = 'String';
    const TYPE_DATE = 'Date';
    const TYPE_VALUE = 'Value';
    const TYPE_DECIMAL = 'Decimal';
    const TYPE_NUMBER = 'Number';

    public function getHideForUser()
    {
        return $this->hideForUser;
    } 
    
    public function getType()
    {
        return $this->type;
    }
    
    public function getField()
    {
        return $this->field;
    }
    
    public function getValue()
    {
        switch($this->getType()) {
            
            case self::TYPE_STRING:
                return (string) $this->value;
            break;
                
            case self::TYPE_NUMBER:
            case self::TYPE_DECIMAL:
                return (float) $this->value;
            break;
            
            default:
                return $this->value;
            break;
            
        }
    }
    
    public function setHideForUser($hideForUser)
    {
        $this->hideForUser = $hideForUser;
        return $this;
    }
    
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }
    
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
    
}