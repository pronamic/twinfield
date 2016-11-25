<?php
namespace Pronamic\Twinfield\Browse;

class BrowseResult
{
    private $status;
    private $first;
    private $last;
    private $total;
    private $headers;
    private $lines;
    
    public function addHeader(BrowseResultHeader $header)
    {
        $this->headers[] = $header;
    }
    
    public function getHeaders()
    {
        return $this->headers;
    }
    
    public function addLine(BrowseResultLine $line)
    {
        $this->lines[] = $line;
    }
    
    public function getLines()
    {
        return $this->lines;
    }
    
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
    
    public function getFirst()
    {
        return $this->first;
    }

    public function setFirst($first)
    {
        $this->first = $first;
        return $this;
    }
    
    public function getLast()
    {
        return $this->last;
    }

    public function setLast($last)
    {
        $this->last = $last;
        return $this;
    }
    
    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $last;
        return $this;
    }  
}