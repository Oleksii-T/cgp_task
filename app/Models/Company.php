<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Company extends Model
{
    use HasFactory;

    //protected $appends = ['clients_ids'];

    protected $fillable = ['name', 'director', 'founded_at'];

    protected $table = 'companies';

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_company'); 
    }

    public function getClientsIdsAttribute() {
        return $this->clients->pluck('id')->implode(', ');
    }
}
