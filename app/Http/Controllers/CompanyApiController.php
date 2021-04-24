<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseApiController as BaseApiController;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyApiController extends BaseApiController
{
    public function getCompanies()
    {
        //set_time_limit(5);
        $c = Company::orderBy('created_at', 'desc')->paginate(7);
        return $this->sendResponse($c, 'Companies retrieved successfully.');
    }

    public function getClients($company) 
    {
        $c = Company::find($company);
        if (!$c) {
            return $this->sendError('No such company founded');
        }
        return $this->sendResponse($c->clients()->paginate(7), 'Clients of company['. $company .'] retrieved successfully.');
    }
}
