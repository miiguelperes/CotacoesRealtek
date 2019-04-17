<?php namespace Peres\Vendas\Http;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use Auth;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Peres\Vendas\Models\Vendas;
/**
 * Http Back-end Controller
 */
class Http extends Controller
{
    public $implement = [
        'Mohsin.Rest.Behaviors.RestController'
    ];

    public $restConfig = 'config_rest.yaml';
    public function index(){

    }

    public function cadastra(Request $r){
        if ($r->isMethod('post')) {
            $data = $r->All();
            $venda = new Vendas;

            $venda->cliente_id = $data["user"];
            $venda->obs = $data["obs"];
            $venda->endereco = $data["endereco"];
            $venda->descricao = $data["produtos"];
            $venda->total = $data["total"];

            $venda->save();
            
            $resposta = array('status' => 1, 'message' => 'Venda cadastrada sucesso!','venda' => $venda);
            return json_encode($resposta);
        }
        
    }

}
