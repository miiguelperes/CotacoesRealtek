<?php namespace Peres\Produtos\Models;

use Model;

/**
 * Model
 */
class Produtos extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'peres_produtos_';

    public $belongsTo = [
        'categoria' => 'Peres\Produtos\Models\Categorias', 'key'=>'nome'
    ];

    public $attachOne = [
        'imagem' => 'System\Models\File'
    ];
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function afterCreate()
    {
        $this->valor = str_replace(",",".",$this->valor);
        if($this->imagem)
         $this->path = $this->imagem->getPath();
        //var_dump($es);
    }
    public function beforeUpdate()
    {
        $this->valor = str_replace(",",".",$this->valor);
        if($this->imagem)
         $this->path = $this->imagem->getPath();
        //var_dump($es);
    }
    public function beforeSave()
    {
        $this->valor = str_replace(",",".",$this->valor);
        if($this->imagem)
         $this->path = $this->imagem->getPath();
        //var_dump($es);
    }
    
}
