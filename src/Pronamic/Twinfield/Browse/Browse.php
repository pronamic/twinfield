<?php

namespace Pronamic\Twinfield\Browse;

class Browse
{
    protected $code;
    protected $columns;
    
    public function getCode()
    {
        return $this->code;
    }
    
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
    
    public function getColumns()
    {
        return $this->columns;
    }
    
    public function addColumn(Column $column)
    {
        $this->columns[] = $column;
        return $this;
    }
}
