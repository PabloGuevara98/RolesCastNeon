<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nombre',
        'fecha',
        'participantes',
        'slug'
    ];

    //para que nos retorne el slug en el link de la barra de navegacion web

    public function getRouteKeyName()
    {
        return "slug";
    }
}
