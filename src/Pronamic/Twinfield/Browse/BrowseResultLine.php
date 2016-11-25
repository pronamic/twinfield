<?php

namespace Pronamic\Twinfield\Browse;

class BrowseResultLine
{
    private $fields = [];

    public function addField(BrowseResultField $field)
    {
        $this->fields[$field->getField()] = $field;
    }
    
    public function getField($fieldName)
    {
        return $this->fields[$fieldName];
    }
}