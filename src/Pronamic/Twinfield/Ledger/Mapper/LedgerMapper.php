<?php
namespace Pronamic\Twinfield\Ledger\Mapper;

use \Pronamic\Twinfield\Response\Response;
use \Pronamic\Twinfield\Ledger\Ledger;

class LedgerMapper
{
    
    public static function map(Response $response)
    {
        $ledgerList = array();

        $responseDOM = $response->getResponseDocument();
        
        $dimensionElement = $responseDOM->getElementsByTagName('dimension');
        
        foreach($dimensionElement as $dimension)
        {
            
            $ledger = new Ledger;
            
            $ledgerTags = [
                'code'              => 'setCode',
                'office'            => 'setOffice',
                'type'              => 'setType',
                'name'              => 'setName',
            ];
            
            foreach ($ledgerTags as $tag => $method) {
                // Get the dom element
                $_tag = $dimension->getElementsByTagName($tag)->item(0);
    
                // If it has a value, set it to the associated method
                if (isset($_tag) && isset($_tag->textContent)) {
                    $ledger->$method($_tag->textContent);
                }
            }
            
            array_push($ledgerList, $ledger);
        }

        
        return $ledgerList;
    }
}