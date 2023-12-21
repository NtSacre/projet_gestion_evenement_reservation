<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Evenement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'evenement_id',
        'nombre_de_place',
        'reference',
        'is_accepted',
        
    ];
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function evenement(){
        return $this->belongsTo(Evenement::class);
    }
}
