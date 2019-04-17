<?php namespace Peres\Cotacoespreenchidas\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class CotacoesPreenchidas extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController'    ];
    
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
    }
}
