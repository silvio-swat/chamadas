<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fila extends Model
{
    use HasFactory;

    /**
     * Atributos em array para criação de uma model
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'status',
        'prioridade',
        'temp_minimo_atend',
        'temp_maximo_atend',
        'temp_ideal_atend',
        'temp_maximo_espera'
    ];    

    public function locals() {
        return $this->morphedByMany(Local::class, 'filaable');
    }    

    public function localEncs() {
        return $this->morphedByMany(Local::class, 'fila_encable');
    }   
    
}
