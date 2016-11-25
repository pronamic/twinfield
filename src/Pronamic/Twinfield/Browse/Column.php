<?php

namespace Pronamic\Twinfield\Browse;

class Column
{
    protected $id;
    protected $field;
    protected $operator = 'none';
    protected $from;
    protected $to;
    protected $label;
    protected $finderParam;
    protected $visible;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getField()
    {
        return $this->field;
    }
    
    public function getOperator()
    {
        return $this->operator;
    }
    
    public function getFrom()
    {
        return $this->from;
    }
    
    public function getTo()
    {
        return $this->to;
    }
    
    public function getLabel()
    {
        return $this->label;
    }
    
    public function getVisible()
    {
        return $this->visible;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }
    
    public function setOperator($operator)
    {
        $this->operator = $operator;
        return $this;
    }
    
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }
    
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }
    
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }
    
    public function setVisible($visible)
    {
        $this->visible = $visible;
        return $this;
    }

}