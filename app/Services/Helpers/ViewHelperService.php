<?php
namespace App\Services\Helpers;

class ViewHelperService
{
    public function buildButton($label = 'New', $mt = 'new()', $icon = 'plus'){
        $method = $mt ?? "new()";
        $button = "<div class='py-1'>
                    <button
                        wire:click='{$method}'
                        class='little--btn-blue mx-2'>
                        <i class='fa fa-{$icon}'></i>
                        <span>{$label}</span>
                    </button>
                  </div>"; 

        return $button;
    }

    public function buildActionButton($label = 'New', $mt = 'new()', $icon = 'plus'){
        $method = $mt ?? "edit()";
        $button = "<button title='{$label}' wire:click='{$method}'><i class='fa fa-{$icon} fa-xl mx-1'></i></button>";    
        
        return $button;
    }    
}