<?php namespace Indikator\User\Http;


use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Auth;
use Exception;
use Illuminate\Auth\AuthenticationException;
/**
 * Http Back-end Controller
 */
class Http extends Controller
{
    
    public $implement = [
        'Mohsin.Rest.Behaviors.RestController'
    ];

    public $restConfig = 'config_rest.yaml';

    public function register(Resquest $req){

    }
    public function index(Request $r){

    }
    public function logged(Request $r){
        
        $loggedIn = Auth::check();

        return json_encode($loggedIn);
        if($loggedIn){
            $user = Auth::getUser();
            $resposta = array('status' => 1, 'message' => 'Usuário logado!','user' => $user);
            return json_encode($resposta);
        }else if(!$loggedIn){
            $resposta = array('status' => 0, 'message' => 'Nenhum usuário logado!');
            return json_encode($resposta);
        }
        
    }
    public function login(Request $r){
        try {
            $user = Auth::authenticate([
                'login' => $r->All()["email"],
                'password' => $r->All()["pass"]
            ]);
        
            $resposta = array('status' => 1, 'message' => 'Login efetuado com sucesso!','user' => $user);
            return json_encode($resposta);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
        
    }
    public function store(Request $r){
        if ($r->isMethod('post')) {
            try{
                $dados = $r->all();
                
                $user = Auth::register([
                    'name' => $dados["nome"],
                    'email' => $dados["email"],
                    'password' => $dados["pass"],
                    'password_confirmation' => $dados["pass"],
                ], true);
                $atual = Auth::findUserByLogin($dados["email"]);
                $j_user = json_encode($atual);
                $resposta = array('status' => 1, 'message' => 'Registrado com sucesso!','user' => $j_user);
                return json_encode($resposta);
                //
            } catch (Exception $e) {
                return $e->getMessage();
            }
            catch (InvalidArgumentException $e) {
                return $e->getMessage();
            }
        }
        if($r->isMethod('delete')) {
            return "delete";
        }
    }

}
