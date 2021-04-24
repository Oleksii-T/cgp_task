<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Company extends Model
{
    use HasFactory;

    // causes timeout when serialize. Commented out
    //protected $appends = ['clients_ids'];

    protected $fillable = ['name', 'director', 'founded_at'];

    protected $table = 'companies';

    //Many to Many relationship via BelognsToMany to pivot table
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_company'); 
    }

    // transform  comany clients into string of ids. Used in edit view.
    public function getClientsIdsAttribute() {
        return $this->clients->pluck('id')->implode(', ');
    }
}
