<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Param extends Model
{
    use HasFactory;
    use SoftDeletes;  
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chave'
    ];     

    protected $dates = [
        'deleted_at'
    ];  
    
    public function paramItems()
    {
        return $this->hasMany(related: ParamItem::class);
    }           
}
