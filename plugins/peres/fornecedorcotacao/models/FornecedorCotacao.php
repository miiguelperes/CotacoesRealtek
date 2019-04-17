<?php namespace Peres\Fornecedorcotacao\Models;

use Model;

/**
 * Model
 */
class FornecedorCotacao extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'peres_fornecedorcotacao_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo =[
        'user'=>['RainLab\User\Models\User']
    ];

    public $belongsToMany = [
        'cotacao_id' => ['Peres\Cotacao\Models\Cotacao'],
    ];
}
