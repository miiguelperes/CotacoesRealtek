<?php namespace Peres\Cotacoespreenchidas\Http;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Peres\Cotacoespreenchidas\Models\CotacoesPreenchidas;
/**
 * Http Back-end Controller
 */
class Http extends Controller
{
    public $implement = [
        'Mohsin.Rest.Behaviors.RestController'
    ];

    public $restConfig = 'config_rest.yaml';

    public function inserir(Request $r){
        $resp = $r->All();
        try {

            $dados = CotacoesPreenchidas::where([
                ['idfornecedor', '=', $resp[0]["idfornecedor"]],
                ['idcotacao', '=', $resp[0]["idcotacao"]]                
                ])->get();

            if(count($dados) > 0){

                CotacoesPreenchidas::where([
                    ['idfornecedor', '=', $resp[0]["idfornecedor"]],
                    ['idcotacao', '=', $resp[0]["idcotacao"]]                
                    ])->delete();

            }
            
            foreach ($resp as $v){
                if(isset($v["preco"])){
                    $obj = new CotacoesPreenchidas;
                    $obj->idproduto = $v["idproduto"];
                    $obj->idcotacao = $v["idcotacao"];
                    $obj->idfornecedor = $v["idfornecedor"];
                    $obj->preco = $v["preco"];
                    $obj->save();
                }
            }
            $resposta = array('status' => 1, 'message' => 'Cotação salva com sucesso!');
            return json_encode($resposta);
        } catch (\Throwable $th) {
            $resposta = array('status' => 0, 'message' => 'Erro ao salvar cotação', 'err'=>$th->getMessage());
            return json_encode($resposta);
        }
    }
    public function preenchidas(Request $r){
        $resp = $r->All();
        $idcotacao = $resp["idcotacao"];
        $dados = CotacoesPreenchidas::where([
            ['idcotacao', '=', $idcotacao]
            
            ])->get();
        return ($dados);
    }

 
    public function exist(Request $r){
        $resp = $r->All();
        $dados = CotacoesPreenchidas::where([
            ['idfornecedor', '=', $resp["idfornecedor"]],
            ['idcotacao', '=', $resp["idcotacao"]]                
            ])->get();
        
        if(count($dados) > 0){
            $resposta = array('status' => 2, 'message' => 'Cotação já enviada, deseja enviar novamente?');
            return json_encode($resposta);
        }else{
            $resposta = array('status' => 1, 'message' => 'Nenhuma cotação cadastrada.');
            return json_encode($resposta);
        }
        
    }
}
