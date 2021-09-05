<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_page_id',
        'name',
        'order',
        'icon',
        'permission_id'        
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
    
    public function param()
    {
        return $this->belongsTo(related: Param::class);
    }      
}
