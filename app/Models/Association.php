<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\Association as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Association extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'slogan',
        'email',
        'date_de_creation',
        'logo',
        'password',
    ];
}
