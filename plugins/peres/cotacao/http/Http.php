<?php namespace Peres\Cotacao\Http;

use Backend\Classes\Controller;
use Peres\Cotacao\Models\Cotacao;
use Peres\Produtos\Models\Produtos;
use Carbon;
use Illuminate\Support\Facades\DB;
/**
 * Http Back-end Controller
 */
class Http extends Controller
{
    public $implement = [
        'Mohsin.Rest.Behaviors.RestController'
    ];

    public $restConfig = 'config_rest.yaml';

    public function getAll(){
        
        $ldate = date('Y-m-d H:i:s');

        $todo = Cotacao::where('data_final','>', $ldate)->get();
        $relation = DB::table('cotacao_produtos')->get();
      
        foreach ($todo as $key => $value){
            $prods = [];
            foreach ($relation as $key => $r){
                $arr = (array)$r;
                if($arr['cotacao_id'] == $value['id']){
                    $prod = Produtos::where('id', '=', $arr['produtos_id'])->get();
                   
                    array_push($prods,$prod);
                }
            }
            $value["prods"] = $prods;
        }

        if(sizeof($todo) > 0) {
            return json_encode([
                'status' => 1,
                'total' => sizeof($todo),
                'message' => 'Um total de '.sizeof($todo).' cotações foram encontradas com sucesso', 
                'data' => $todo
            ]);
        }else{
            return json_encode([
                'status' => 0,
                'message' => 'Nenhuma cotação encontrada', 
                'data' => $todo
            ]);
        }
        
    }
}
