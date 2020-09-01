<?php
$person = $_GET['person'];

?>
@extends('layouts.layout')

@section('metas')
<meta name="robots" content="noindex, nofollow">
@endsection

@section('estilo')
<style>
    body{
        /* background:#000; */
    }
    form{
        background: #fff;
    }
    @media (max-width: 600px) {
        .box-person{
            height: initial !important;
        }
        .titulo-avatar{
        margin-bottom: 50px;
    }
        .titulo-avatar h2{
            margin-top: 40px;

            font-size: 1.5rem !important;
        }
    }
    .box-person{
        height: 50vh;
        align-items: center;
    }
</style>
@endsection

@section('conteudo')

        <div class="row  box-person" >
<div class="col-md-12 text-center text-secondary titulo-avatar"><h2>Escolha seu avatar</h2></div>
            <div class="col-md-2"></div>
            <div class="col-md-4 text-center">
                <figure class="figure">
                    <a href="chat?person=<?=$person?>&avatar=avatar-01.png"><img src="img/avatar-01.png" style="width:160px" class="figure-img img-fluid rounded" alt="..."></a>
                </figure>
            </div>
            <div class="col-md-4 text-center">
                <figure class="figure">
                    <a href="chat?person=<?=$person?>&avatar=avatar-02.png"><img src="img/avatar-02.png" style="width:160px" class="figure-img img-fluid rounded" alt="..."></a>
                </figure>
            </div>
            <div class="col-md-2"></div>
            {{-- <div class="col-md-3 text-center">
                <figure class="figure">
                    <a href="chat?person=<?=$person?>&avatar=avatar-06-ico.png"><img src="img/avatar-06.png" class="figure-img img-fluid rounded" alt="..."></a>                 
                </figure>
            </div>
            <div class="col-md-3 text-center">
                <figure class="figure">
                    <a href="chat?person=<?=$person?>&avatar=avatar-03-ico.png"><img src="img/avatar-03.png" class="figure-img img-fluid rounded" alt="..."></a>
                </figure>
            </div>
            <div class="col-md-3 text-center">
                <figure class="figure">
                    <a href="chat?person=<?=$person?>&avatar=avatar-04-ico.png"><img src="img/avatar-04.png" class="figure-img img-fluid rounded" alt="..."></a>
                </figure>
            </div> --}}
        </div>
        {{-- <div class="row h-100 box-person" style="align-items: center;" >
            <div class="col-md-3 text-center">
                <figure class="figure">
                    <a href="chat?person=<?=$person?>&avatar=avatar-05-ico.png"><img src="img/avatar-05.png" class="figure-img img-fluid rounded" alt="..."></a>
                </figure>
            </div>
            <div class="col-md-3 text-center">
                <figure class="figure">
                    <a href="chat?person=<?=$person?>&avatar=avatar-02-ico.png"><img src="img/avatar-02.png" class="figure-img img-fluid rounded" alt="..."></a>
                </figure>
            </div>
            <div class="col-md-3 text-center">
                <figure class="figure">
                    <a href="chat?person=<?=$person?>&avatar=avatar-07-ico.png"><img src="img/avatar-07.png" class="figure-img img-fluid rounded" alt="..."></a>
                </figure>
            </div>
            <div class="col-md-3 text-center">
                <figure class="figure">
                    <a href="chat?person=<?=$person?>&avatar=avatar-08-ico.png"><img src="img/avatar-08.png" class="figure-img img-fluid rounded" alt="..."></a>
                </figure>
            </div>
        </div> --}}
    
      
@endsection

@section('rodape')
    {{-- <script>
        $(document).ready(function(){

            var sessao_p = sessionStorage.getItem('cad_person');
            if(sessao_p == 1){
                $(".box-form").hide();
                $(".box-person").fadeIn('slow');
            }

            $('.btn-cadastrar').click(function(){

                
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url:'escolher-avatar',
                        type:'json',
                        method:'post',
                        data:$dados,
                        success: function(result){
                            // $('.modal').modal('show');   
                            // $('.add-plv').remove();
                            // $('.modal-body').html('<h5 class="text-success">Sucesso!</h5>');
                            // $('.box-person').show()
                            sessionStorage.setItem('cad_person', 1);

                            $(".box-form").hide();
                            $(".box-person").fadeIn('slow');
                            // window.location.href = 'chat';

                        },
                        error: function(result){
                            $('.erro-email').html('<b>Email já existe, escolha outro</b>');
                            console.log(result);
                            // $('.modal').modal('show');
                            // $('.modal-body').html('<h5 class="text-danger">'+result+'</h5>');
                        }
                    });
            });
               
            
        });
    </script> --}}
@endsection