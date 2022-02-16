<?php
namespace App\Services\Helpers;

use App\Models\Fila;
use App\Models\MenuPage;
use App\Models\Param;
use App\Services\Menu\MenuService;

class ParametrosService
{
    private $srvMenu;

    public function __construct()
    {
        $this->srvMenu    = new MenuService();
    }

    /**
     * 
     * Busca os parâmetros baseado em parâmetro
     * @param array $select
     * @param string $string
     * @return string
     */    
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

    /**
     * Método para pegar a descrição de um array de select
     * @param array $select
     * @param string $string
     * @return string
     */
    public function getDisplayName($select, $string)
    {
        foreach($select as $item) {
            if($item['value'] == $string) {
                return $item['descri'];
            }
        }
        return null;
    }  
    
    /**
     * Monta um select de menus do sistema
     * @param array $select
     * @param string $string
     * @return string
     */    
    public function getSelectMenusArray(){
        $selectArray = [];
        $pages = MenuPage::all();

        if(count($pages) > 0){
            foreach($pages as $page){
                $selectArray[] = [
                     'value'  => $page->name,
                     'descri' => $page->name
                ];
                $selectArray = $this->srvMenu->getSelectMenuArray($selectArray, $page->menus);
            }
        } else {
            $selectArray = [
                'value'  => null,
                'descri' => 'nenhum item encontrado'
           ];
        }
        sort($selectArray);

        return $selectArray;
    }     
    
    /**
     * Monta um select de filas
     * @param array $select
     * @param string $string
     * @return string
     */    
    public function getSelectFilas(){
        $selectArray = [];
        $filas = Fila::all();
        if(count($filas) > 0){
            $selectArray[] = [
                'value'  => null,
                'descri' => 'Selecione uma Fila'
            ];            
            foreach($filas as $fila){
                $selectArray[] = [
                     'value'  => $fila->id,
                     'descri' => $fila->nome
                ];
            }
        } else {
            $selectArray = [
                'value'  => null,
                'descri' => 'nenhum item encontrado'
            ];
        }
        sort($selectArray);

        return $selectArray;
    }        
}
