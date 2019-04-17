<?php namespace Peres\Estoque\Models;

use Model;

/**
 * Model
 */
class Categorias extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'peres_estoque_categorias';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
