<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\respostas;
use App\palavras_cliente;
use Illuminate\Support\Facades\DB;
use \Exception;

class responseChat extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        try{

        // $request->session()->put('id_cliente', $request->id_cliente);
        session(['id_cliente'=>$request->id_cliente]);

        // if(!session("id_cliente")):
        //     $resposta_str = 'exit';
        //     return json_encode(compact('resposta_str'),JSON_UNESCAPED_UNICODE);
        // endif;

        $id_cliente = session('id_cliente');
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i:s');
        $date_aux = explode(" ",$date);



        if($request->cod == 'spk' || $request->cod == 'gelo'):
            if($request->cod == 'spk') $id = 3;
            if($request->cod == 'gelo'){
                
                if($request->person == 1) $id = 125;
                if($request->person == 2) $id = 235;
            } 

            $resposta_str = responseChat::respostaPadrao($id,$id_cliente,$date);           
            // return json_encode(compact('resposta_str'),JSON_UNESCAPED_UNICODE);

            return response()->json(['resposta'=> $resposta_str],200);
 
        endif;


       
        $msg2 = $request->msg;

        $msg2 = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),
        explode(" ","a A e E i I o O u U n N"),$msg2);

        $msg2 = str_replace("vc","voce",$msg2);
        $msg2 = str_replace(","," ",$msg2);
        $msg2 = str_replace(".","",$msg2);
        $msg2 = str_replace("!","",$msg2);
        $msg2 = str_replace("ç","c",$msg2);
        $msg2 = mb_strtolower($msg2);
        

// COMEÇA VERIFICANDO SE A FRASE EXISTE DENTRO DA TABELA PALAVRAS
             $resposta = DB::table('palavras')
                ->select('palavra','id_resposta')
                ->get();

            $row2 = $resposta->count();
            if($row2>0):          
                
                foreach($resposta as $lista){
                    $explodePalavras = explode(',',$lista->palavra);

                    if(in_array($msg2,$explodePalavras)){
                        $idResposta = $lista->id_resposta;
                        break;
                    }                               
                }
                        
                if(isset($idResposta)):           
                    $resposta2 = DB::table('respostas')
                    ->select('resposta')
                    ->where('id_resposta',$idResposta)
                    ->limit(1)
                    ->get();
                    $row3 = $resposta2->count();
                        if($row3>0):
                            foreach($resposta2 as $value){
                                $msg = $value->resposta;
                            }

                            $resp2 = responseChat::msgRepeticao($id_cliente,$msg);

    
                            if(!empty($resp2)):
                                shuffle($resp2);
                                // $rand_keys = array_rand($resp2, 2);
                                // $resposta_str = $resp2[$rand_keys[0]];
                                $resposta_str = $resp2[0];
                                $resposta_str = str_replace("*",",",$resposta_str);
                            else:
                                // $resposta_str = ucfirst(session('user')).", acho que estamos entrando numa conversa repetitiva, seria interessante mudar de assunto não acha?";
                                $id = 126;
                                $respostaDefault = 1;
                                $resposta_str = responseChat::respostaPadrao($id,$id_cliente,$date);           

                            endif;
    
                        endif;
                    $go2 = 0;

                else: 
                    
                    $go2 = 1;
                endif;
        
// FIM VERIFICACAO

            if($go2 > 0):
                // $msg2 = str_replace("?","",$msg2);

                $msg3 = mb_strtolower($msg2);
                $msg3 = str_replace("?","",$msg3);

                $msg3 = explode(" ",$msg3);
                $prep = ['a','á','à','com','de','desde','em','entre','por','sem','e','é','de','um','uma','ate','até','ate',
                'para','pra','pow','pela','pelo','por','quê','que','o','as','os','uns','umas','no','nos','num'];
              

                $tt =  DB::table('ocasioes')
                ->select('id_ocasiao','ocasiao')
                ->get(); 
                $rowTest = $tt->count();

                foreach ($msg3 as  $value) {  

                    if(!in_array($value,$prep)){  
                      
                        if($rowTest > 0):
                            foreach($tt as $lista){
                                $explode = explode(',',$lista->ocasiao);

                                if(in_array($value,$explode)){
                                    $idOcasiao[] = $lista->id_ocasiao;
                                    // break;
                                }
                                
                            }
                        endif;

                    }
                
                }
                // $testRow2 = implode(',', $idOcasiao);

                if(isset($idOcasiao)):

                        $idOcasiao2 = array_unique($idOcasiao);
                        $idOcasiao3 = implode(',',$idOcasiao2);
                    
                        foreach ($msg3 as  $value){  
                            if(!in_array($value,$prep)){  
                            $sql =  DB::table('palavras_criterios as pc')
                            ->join('ocasioes as o', 'pc.id_ocasiao', '=', 'o.id_ocasiao')
                            ->select('pc.id_plvcriterio')
                            ->where('pc.palavra','like','%'.$value.'%')
                            ->whereIn('pc.id_ocasiao', $idOcasiao2)
                            ->get();

                            $row3 = $sql->count();
                            if($row3 > 0):
                                foreach ($sql as  $value2){
                                    // $arrayResposta[] =  $value2->resposta;                          
                                    $arrayPega[] =  $value2->id_plvcriterio;
                                }
                            endif;
                        }

                    }
                else: 
                    $resposta_str = "Me desculpe mas não compreendi da forma que voce falou, tente reformular.";
                endif;

                if(isset($arrayPega)):
                    $arrayRes1 = array_count_values($arrayPega);
                    $maxResp1 = max($arrayRes1);
                    $idResp = array_search($maxResp1,$arrayRes1);
                    // $resposta_str = "Me desculpe mas não compreendi da forma que voce falou, tente reformular.";
                    // $sql =  DB::table('palavras_criterios as pc')
                    // ->join('respostas as r', 'pc.id_resposta', '=', 'r.id_resposta')
                    // ->select('r.resposta','pc.palavra','pc.id_plvcriterio')
                    // ->where('pc.id_plvcriterio',$idResp)
                    // ->limit(1)
                    // ->get();
                    $person = $request->person;
                    $sql = DB::table('respostas as r')
                    ->join('palavras_criterios as pc','r.id_criterio','=','pc.id_plvcriterio')
                    ->select('r.resposta','pc.palavra')
                    ->where('r.id_criterio',$idResp)
                    ->where(function ($query) use($person){
                        $query->where('r.id_genero',$person)
                        ->orWhere('r.id_genero',3);
                    })
                    ->get();

                    $row7 = count($sql);
                                   
                    if($row7 > 0):

                        foreach($sql as $value){
                            $msg = $value->resposta;
                            // $idcriterio = $value->id_plvcriterio;
                            $plv = $value->palavra;
                        }

                    // FIM VERIFICACAO 
                        
                        $resp2 = responseChat::msgRepeticao($id_cliente,$msg);
                        if(!empty($resp2)):
                            shuffle($resp2);
                            // $rand_keys = array_rand($resp2, 2);
                            // $resposta_str = $resp2[$rand_keys[0]];
                            $resposta_str = $resp2[0];
                            $resposta_str = str_replace("*",",",$resposta_str);
                        else:
                            // $resposta_str = ucfirst(session('user')).", acho que estamos entrando numa conversa repetitiva, talvez devamos mudar de assunto.";
                            // $res= palavras_cliente::where('id',$id)->delete();
                            $id = 126;
                            $respostaDefault = 1;
                            $resposta_str = responseChat::respostaPadrao($id,$id_cliente,$date);    
                        endif;

                    else: 
                        $resposta_str = "Me desculpe mas não compreendi da forma que voce falou, tente reformular.";
                    endif;
                else:
                    $resposta_str = "Me desculpe mas não compreendi da forma que voce falou, tente reformular.";
                endif;
                
            endif;

        endif;
        
        $resposta_str = str_replace("\n","",$resposta_str);
        $resposta_str = str_replace("\r","",$resposta_str);

        

        // if(isset($rowNome)):
        //     $resposta_str = str_replace("@",ucfirst($nome),$resposta_str);
        // endif;

        DB::table('palavras_clientes')->insert(
            ['frase' => $msg2,'id_cliente'=> $id_cliente,'created_at' => $date,'resposta'=>$resposta_str,'id_ativo'=>1]
        );

        $resposta_str = str_replace("#",ucfirst(session('user')),$resposta_str);

        if(isset($nome)): 
            $resposta_str = str_replace("@",ucfirst($nome),$resposta_str);
        endif;
        // $resposta_str = preg_replace("~\\~","",$resposta_str);

        $sql = DB::table('palavras_clientes')
        ->select('created_at')
        ->where('id_cliente',$id_cliente)
        ->where('id_ativo',1)
        ->get();

        $row = $sql->count();
        foreach($sql as $value){
            $dataAt = $value->created_at;
        }
        if($row>0):
            $dataExplde = explode(" ",$dataAt);
            // $horas = $dataExplde[1];
            $dataExplde = explode(":",$dataExplde[1]);
            $min =  $dataExplde[1] + 1;
            $sec =  $dataExplde[2] ;
        else: 
            $min = 00;
            $sec = 00;
        endif;

        $cod = 0;
        // $resposta_str =  $idOcasiao3;
        
        // return json_encode($resposta_str,JSON_UNESCAPED_SLASHES);
        // return json_encode(compact('resposta_str','min','sec','cod'),JSON_UNESCAPED_UNICODE);
        return response()->json(['resposta'=> $resposta_str,
                                'min'=> $min,
                                'sec'=>$sec],200);

        // return json_encode($resposta_str,JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            return json_encode($e->getMessage());
        }
        

    }

    // RETORNA UMA MENSAGEM PADRÃO
    public function respostaPadrao($id,$id_cliente,$date){
        $resposta2 = DB::table('respostas')
                    ->select('resposta')
                    ->where('id_resposta',$id)
                    ->limit(1)
                    ->get();
                    $row3 = $resposta2->count();
                        if($row3>0):
                            foreach($resposta2 as $value){
                                $msg = $value->resposta;
                            }
                        endif;
                          
                $resp2 = responseChat::msgRepeticao($id_cliente,$msg);

                if(!empty($resp2)):
                    shuffle($resp2);
                    $resposta_str = $resp2[0];
                    $resposta_str = str_replace("*",",",$resposta_str);
                else:
                    $resposta_str = session('user').", acho que estamos entrando numa conversa repetiviva, talvez devamos mudar de assunto.";
                endif;
                DB::table('palavras_clientes')->insert(
                    ['frase' => null,'id_cliente'=> $id_cliente,'created_at' => $date,'resposta'=>$resposta_str,'id_ativo'=>1]
                );
        
                $resposta_str = str_replace("#",ucfirst(session('user')),$resposta_str);

            // return json_encode(compact('resposta_str'),JSON_UNESCAPED_UNICODE);
            return $resposta_str;
    }

    // ADMINISTRA AS MENSAGENS REPETIDAS
    public static function msgRepeticao($id_cliente,$msg){
        $sql = DB::table('palavras_clientes')
        ->select('resposta')
        ->where('id_cliente',$id_cliente)
        ->where('id_ativo',1)
        ->orderBy('id_memoria','DESC')
        ->limit(6)
        ->get();

        $row = $sql->count();
        if($row > 0){                       
            foreach($sql as $value){
                $respMem[] = $value->resposta;
            } 
        }else{
            $respMem[] = "";
        }

        // if(isset($respMem)):
            $resp = explode(",",$msg);
            foreach($resp as $value){
                $value = str_replace("*",",",$value);
            
                
                if(!in_array($value,$respMem)):     
                    $resp2[] = $value;
                endif;                                                                                 
            }
            if(!isset($resp2)): 
                 $resp2 = null;
            endif;

        // else: 
        //    $resp2 = null;
        // endif;

        return $resp2;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
}
