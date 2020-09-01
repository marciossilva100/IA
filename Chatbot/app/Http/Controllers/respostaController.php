<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\respostas;
use App\palavras_cliente;
use Illuminate\Support\Facades\DB;
use \Exception;

class respostaController extends Controller
{
    public function getAjax(){

        // $teste = 'certo';
        if(session()->has("id_cliente")):
            return view('chat');
        else: 
            return redirect('start-chatbot');
        endif;
        // return json_encode($teste);

    }

    public function getInteresse($interesse,$genero){

        if($interesse == 1): 

            $banner_top_mob ='<div class="banner-mob-top banner-mobile">
            <script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002698;
            ord=1594756749037;idt_product=36;aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_category=707;idt_banner=2390;
            idt_url=375726;caf=2ed9e08468184d94af8049f88a63fedc;creative=QUZJTElBRE9TX1VPTF9EaWV0YV9VT0xfRGlldGFfMzAweDUw;click="></script>
            </div>';
            $banner_top_desk = '<div class="banner-desktop" ><script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002447;
            ord=1595032008798;idt_product=36;aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_category=707;idt_banner=2395;
            idt_url=375726;caf=2ed9e08468184d94af8049f88a63fedc;creative=QUZJTElBRE9TX1VPTF9EaWV0YV9VT0xfRGlldGFfNzI4eDkw;click="></script>
            </div>';
          

            $select = DB::table('banners')
            ->select('banner')
            ->where('id_interesse',$interesse)
            ->where('ativo',1)
            ->where(function ($query) use($genero){
                $query->where('id_genero',$genero)
                ->orWhere('id_genero',3);
            })
            ->get();     
            $row = $select->count();
            
        // ORGANIZA E RETORNA OS BANNERS
        elseif($interesse == 2): 

            if($genero == 1): 
                $banner_top_mob = '<div class="banner-mob-top"><script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002698;ord=1595006847367;idt_product=144;
                aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_category=856;idt_banner=3226;idt_url=375726;
                caf=2ed9e08468184d94af8049f88a63fedc;creative=QUZJTElBRE9TX1VPTF9NZXVfTmVn82Npb19Mb2phX1ZpcnRVT0xfMzAweDUw;click="></script></div>';

                $banner_top_desk = '<div class="banner-desktop" ><!-- LOMADEE - BEGIN -->
                <script src="//ad.lomadee.com/banners/script.js?sourceId=36693737&dimension=1&height=90&width=728&method=1&advertisers=5632&tags=25" type="text/javascript" language="javascript"></script>
                <!-- LOMADEE - END -->
                </div>';
            endif;

            if($genero == 2): 
                $banner_top_mob = '<div class="banner-mob-top"><!-- LOMADEE - BEGIN -->
                <script src="//ad.lomadee.com/banners/script.js?sourceId=36693737&dimension=7&height=50&width=320&method=1&advertisers=6624&tags=481" type="text/javascript" language="javascript"></script>
                <!-- LOMADEE - END --></div>';           

                $banner_top_desk = '<div class="banner-desktop" ><!-- LOMADEE - BEGIN -->
                <script src="//ad.lomadee.com/banners/script.js?sourceId=36693737&dimension=1&height=90&width=728&method=1&advertisers=6985" type="text/javascript" language="javascript"></script>
                <!-- LOMADEE - END -->
                </div>';
            endif;

            

            $select = DB::table('banners')
            ->select('banner')
            ->where('id_interesse',$interesse)
            ->where('ativo',1)
            ->where(function ($query) use($genero){
                $query->where('id_genero',$genero)
                ->orWhere('id_genero',3);
            })
            ->get();  
            $row = $select->count();

        elseif($interesse == 3):
           
            $banner_top_mob ='<!-- LOMADEE - BEGIN -->
            <div class="banner-mob-top">
            <script src="//ad.lomadee.com/banners/script.js?sourceId=36693737&dimension=7&height=50&width=300&method=1&advertisers=6020&tags=25" type="text/javascript" language="javascript"></script>
            </div>
            <!-- LOMADEE - END -->';

            $banner_top_desk = '<div class="banner-desktop" ><script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002447;
            ord=1595042422445;idt_product=133;aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_category=684;idt_banner=2256;idt_url=375726;
            caf=2ed9e08468184d94af8049f88a63fedc;creative=QUZJTElBRE9TX1VPTF9MZWlhK19Db21ib19PZmVydGFfRXhjbHVzaXZhXzcyOHg5MA%3D%3D;click="></script>
            </div>';
           

            $banner_bottom = '<script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002907;ord=1594775195195;idt_product=158;
            aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_category=862;idt_banner=3283;idt_url=375726;caf=2ed9e08468184d94af8049f88a63fedc;
            creative=QUZJTElBRE9TX1VPTF9QbGF5X0Nvbmhl52FfVU9MX1BsYXlfMzIweDEwMA%3D%3D;click="></script>';

            $banner_left = '<div class="banner-desktop" ><script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002676;
            ord=1595043831969;idt_product=158;aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_category=862;idt_banner=3281;
            idt_url=375726;caf=2ed9e08468184d94af8049f88a63fedc;
            creative=QUZJTElBRE9TX1VPTF9QbGF5X0Nvbmhl52FfVU9MX1BsYXlfMjUweDI1MA%3D%3D;click="></script></div>';
            
        elseif($interesse == 4):

            $banner_top_mob = '<div class="banner-mob-top"><script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002695;ord=1594777496362;idt_product=33;
            aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_category=237,242,234,231,160,98,264,403,280,433,211;idt_banner=865;idt_url=375726;
            caf=2ed9e08468184d94af8049f88a63fedc;creative=QUZJTElBRE9TX1BvcnRhbF9FZHVjYefjb19DdXJzb3NfRGVfRW5mZXJtYWdlbV8zMjB4NTA%3D;click="></script></div>';

            $banner_top_desk = '<div class="banner-desktop" ><script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002447;
            ord=1595041807918;idt_product=33;aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_category=237,242,234,231,160,98,264,403,280,433,211;idt_banner=871;idt_url=375726;
            caf=2ed9e08468184d94af8049f88a63fedc;creative=QUZJTElBRE9TX1BvcnRhbF9FZHVjYefjb19DdXJzb3NfRGVfRW5mZXJtYWdlbV83Mjh4OTA%3D;click="></script>
            </div>';

            $select = DB::table('banners')
            ->select('banner')
            ->where('id_interesse',$interesse)
            ->where('ativo',1)
            ->where(function ($query) use($genero){
                $query->where('id_genero',$genero)
                ->orWhere('id_genero',3);
            })
            ->get();  
            $row = $select->count();

        elseif($interesse == 5): 
            $banner_top_mob = '<div class="banner-mob-top"><script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002698;
            ord=1594780718207;idt_product=35;aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_category=793;idt_banner=2980;idt_url=375726;caf=2ed9e08468184d94af8049f88a63fedc;
            creative=QUZJTElBRE9TX1VPTF9Fc3BvcnRlX0NsdWJlX0xhTGlnYV8zMDB4NTA%3D;click="></script></div>';

            if($genero == 1):
            $banner_bottom = '<!-- LOMADEE - BEGIN -->
            <script src="//ad.lomadee.com/banners/script.js?sourceId=36693737&dimension=8&height=250&width=250&method=1&advertisers=6149&tags=235" type="text/javascript" language="javascript"></script>
            <!-- LOMADEE - END -->';
            elseif($genero == 2): 
            $banner_bottom = '<!-- LOMADEE - BEGIN -->
            <script src="//ad.lomadee.com/banners/script.js?sourceId=36693737&dimension=4&height=250&width=300&method=1&advertisers=6328&tags=884" type="text/javascript" language="javascript"></script>
            <!-- LOMADEE - END -->';
            endif;

            $banner_left = '<div class="banner-desktop" ><!-- LOMADEE - BEGIN -->
            <script src="//ad.lomadee.com/banners/script.js?sourceId=36693737&dimension=8&height=250&width=250&method=1&advertisers=5632&tags=25" type="text/javascript" language="javascript"></script>
            <!-- LOMADEE - END --></div>';

            $banner_top_desk = '<div class="banner-desktop" ><script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002447;ord=1595043924396;
            idt_product=35;aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_category=807,725,793;idt_banner=3079;idt_url=375726;
            caf=2ed9e08468184d94af8049f88a63fedc;creative=QUZJTElBRE9TX1VPTF9Fc3BvcnRlX0NsdWJlX0NoYW1waW9uc19MZWFndWVfNzI4eDkw;click="></script></div>';

        elseif($interesse == 6): 
            $banner_top_mob = '<div class="banner-mob-top"><script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002698;ord=1594835483675;
            idt_product=144;aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_banner=3226;
            idt_url=375726;caf=2ed9e08468184d94af8049f88a63fedc;creative=QUZJTElBRE9TX1VPTF9NZXVfTmVn82Npb19NZXVfTmVn82Npb19O429fUGFyYV8zMDB4NTA%3D;click="></script></div>';

            $banner_top_desk = '<div class="banner-desktop" ><script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002447;
            ord=1595045051495;idt_product=144;aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_category=745,801,856;idt_banner=2492;
            idt_url=375726;caf=2ed9e08468184d94af8049f88a63fedc;
            creative=QUZJTElBRE9TX1VPTF9NZXVfTmVn82Npb19VT0xfQWdlbmRhZG9yXzcyOHg5MA%3D%3D;click="></script></div>';

            $select = DB::table('banners')
            ->select('banner')
            ->where('id_interesse',$interesse)
            ->where('ativo',1)
            ->where(function ($query) use($genero){
                $query->where('id_genero',$genero)
                ->orWhere('id_genero',3);
            })
            ->get();  
            $row = $select->count();

          

        elseif($interesse == 7): 

           if($genero == 2): 
                $banner_top_mob = '<div class="banner-mob-top"> <a href="https://go.hotmart.com/O38384891V" target="_blank"><img  src="img/pompoarismo-top.jpg"></a></div>';
                $banner_top_desk = '<div class="banner-desktop" ><a href="https://go.hotmart.com/X38489598E"><img src="img/banner-pompoarismo.png"></a></div>';
            endif;
           if($genero == 1): 
                $banner_top_mob = '<div class="banner-mob-top"><script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002698;
                ord=1594931662078;idt_product=23;aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_category=62;idt_banner=257;
                idt_url=375726;caf=2ed9e08468184d94af8049f88a63fedc;
                creative=QUZJTElBRE9TX1VPTF9TZXhvX1VPTF9TZXhvXzMwMHg1MA%3D%3D;click="></script></div>'; 

                $banner_top_desk = '<div class="banner-desktop" ><script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002447;
                ord=1595045868697;idt_product=23;aff_source=2ed9e08468184d94af8049f88a63fedc;cpg=Mzc1NzI2;idt_category=62;idt_banner=263;idt_url=375726;
                caf=2ed9e08468184d94af8049f88a63fedc;creative=QUZJTElBRE9TX1VPTF9TZXhvX1VPTF9TZXhvXzcyOHg5MA%3D%3D;click="></script></div>';
            endif;

            // $genero = 1;
            $select = DB::table('banners')
            ->select('banner')
            ->where('id_interesse',$interesse)
            ->where('ativo',1)
            ->where(function ($query) use($genero){
                $query->where('id_genero',$genero)
                ->orWhere('id_genero',3);
            })
            ->get();
            $row = $select->count();

        elseif($interesse == 8): 

                
                $banner_top_mob = '<div class="banner-mob-top"><a href="https://go.hotmart.com/C38619922S"><img src="img/projetospy-728x90.png"></a></div>'; 
     
                $banner_top_desk = '<div class="banner-desktop" ><a href="https://go.hotmart.com/C38619922S"><img src="img/projetospy-728x90.png"></a></div>';
                
     
                 // $genero = 1;
                 $select = DB::table('banners')
                 ->select('banner')
                 ->where('id_interesse',$interesse)
                 ->where('ativo',1)
                 ->where(function ($query) use($genero){
                     $query->where('id_genero',$genero)
                     ->orWhere('id_genero',3);
                 })
                 ->get();
                 $row = $select->count();    
        endif;       
        
        if(isset($row) && $row > 0): 
            foreach($select as $value){
                $banner_bottom[] = $value->banner;
            }
        // else: 
        //     $banner_bottom[] = null;
        endif;

        $banner_right_desk = '<div class="banner-desktop" ><!-- Vitrine Inteligente Lomadee -->
            <div class="g3S6Z4x927jE" style="width: 300px; height: 250px">
            <script type="text/javascript" class="lomadee-recommender-script" src="//ad.lomadee.com/v1/eyJwdWJsaXNoZXJJZCI6MjI3MDU4NjgsInNpdGVJZCI6MzQwOTU0NjEsInNvdXJjZUlkIjozNjcwMzY2MX0%3D.js?w=300&h=250&notStoreId=6564,5952,6282&notSegmentId=12"></script>
            </div><!-- Vitrine Inteligente Lomadee -->
        </div>';

        if(!isset($banner_left)) $banner_left = null;

        return compact('banner_top_mob','banner_top_desk','banner_bottom','banner_right_desk','banner_left');

    }

    public function getResposta(Request $request){

        try{

        if($request->cod == 'banner'){
            
            $resposta_str = respostaController::getInteresse($request->interesse,$request->genero);   
            
            // $banner_top = $resposta_str['banner_top_mob'];
            $banner_bottom = $resposta_str['banner_bottom'];
            
            return json_encode(compact('banner_bottom'));
        }    

        // limpa as sessoes
        if($request->cod == 1): 
            $update = palavras_cliente::where('id_cliente',session('id_cliente'))->update(
                ['id_ativo'=>2]
            );
            // $request->session()->forget('email');
            // $request->session()->forget('user');
            $request->session()->forget('id_cliente');
            $request->session()->forget('interesse');
            $request->session()->flush();
            return false;
        endif;

        if(!session("id_cliente")):
            $resposta_str = 'exit';
            return json_encode(compact('resposta_str'),JSON_UNESCAPED_UNICODE);
        endif;

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

            $resposta_str = respostaController::respostaPadrao($id,$id_cliente,$date);           
            return json_encode(compact('resposta_str'),JSON_UNESCAPED_UNICODE);
 
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
        // $msg2 = str_replace("?","",$msg2);

             
        
        // PEGA AS MENSAGENS DO CLIENTES
       

        // $sql = DB::table('palavras_clientes')
        // ->select('frase','created_at')
        // ->where('frase',$msg2)
        // ->where('id_ativo',1)
        // ->where('id_cliente',$id_cliente)
        // ->orderBy('id_memoria','DESC')
        // ->limit(4)
        // ->get();

        // $row = $sql->count();
        // $rowt = $row;

        // if($row>0):
        //     foreach($sql as $value){
        //         $msg_data = $value->created_at;
        //     }
        //     $date_aux2 = explode(" ",$msg_data);
        // endif;

        // if($row > 0):
        //     // if($row > 0 && $date_aux2[0] == $date_aux[0]):
        //     $resposta_str = "Acho que voce já falou isso. kkk";
        //     $go = 0;
        // else:
            $go = 1;
        // endif;
        

        if($go == 1):

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

                            $resp2 = respostaController::msgRepeticao($id_cliente,$msg);

    
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
                                $resposta_str = respostaController::respostaPadrao($id,$id_cliente,$date);           

                            endif;
    
                        endif;
                    $go2 = 0;

                else: 
                    
                    $go2 = 1;
                endif;
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

// RELACIONADO AO NOME DADO AO ROBÔ
                        // $idcriterio = $idResp;
                        // if(isset($idcriterio)):
                        //     // if($idcriterio == 122):
                
                        //         $select = DB::table('nome_robos')->select('nome')->where('id_cliente',$id_cliente)->get();
                        //         $rowNome = $select->count();
                              
                        //         if(($rowNome > 0 && $idcriterio == 120) || ($rowNome > 0 && $idcriterio == 122)):
                        //             foreach($select as $value){
                        //                 $nome = $value->nome;
                        //             }

                        //             $id = 127;
                                    
                        //             $resposta_str = respostaController::respostaPadrao($id,$id_cliente,$date); 
                        //             $resposta_str = str_replace("@",ucfirst($nome),$resposta_str);

                        //             $sql = DB::table('palavras_clientes')
                        //             ->select('created_at')
                        //             ->where('id_cliente',$id_cliente)
                        //             ->where('id_ativo',1)
                        //             ->get();

                        //             $row = $sql->count();

                        //             if($row > 0):
                        //                 foreach($sql as $value){
                        //                     $dataAt = $value->created_at;
                        //                 }
                                    
                        //             $dataExplde = explode(" ",$dataAt);
                        //             // $horas = $dataExplde[1];
                        //             $dataExplde = explode(":",$dataExplde[1]);
                        //             $min =  $dataExplde[1] + 1;
                        //             $sec =  $dataExplde[2] ;
                        //             else: 
                        //                 $min = 00;
                        //                 $sec = 00;
                        //             endif;

                        //             $cod = 0;
                       
                        //             return json_encode(compact('resposta_str','min','sec','cod'),JSON_UNESCAPED_UNICODE);
                                    
                        //         // else:
                        //         //     $resposta_str = str_replace("@",ucfirst($nome),$resposta_str);

                        //         elseif($rowNome == 0 && $idcriterio == 122):
                        //             $listaP = ['sera','ser','chamara','chamar'];
                        //             $plv = str_replace("chamar de","chamar",$msg2);
                        //             $plv = explode(' ',$plv);
                        //             for($i=0;$i<count($plv);$i++){
                    
                        //                 if(in_array($plv[$i],$listaP)){
                        //                     $i = $i+1;
                        //                     $nome = $plv[$i];                     
                        //                     break;
                        //                 }
                        //             }
                        //             $insert = DB::table('nome_robos')->insert(
                        //                 ['nome'=>$nome,'id_cliente'=>$id_cliente]
                        //                 );
                        //         endif;
                            
                            
                        // endif;
// FIM VERIFICACAO 
                        
                        $resp2 = respostaController::msgRepeticao($id_cliente,$msg);
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
                            $resposta_str = respostaController::respostaPadrao($id,$id_cliente,$date);    
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
        return json_encode(compact('resposta_str','min','sec','cod'),JSON_UNESCAPED_UNICODE);
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
                          
                $resp2 = respostaController::msgRepeticao($id_cliente,$msg);

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
    public function msgRepeticao($id_cliente,$msg){
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
}
