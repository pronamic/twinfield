<?php

namespace Pronamic\Twinfield\Ledger;

use \Pronamic\Twinfield\Request;
use \Pronamic\Twinfield\Factory\ParentFactory;

class LedgerFactory extends ParentFactory
{
    public function listAll($dimType = 'BAS', $office = null)
    {
        if ($this->getLogin()->process()) {
            
            // Get the secure service class
            $service = $this->getService();
            
            // No office passed, get the office from the Config
            if (!$office) {
                $office = $this->getConfig()->getOffice();
            }
            
            $request_ledger = new Request\Read\Ledger($office, null, $dimType);
            $request_ledger
                ->setOffice($office);
                
            $response = $service->send($request_ledger);
            $this->setResponse($response);

            // Return a mapped ledger if successful or false if not.
            if ($response->isSuccessful()) {
                return Mapper\LedgerMapper::map($response);
            } else {
                return false;
            }

        }
    }

}