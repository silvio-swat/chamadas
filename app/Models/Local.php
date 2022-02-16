<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    /**
     * Atributos em array para criação de uma model
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'rotulo',
        'fila_id'
    ];        

    public function filas() {
        return $this->morphToMany(Fila::class, 'filaable');
    }    

    public function filaEncs() {
        return $this->morphToMany(Fila::class, 'fila_encable');
    }  
    
    public function fila()
    {
        return $this->belongsTo(related: Fila::class);
    }      
}
