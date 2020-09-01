<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ocasioe;
use Illuminate\Support\Facades\DB;
use App\tema;


class buscaController extends Controller
{
    public function getAjax(){
        if(session('email')):
            return view('admin');
        else: 
            return redirect('login');
        endif;
    }

    // FUNCAO PARA RETORNAR AS OCASIOES 
    public function getOcasiao(Request $request){

        if($request->cod == 1):
            $resposta = DB::table('temas')
            ->select('id_tema','tema')
            ->get();

    
            foreach($resposta as $value){

                $id_tema[] = $value->id_tema;
                $tema[] = $value->tema;
            
            }
        
            return json_encode(compact('id_tema','tema'),JSON_UNESCAPED_UNICODE);
            
        // cod 2 se opçao vir do <select> do tema retorna dados para montar a <table>
        elseif($request->cod == 2):

            if($request->id_tema != 0):
                $resposta = DB::table('ocasioes as o')
                ->join('temas as t','o.id_tema','=','t.id_tema')
                ->select('o.ocasiao','t.tema','o.id_ocasiao','o.id_tema')            
                ->where('o.id_tema',$request->id_tema)
                ->get();
                $cod = 1;
            else: 
                $resposta = DB::table('ocasioes as o')
                ->join('temas as t','o.id_tema','=','t.id_tema')
                ->select('o.ocasiao','t.tema','o.id_ocasiao','o.id_tema')
                ->get();
                $cod = 0;
            endif;
    
            foreach($resposta as $value){

                $id_ocasiao[] = $value->id_ocasiao;
                $ocasiao[] = $value->ocasiao;
                $idtema[] = $value->id_tema;
                $tema[] = $value->tema;
            
            }
        
            return json_encode(compact('id_ocasiao','ocasiao','tema','idtema','cod'),JSON_UNESCAPED_UNICODE);
        
        // adiciona tema no banco de dados
        elseif($request->cod == 3 && !empty($request->tema)): 

            try{

                $tema = mb_strtolower($request->tema);
                $tema = ucfirst($tema);
                
                $busca = tema::select('tema')->where('tema',$tema)->get();
                
                $count = $busca->count();
                if($count > 0) throw new Exception('Tema já existe, por favor escolha outro!');
                $insert = DB::select('INSERT INTO temas (tema)
                SELECT "'.$tema.'" WHERE NOT EXISTS(SELECT tema FROM temas WHERE  tema ="'.$tema.'")');

            }catch(Exception $e){
                $msg = $e->getMessage();
                return json_encode($msg,JSON_UNESCAPED_UNICODE);
            }
        
        // grava as ocasioes no banco de dados
        elseif($request->cod == 4): 

            $palavras = $request->ocasiao;
            $insert = ocasioe::insert([
                ['ocasiao' => $palavras,'id_tema' => $request->temaId]
            ]);    
        endif;

    }
}
