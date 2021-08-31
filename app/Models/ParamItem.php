<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParamItem extends Model
{
    use HasFactory;
    use SoftDeletes;    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conteudo',
        'descricao',
        'param_id'
    ];    

    protected $dates = [
        'deleted_at'
    ];      

    public function param()
    {
        return $this->belongsTo(related: Param::class);
    }      
}
