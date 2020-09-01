<?php
// error_reporting(0);
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;
use App\respostas;
use App\tema;
use App\cliente;
use App\ocasioe;
use App\Http\Controllers\respostaController;

$person = $_GET['person'];
$ico_avatar = session('avatar');
// $person = session('person');

if($person == 'boy'): 
  $ico_person = 'boy.png';
  $person = 1;
  $genero = 2;
else: 
  $ico_person = 'girl.png';
  $person = 2;
  $genero = 1;
endif;
?>

@extends('layouts.layout')

@section('metas')
<meta name="robots" content="noindex, nofollow">
@endsection

@section('anuncios')
  <script data-ad-client="ca-pub-3356984906382141" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
@endsection
    
<?php

$banner = new respostaController;
$interesse = session('interesse');
// $banner = $banner->getInteresse(session(3));
$banner = $banner->getInteresse($interesse,$genero);


?>
    
@section('estilo')
<link rel="stylesheet" type="text/css" href="style/style.css" />
<style type="text/css">

    
  </style>
@endsection

@section('conteudo')

@section('menu')
<div class="container-fluid" style="padding: 0px">
<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
 
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-light" href="escolher-genero">Trocar Personagem</a>
      </li>
      <li class="nav-item">
      <a class="nav-link text-light" href="escolher-avatar?person={{$person}}">Trocar avatar</a>
      </li>
      @if(session('id_cliente') == 2 || session('id_cliente') == 35)
      {{-- @if(session('email') == 'marciosunico18@gmail.com' || session('email') == 'santanasoficial@gmail.com') --}}
      <li class="nav-item">
        <a class="nav-link text-light"  href="admin">Gerenciar</a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link text-light" id="sair" href="#">Sair</a>
      </li>
    </ul>

   
    <div class="avatar-ico bg-light">

    <img src="img/{{$ico_avatar}}" style="width:45px;margin:auto" class="align-self-start">
  </div>
  </div>
  
</nav>
</div>
@endsection
<div class="row menu_ico"><a href="#" class="menu-mobile"><img src="img/menu-ico.png" style="width: 80px;"></a>
  <?php
  echo $banner['banner_top_mob'];
  ?>
</div>
<div class="row">
  <?php
      echo $banner['banner_top_desk'];
    ?>
</div>
<div class="row" id="chat">
  <div class="col-md-12">

  </div>
  <div class="col-md-3 banner-left align-self-center">
    <?php
      if(!empty($banner['banner_left'])):
          echo $banner['banner_left'];
      endif;
    ?>
  </div>   
  <div class="chat-box col-md-6 col-sm-4" id="chat-box"  style="height: 400px;background: #fff;overflow-y: auto;"></div>
  <div class="col-md-3 banner-right align-self-center">
    
    <?php
      echo $banner['banner_right_desk'];
    ?>
    {{-- <!-- LOMADEE - BEGIN -->
    <script src="//ad.lomadee.com/banners/script.js?sourceId=36693737&dimension=4&height=250&width=300&method=1&advertisers=6985&tags=25" type="text/javascript" language="javascript"></script>
    <!-- LOMADEE - END -->--}}
  </div>   

  <div class="col-md-3"></div>  
    <div class="col-md-6" style="padding: initial;" >
      {{-- <div class="input-group mb-3"> --}}
        <input type="text" class="form-control" id="msg" placeholder="Digite a mensagem" autofocus="true" aria-label="Recipient's username" aria-describedby="button-addon2">
        {{-- <div class="input-group-append"> --}}
          {{-- <button class=""  id="btn-enviar"><img src="img/btn-enviar.png"></button> --}}
          <a href="#"   id="btn-enviar"><img src="img/btn-enviar.png"></a>
        {{-- </div> --}}
      {{-- </div> --}}
    </div>
  <div class="col-md-3 "></div> 

  </div>
  <div class="row r-p">
    <div class="col-md-4 text-center r-p banner-box-bottom" id="banner-box-bottom">
      <div class="banner-bottom">
        <?php
        if(isset($banner['banner_bottom']) && !is_array($banner['banner_bottom'])):
          echo $banner['banner_bottom'];
        endif;
        ?>
      </div>
   
    </div>
  </div>
<input type="hidden" value="{{$person}}" id="person-val">
<input type="hidden" value="{{$ico_person}}" id="ico_person-val">
<input type="hidden" value="{{$ico_avatar}}" id="ico_avatar-val">
<input type="hidden" value="{{$interesse}}" id="interesse-val">
<input type="hidden" value="{{$genero}}" id="genero-val">

@endsection

@section('rodape')
  <script src="js/chat.js"></script>
@endsection