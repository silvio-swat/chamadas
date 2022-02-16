<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Senha extends Model
{
    use HasFactory;
    use SoftDeletes; 
    
    /**
     * Atributos em array para criação de uma model
     *
     * @var array
     */
    protected $fillable = [
        'numero',
        'tipo',
        'status',
    ];
}
