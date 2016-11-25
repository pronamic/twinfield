<?php
namespace Pronamic\Twinfield\Browse\Mapper;

use \Pronamic\Twinfield\Browse\BrowseResult;
use \Pronamic\Twinfield\Browse\BrowseResultHeader;
use \Pronamic\Twinfield\Browse\BrowseResultLine;
use \Pronamic\Twinfield\Browse\BrowseResultField;
use \Pronamic\Twinfield\Browse\Browse;
use \Pronamic\Twinfield\Response\Response;

/**
 * Maps a response DOMDocument to the corresponding entity.
 * 
 * @package Pronamic\Twinfield
 * @subpackage Mapper
 * @author Leon Rowland <leon@rowland.nl>
 * @copyright (c) 2013, Pronamic
 */
class BrowseMapper
{
    public static function map(Response $response)
    {
        // Generate new result object
        $result = new BrowseResult();
        
        // Gets the raw DOMDocument response.
        $responseDOM = $response->getResponseDocument();
        
        // Set the status attribute
        $resultElement = $responseDOM->getElementsByTagName('browse')->item(0);
        
        $result->setStatus($resultElement->getAttribute('result'));
        $result->setFirst($resultElement->getAttribute('first'));
        $result->setLast($resultElement->getAttribute('last'));
        $result->setTotal($resultElement->getAttribute('total'));
        
        $headerContainer = $resultElement->getElementsByTagName('th')->item(0);
        foreach($headerContainer->getElementsByTagName('td') as $headerElement)
        {
            $header = new BrowseResultHeader();
            $header->setLabel($headerElement->getAttribute('label'));
            $header->setType($headerElement->getAttribute('type'));
            $header->setHideForUser($headerElement->getAttribute('hideforuser'));
            $header->setField($headerElement->textContent);
            $result->addHeader($header);
        }
        
        $lineElements = $resultElement->getElementsByTagName('tr');
        foreach($lineElements as $lineElement)
        {
            
            $line = new BrowseResultLine();
            
            foreach($lineElement->getElementsByTagName('td') as $columnElement)
            {
                $field = new BrowseResultField();
                $field->setType($columnElement->getAttribute('type'));
                $field->setHideForUser($columnElement->getAttribute('hideforuser'));
                $field->setField($columnElement->getAttribute('field'));
                $field->setValue($columnElement->textContent);
               
                $line->addField($field);
            }
            
            $result->addLine($line);
        }

        return $result;
    }
}
