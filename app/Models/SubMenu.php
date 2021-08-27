<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'controller',
        'action',
        'menu_id',
        'order',
    ];

    protected $dates = [
        'deleted_at'
    ];      

    public function menu()
    {
        return $this->belongsTo(related: Menu::class);
    }  
}
