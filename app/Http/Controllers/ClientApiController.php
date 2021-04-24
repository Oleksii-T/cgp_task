<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseApiController as BaseApiController;
use Illuminate\Http\Request;
use App\Models\Client;

// api side of client
class ClientApiController extends BaseApiController
{
    //Get companies of exact client. Task #6.3
    public function getClientCompanies($client) 
    {
        $c = Client::find($client);
        if (!$c) {
            return $this->sendError('No such client founded');
        }
        return $this->sendResponse($c->companies()->paginate(7), 'Companies of client['. $client .'] retrieved successfully.');
    }
}
