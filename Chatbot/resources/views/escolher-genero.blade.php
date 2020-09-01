
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
    .person-img{
        width: 60%;
    }
    .titulo-person{
        margin-bottom: 50px;
    }
    .titulo-person h2{
        margin-top: 40px;

        font-size: 1.5rem !important;
    }
}
</style>
@endsection

@section('conteudo')
<?php

// echo session('id_cliente');
?>

        <div class="row h-100 box-person" style="height: 80vh !important;align-items: center;" >
            <div class="col-md-12 text-center text-secondary titulo-person"><h2>Escolha seu personagem</h2></div>
            <div class="col-md-3 text-center"></div>
            <div class="col-md-3 text-center">
                <figure class="figure">
                    <a href="chat?person=girl"><img src="img/mulher.jpg" class="figure-img img-fluid rounded person-img" alt="..."></a>
                </figure>
            </div>
            <div class="col-md-3 text-center">
                <figure class="figure">
                    <a href="chat?person=boy"><img src="img/homem.jpg" class="figure-img img-fluid rounded person-img" alt="..."></a>
                </figure>
            </div>
            <div class="col-md-3 text-center"></div>

        </div>
    
     
@endsection

@section('rodape')
    {{-- <script src="js/escolher-genero.js"></script> --}}
@endsection