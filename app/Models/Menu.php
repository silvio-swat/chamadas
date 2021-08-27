<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'order',
        'menu_page_id',
    ];

    protected $dates = [
        'deleted_at'
    ];      

    public function subMenus()
    {
        return $this->hasMany(related: SubMenu::class);
    }  
    
    public function menuPage()
    {
        return $this->belongsTo(related: MenuPage::class);
    }      
}
