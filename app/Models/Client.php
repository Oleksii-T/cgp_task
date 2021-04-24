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

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'client_company');
    }

    public function getCompaniesIdsAttribute() {
        return $this->companies->pluck('id')->implode(', ');
    }
}
