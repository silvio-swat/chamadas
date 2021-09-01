<?php
namespace App\Services\Helpers;

use App\Models\Param;

class ParametrosService
{
    public function getSelectArray($chave){
        $params = Param::where('chave', $chave)->get();
        foreach($params as $param) {
            dd($param);
        }
    }  
}
