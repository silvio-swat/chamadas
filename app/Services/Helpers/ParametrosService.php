<?php
namespace App\Services\Helpers;

use App\Models\Param;

class ParametrosService
{
    public function getSelectArray($chave){
        $selectArray = [];
        $params = Param::where('chave', $chave)->get();
        if(isset($params[0])){
            $items = $params[0]->Paramitems;
            foreach($items as $item){
                $selectArray[] = [
                     'value'  => $item->conteudo,
                     'descri' => $item->descricao
                ];
            }
        } else {
            $selectArray = [
                'value'  => null,
                'descri' => 'nenhum item encontrado'
           ];            
        }

        return $selectArray;
    }  
}
