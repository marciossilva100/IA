<?php

namespace App\Http\Controllers;
use \Exception;
use Illuminate\Http\Request;
use App\cliente;
use App\palavras_cliente;

class autenticarController extends Controller
{
    public function getAjax(){
        return view('login');
    }

    public function getAutenticacao(Request $request){
        try{       

            
            $senha = md5($request->senha);
            $select = cliente::select('id_cliente','email','nome')->where('email',$request->email)->where('senha',$senha)->get();
            $count = $select->count();


            if($count > 0):

                // SETA OS COOKIES
                if(!empty($request->lembrar)):
                    setcookie("senha_cookie", $request->senha, time()+3600*24*30*12*5);
                    setcookie("email_cookie", $request->email, time()+3600*24*30*12*5);
                endif;

                

                foreach($select as $value){
                    $id_cliente = $value->id_cliente;
                    $nome = $value->nome;
                }

                // SETA 2 PARA IDENTIFICAR QUE O O USUARIO É NOVO
                $update = palavras_cliente::where('id_cliente',$id_cliente)->update(
                    ['id_ativo'=>2]
                );

                // SETA AS SESSOES
                $request->session()->put('email', $request->email);
                $request->session()->put('id_cliente', $id_cliente);
                $request->session()->put('user', $nome);
                $request->session()->put('cad_person', 1);
                $request->session()->put('interesse', $request->interesse);

            else: 
                throw new Exception($count);
            endif;

            // return json_encode(compact('count'));
            return json_encode(compact('count'));


        }catch(Exception $e){

            $msg = $e->getMessage();
            return json_encode(compact('msg'));
        }
    }
}


