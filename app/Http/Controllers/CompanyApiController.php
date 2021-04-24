<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseApiController as BaseApiController;
use Illuminate\Http\Request;
use App\Models\Company;

// api side of comany
class CompanyApiController extends BaseApiController
{
    //get list of companies. Task #6.1
    public function getCompanies()
    {
        //set_time_limit(5);
        $c = Company::orderBy('created_at', 'desc')->paginate(7);
        return $this->sendResponse($c, 'Companies retrieved successfully.');
    }

    //get list of companies. Task #6.2
    public function getClients($company) 
    {
        $c = Company::find($company);
        if (!$c) {
            return $this->sendError('No such company founded');
        }
        return $this->sendResponse($c->clients()->paginate(7), 'Clients of company['. $company .'] retrieved successfully.');
    }
}
