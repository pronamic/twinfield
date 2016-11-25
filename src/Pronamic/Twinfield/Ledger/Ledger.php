<?php

namespace Pronamic\Twinfield\Ledger;

class Ledger
{
    protected $type;
    protected $code;
    protected $name;
    protected $shortname;
    protected $inUse;
    protected $office;
    
	public function getType()
	{
		return $this->type;
	}

	public function setType($type)
	{
		$this->type = $type;
		return $this;
	}
	
	public function getOffice()
	{
		return $this->office;
	}

	public function setOffice($office)
	{
		$this->office = $office;
		return $this;
	}

	public function getCode()
	{
		return $this->code;
	}

	public function setCode($code)
	{
		$this->code = $code;
		return $this;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	public function getShortname(){
		return $this->shortname;
	}

	public function setShortname($shortname)
	{
		$this->shortname = $shortname;
		return $this;
	}

	public function getInUse()
	{
		return $this->inUse;
	}

	public function setInUse($inUse)
	{
		$this->inUse = $inUse;
		return $this;
	}
	
}