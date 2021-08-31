<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubMenu extends Model
{
    use HasFactory;
    use SoftDeletes;    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id',
        'name',
        'controller',
        'action',
        'order',
        'icon'
    ];

    protected $dates = [
        'deleted_at'
    ];      

    public function menu()
    {
        return $this->belongsTo(related: Menu::class);
    }  
}
