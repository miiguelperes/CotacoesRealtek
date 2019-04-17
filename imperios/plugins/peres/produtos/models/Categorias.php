<?php namespace Peres\Produtos\Models;

use Model;

/**
 * Model
 */
class Categorias extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'peres_produtos_categorias';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
