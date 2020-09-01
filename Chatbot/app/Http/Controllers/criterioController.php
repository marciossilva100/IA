<?php
namespace App\Http\Controllers;
use Illuminate\Http\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ocasioe;
use App\respostas;
use App\palavras_criterio;

error_reporting(0);

// session_start();

class criterioController extends Controller
{
    public function getAjax(){

    if(session('email')):
        return view('ocasioesEdit');
    else: 
        return redirect('login');
    endif;
    }

    public function getCriterio(Request $request){

        if($request->cod == 1):
            $resposta = DB::table('tempo_verbos')
            ->select('id_tempo','tempo')
            ->get();
    
            foreach($resposta as $value){

                $id_tempo[] = $value->id_tempo;
                $tempo[] = $value->tempo;
            
            }
        
            return json_encode(compact('id_tempo','tempo'),JSON_UNESCAPED_UNICODE);
            
        elseif($request->cod == 2): 
          
                // $resposta = DB::table('palavras_criterios as pc')
                // ->join('ocasioes as o','pc.id_ocasiao','=','o.id_ocasiao')
                // ->join('tempo_verbos as tv','pc.id_tempo','=','tv.id_tempo')
                // ->join('respostas as r','pc.id_plvcriterio','=','r.id_criterio')
                // ->select('pc.id_plvcriterio','pc.palavra','r.resposta','r.id_resposta','pc.id_tempo','o.ocasiao')            
                // ->where('pc.id_tempo',$request->id_tempo)
                // ->where('pc.id_ocasiao',$request->id_ocasiao)
                // ->limit(1)
                // ->get();

                $resposta = DB::table('palavras_criterios as pc')
                ->join('ocasioes as o','pc.id_ocasiao','=','o.id_ocasiao')
                ->join('tempo_verbos as tv','pc.id_tempo','=','tv.id_tempo')
                ->select('pc.id_plvcriterio','pc.palavra','pc.id_tempo','o.ocasiao')            
                ->where('pc.id_tempo',$request->id_tempo)
                ->where('pc.id_ocasiao',$request->id_ocasiao)
                ->limit(1)
                ->get();

            $count = $resposta->count();
            foreach($resposta as $value){

                // $id_resposta = $value->id_resposta;
                $id_criterio = $value->id_plvcriterio;
                // $resposta = $value->resposta;
                $palavra = $value->palavra;
                $id_tempo = $value->id_tempo;
                $ocasiao = $value->ocasiao;
            
            }
            
            $palavraText = explode(',',$palavra);
            $respostaText = explode(',',$resposta);
            // foreach($respostaTextAux as $value){
            //     $respostaText[] = str_replace("*",",",$value);
            // }

            // return json_encode(compact('id_resposta','id_criterio','respostaText','palavraText','id_tempo','ocasiao','count'),JSON_UNESCAPED_UNICODE);
            return json_encode(compact('id_criterio','palavraText','id_tempo','ocasiao','count'),JSON_UNESCAPED_UNICODE);

        elseif($request->cod == 4):
            try{
                // if($request->id_ocasiao == 0):
                //     // $palavras = implode
                //     $insert = ocasioe::insert([
                //         ['ocasiao' => $request->palavras, 'id_tema' => $request->idtema]
                //     ]);


                // else: 
                //     $affected = ocasioe::where('id_tema', $request->idtema)
                //     ->where('id_ocasiao',$request->id_ocasiao)
                //     ->update(['ocasiao' => $request->palavras])
                //     ->limit(1);
                //     // $insert = DB::select('UPDATE ocasioes SET ocasiao="'.$request->palavras.'" WHERE id_ocasiao="'.$request->id_ocasiao.'" AND id_tema="'.$request->idtema.'" LIMIT 1');
                // endif;

                $select = DB::table('respostas')->select('id_resposta','resposta')->get();
                foreach($select as $value){
                    $id_resposta[] = $value->id_resposta;
                    $resposta[] = $value->resposta;
                }


                return json_encode(compact('id_resposta','resposta'),JSON_UNESCAPED_UNICODE);

            }catch(Exception $e){
                return json_encode($e->getMessage());
            }    
        elseif($request->cod == 5): 

            if($request->id_resposta == 0):
            try{
                $temaId = $request->idTema;
                $temaText = $request->temaText;

                if($request->id_ocasiao == 0):
                    $insert = ocasioe::insert([
                        ['ocasiao' => $request->ocasiao, 'id_tema' => $request->idTema]
                    ]);
                    $select = ocasioe::select('id_ocasiao')
                    ->orderBy('id_ocasiao','DESC')
                    ->limit(1)
                    ->get();

                    foreach($select as $value){
                        $id_ocasiao = $value->id_ocasiao;
                    }

                else: 
                    $affected = ocasioe::where('id_ocasiao',$request->id_ocasiao)
                    ->update(['ocasiao' => $request->ocasiao]);   

                    $id_ocasiao = $request->id_ocasiao;   
                endif;   

                
                if($request->id_criterio == 0){
                    $insert = palavras_criterio::insert([
                        ['palavra' => $request->palavras, 'id_tempo' => $request->id_tempo, 'id_ocasiao' => $id_ocasiao]
                    ]);
                }else{
                    $update = palavras_criterio::where('id_plvcriterio', $request->id_criterio)
                        ->update(['palavra' => $request->palavras]);
                }

                $select = palavras_criterio::select('id_plvcriterio')
                ->where('id_ocasiao',$id_ocasiao)
                ->where('id_tempo',$request->id_tempo)
                ->orderBy('id_plvcriterio','DESC')
                ->get();
                foreach($select as $value){
                    $id_criterio = $value->id_plvcriterio;
                }

                $insert = respostas::insert([
                    ['resposta' => $request->respostas, 'id_genero' => $request->id_genero,'id_criterio' => $id_criterio]
                ]);
                return json_encode(compact('id_ocasiao','temaId','temaText'),JSON_UNESCAPED_UNICODE);
                }catch(Exception $e){
                return json_encode($e->getMessage(),JSON_UNESCAPED_UNICODE);

                }
            else: 
                try{
                    $affected = ocasioe::where('id_ocasiao',$request->id_ocasiao)
                    ->update(['ocasiao' => $request->ocasiao]);   

                    if(!empty($request->id_criterio) && $request->id_criterio !='undefined'):
                        $update = palavras_criterio::where('id_plvcriterio', $request->id_criterio)
                        ->update(['palavra' => $request->palavras]);
                    else: 
                        $insert = palavras_criterio::insert([
                            ['palavra' => $request->palavras, 'id_tempo' => $request->id_tempo, 'id_ocasiao' => $request->id_ocasiao, 'id_resposta' => $request->id_resposta]
                        ]);
                    endif;

                    $update = respostas::where('id_resposta',$request->id_resposta)
                    ->update(['resposta' => $request->respostas,'id_genero'=> $request->id_genero,'id_criterio'=>$request->id_criterio]);

                     
                }catch(Exception $e){
                    return json_encode($e->getMessage());
                }
                 
            endif;

        elseif($request->cod == 6): 
            try{

                // if($request->id_ocasiao == 0): 
                //     $id_ocasiao = $_SESSION['id_ocasiao'];
                // else: 
                    $id_ocasiao = $request->id_ocasiao;
                // endif;

                $select = ocasioe::select('ocasiao')
                ->where('id_ocasiao',$id_ocasiao)
                ->limit(1)
                ->get();

                $count = $select->count();

                foreach($select as $value){

                    $ocasiao = $value->ocasiao;
                
                }    
                $respostaText = explode(',',$ocasiao);
                return json_encode(compact('respostaText','count'),JSON_UNESCAPED_UNICODE);
            }catch(Exception $e){
                return json_encode($e->getMessage());
            }
        elseif($request->cod == 7): 
            try{
                $select = respostas::select('resposta')->where('id_resposta',$request->id_resposta)
                ->get();

                foreach($select as $value){
                    $resposta = $value->resposta;
                }

                $respostaText = explode(",",$resposta);

                return json_encode(compact('respostaText'),JSON_UNESCAPED_UNICODE);
            }catch(Exception $e){
                return json_encode($e->getMessage());                
            }
        elseif($request->cod == 8): 
            try{
                $select = respostas::select('resposta','id_resposta')
                ->where('id_criterio',$request->id_criterio)
                ->where('id_genero',$request->id_genero)
                ->get();

                foreach($select as $value){
                    $resposta = $value->resposta;
                    $id_resposta = $value->id_resposta;
                }
                $respostaText = explode(",",$resposta);

                return json_encode(compact('respostaText','id_resposta'),JSON_UNESCAPED_UNICODE);

            }catch(Exception $e){
                return json_encode($e->getMessage());                               
            }
        endif;

    }
}
