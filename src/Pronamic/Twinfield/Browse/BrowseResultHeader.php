<?php

namespace Pronamic\Twinfield\Browse;

class BrowseResultHeader
{
    private $label;
    private $hideForUser;
    private $type;
    private $field;
    
    public function getLabel()
    {
        return $this->label;
    }
    
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
    
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
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
    
}