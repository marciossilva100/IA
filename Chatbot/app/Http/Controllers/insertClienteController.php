<?php

namespace App\Http\Controllers;
// use App\config\session;
use Illuminate\Http\Request;
use App\cliente;

class insertClienteController extends Controller
{


    public function getAjax(){
        return view('start');
    }

    // INSERE PESSOAS NA BASE
    public function insertCliente(Request $request){
        try{
            // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
            date_default_timezone_set('America/Sao_Paulo');
            $data = date('Y-m-d H:i:s');

            // $senha = md5($request->senha);            
            $insert = cliente::insert([
                ['nome'=>$request->apelido,'created_at'=>$data,'id_interesse'=>$request->interesse]
            ]);

            if($insert):
                // $select = cliente::select('id_cliente','nome')->where('email',$request->email)->get();
                $select = cliente::select('id_cliente','nome')->orderBy('id_cliente','DESC')->limit(1)->get();
                $row = $select->count();

                if($row > 0):
                    foreach($select as $value){
                        $id_cliente = $value->id_cliente;
                        $nome = $value->nome;
                    }
                else: 
                    throw new Exception('Error');
                endif;
                // $request->session()->put('email', $request->email);
                $request->session()->put('id_cliente', $id_cliente);
                $request->session()->put('user', $nome);
                $request->session()->put('interesse', $request->interesse);
                $request->session()->put('avatar', $request->avatar);
                // $request->session()->put('person', $request->person);
            else: 
                throw new Exception('Error');
            endif;
            
            // $value = session('nome');       
            // echo $value;
            // return json_encode(compact('count'));


        }catch(Exception $e){

            return json_encode($e->getMessage());

        }
    }
    
}
