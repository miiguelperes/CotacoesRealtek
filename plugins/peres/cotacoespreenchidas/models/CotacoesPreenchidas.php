<?php namespace Peres\Cotacoespreenchidas\Models;

use Model;

/**
 * Model
 */
class CotacoesPreenchidas extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'peres_cotacoespreenchidas_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
