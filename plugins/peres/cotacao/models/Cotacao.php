<?php namespace Peres\Cotacao\Models;

use Model;

/**
 * Model
 */
class Cotacao extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'peres_cotacao_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsToMany = [
        'produtos' => ['Peres\Produtos\Models\Produtos',
                        'table' => 'cotacao_produtos']

    ];
}
