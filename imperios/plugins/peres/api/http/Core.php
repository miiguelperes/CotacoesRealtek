<?php namespace Peres\API\Http;

use Backend\Classes\Controller;

/**
 * Core Back-end Controller
 */
class Core extends Controller
{
    public $implement = [
        'Mohsin.Rest.Behaviors.RestController'
    ];

    public $restConfig = 'config_rest.yaml';

    public function test(Request $request){
        return response()->json([
            'message' => "o mozar é gay",
        ], 404);
    }
    public function __construct()
    {
        return "here"
    }
    

}
