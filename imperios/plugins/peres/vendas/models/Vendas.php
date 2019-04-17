<?php namespace Peres\Vendas\Models;

use Model;
use Input;
use Request;
use \Peres\Produtos\Models\Produtos;    
/**
 * Model
 */
class Vendas extends Model
{
    

    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    
    
    protected $dates = ['deleted_at'];
    
    protected $jsonable = ['descricao'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'peres_vendas_';

    

    public $belongsTo = [
        'cliente' => 'Peres\Clientes\Models\Clientes', 'key'=>'nome',
        'produto' => 'Peres\Produtos\Models\Produtos', 'key'=>'nome'
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function beforeSave()
    {
        $var = $this->descricao;
        $total = 0;
        if(is_array($var)){
            foreach ($var as $key => $value){
                
                $idProduto = $value["produto"];
                $prodOBJ = Produtos::where('id', $idProduto)->get()[0];
                $soma = $value["qnt"] * floatval(str_replace(',','.',$prodOBJ["valor"]));
                $total += $soma;
                
            }
        }
        $this->total = $total;
        //var_dump($total);
        
        
    }
}
