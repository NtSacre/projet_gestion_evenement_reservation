<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'image',
        'date_limite_inscrption',
        'description',
        'date_evenement',
        'association_id',
    ];
    public function reservations(){
        return $this->belongsToMany(Reservation::class);
    }
}
