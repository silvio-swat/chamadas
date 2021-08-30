<?php
namespace App\Services\Helpers;

class ImportDataService
{
    public function awesomeIconsArray(){
        $path = storage_path('app/awesome_icons.json');
        $content = json_decode(file_get_contents($path), true);

        return $content;
    }
}