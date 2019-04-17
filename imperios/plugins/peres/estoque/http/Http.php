<?php namespace Peres\Estoque\Http;

use Backend\Classes\Controller;

/**
 * Http Back-end Controller
 */
class Http extends Controller
{
    public $implement = [
        'Mohsin.Rest.Behaviors.RestController'
    ];

    public $restConfig = 'config_rest.yaml';

}
