<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuPage extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'order',
        'icon',
        'permission_id'
    ];

    protected $dates = [
        'deleted_at'
    ];  
    
    public function menus()
    {
        return $this->hasMany(related: Menu::class);
    }  
    
    public function permission()
    {
        return $this->belongsTo(related: Permission::class);
    }      
}
