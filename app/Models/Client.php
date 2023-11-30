<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Client as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'password',
    ];
    public function reservation(){
        return $this->belongsToMany(Reservation::class);
    }
}
