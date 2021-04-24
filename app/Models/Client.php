<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use Carbon\Carbon;

class Client extends Model
{
    use HasFactory;
    protected $appends = ['companies_ids'];

    protected $fillable = ['name', 'email', 'phone'];

    //protected $table = 'clients';

    //Many to Many relationship via BelognsToMany to pivot table
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'client_company');
    }

    // transform client companies into string of ids. Used in edit view.
    public function getCompaniesIdsAttribute() {
        return $this->companies->pluck('id')->implode(', ');
    }
}
