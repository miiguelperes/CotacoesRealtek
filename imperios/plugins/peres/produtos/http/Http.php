<?php namespace Peres\Produtos\Http;

use Backend\Classes\Controller;
use \Peres\Produtos\Models\Produtos; 
use \Peres\Produtos\Models\Categorias; 
/**
 * Http Back-end Controller
 */
class Http extends Controller
{
    public $implement = [
        'Mohsin.Rest.Behaviors.RestController'
    ];

    public $restConfig = 'config_rest.yaml';

    public function listProdutos(){
        $list = Produtos::get();
        return $list;
    }
    
    public function listCategorias(){
        $list = Categorias::get();
        return $list;
    }
}
