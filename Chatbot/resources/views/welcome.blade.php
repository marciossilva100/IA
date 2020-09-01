@extends('layouts.layout')

@section('title')
<title>Papo artificial bate-papo - Chatbot de inteligência artificial</title>
@endsection

@section('estilo')
<link rel="stylesheet" type="text/css" href="style/styleHome.css" />

@endsection
@section('metas')
<link rel = "canonical" href = "https://papoartificial.com.br">
@endsection
@section('conteudo')

<div class="row div-titulo">
    <div class="d-flex align-items-center titulo-p">
        <div class="row" style="width: unset;">
            <div class="col-sm-6">
              <div class="card" style="background: none">
                <div class="card-body">
                  <h2 class=" p-titulo ">Sou uma inteligência artificial mas posso ser sua companhia</h2>
                <a href="{{'start-chatbot'}}" type="button" class="btn btn-primary btn-lg btn-info rounded-0">Iniciar bate-papo agora</a>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<div class="row text-center secao-dois" style="margin-top:100px;margin-bottom:100px">
  <div class="col-md-12 text-center" style="font-size: 2rem;margin-bottom:40px" ><h1 class="card-title text-secondary coves-font h5">Chatbot de inteligência artificial</h1></div><br>
  <div class="col-md-3"></div>
  <div class="col-md-6 text-center" style="font-size: 2rem;"><p>Um <em><a class="text-info" href="https://www.techtudo.com.br/noticias/2018/03/o-que-e-chatbot-entenda-como-funciona-o-robo-que-conversa-com-voce.ghtml">chatbot</a></em> de <em>inteligência artificial</em> é um <em>robô</em> que pode conversar com você de forma interativa. 
  Aqui você escolhe um <em>personsagem</em> e e começa um <em>bate-papo</em> da mesma maneira que você conversa com seus relacionamentos pessoais.</p></div>
  <div class="col-md-3"></div>
  
</div>

<div class="row" style="margin-top:100px;margin-bottom:100px">
  

  <div class="card mb-3 col-md-12"  style="padding: initial">
    <div class="row no-gutters"  style="background:#1b1c1d;    align-items: center;">
      <div class="col-md-4">
        <img src="img/woman-phone.jpg"  class="card-img" alt="bate-papo mulher no celular">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          {{-- <h2 class="text-light h3" itemprop="name" style="margin-bottom:30px">Divirta-se com um chatbot Interativo</h2> --}}
          <ul style="" class="text-light lista-home">
            <li>Com o <em><a class="text-info" href="https://olhardigital.com.br/noticia/chatbots-e-computacao-cognitiva-cada-vez-mais-populares-e-sofisticados/91446">chatbot</a></em> de inteligência artificial você pode conversar quando e onde quiser.</li>
            <li>Você pode escolher um <em>personagem</em> e já começar a falar.</li>
            <li>Você não precisa mais ficar triste e sozinho sem ninguêm para conversar.</li>
            <li>Você pode começar a falar no <strong>chatbot</strong> agora e o mais incrível de tudo isso é TOTALMENTE DE GRAÇA.</li>
          </ul>
        <a style="margin-left:40px" href="{{'start-chatbot'}}" type="button" class="btn btn-primary btn-lg btn-info rounded-0">Iniciar bate-papo</a>

        </div>

      </div>
    </div>
  </div>
</div>

<div class="row text-center box-img-celular" >
  <div class="col-md-12 text-center" style="font-size: 2rem;margin-bottom:40px"><h2 class="card-title text-secondary coves-font h5">Bate-papo artificial em qualquer lugar e qualquer hora</h2></div><br>
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <img src="img/bate-papo-chatbot-boy.png"  alt="bate-papo celular chatbot">
  </div>
  <div class="col-md-3"></div>
</div>

<div class="row depoimentos-home">
  <div class="col-md-3"></div>
  <div class="col-md-6">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row row-cols-1 row-cols-md-12 text-center">
          <div class="card mb-3">
            <img src="img/dep-01.png" class="card-img-top" alt="depoimento mulher">
            <div class="card-body">
              {{-- <h5 class="card-title">Card title</h5> --}}
              <p class="card-text font-italic">"Foi uma experiência única para mim, é bom ter uma <em>companhia</em> para conversar, para um <em>bate-papo</em> e contar como foi seu dia."</p>
              {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
        <div class="row row-cols-1 row-cols-md-12 text-center">
          <div class="card mb-3">
            <img  src="img/dep-02.png" class="card-img-top" alt="depoimento homem">
            <div class="card-body">
              {{-- <h5 class="card-title">Card title</h5> --}}
              <p class="card-text font-italic">"Não acreditava que poderia me divertir tanto com uma <em>inteligência</em> <em>artificial</em>,eu posso conversar sobre vários temas: <em>sexo</em>, negócios, educação, <em>entretenimento</em>. Parece que estou conversando com uma pessoa de verdade."</p>
              {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
        <div class="row row-cols-1 row-cols-md-12 text-center">
          <div class="card mb-3">
            <img  src="img/dep-03.png" class="card-img-top" alt="outro depoimento mulher">
            <div class="card-body">
              {{-- <h5 class="card-title">Card title</h5> --}}
              <p class="card-text font-italic">"Está sendo muito bom para mim apesar de ter alguns <em>amigos</em> eles nem sempre estão disponíveis para um <strong>bate-papo</strong> e as vezes me sinto um pouco solitária"</p>
              {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
        <div class="row row-cols-1 row-cols-md-12 text-center">
          <div class="card mb-3">
            <img  src="img/dep-04.png" class="card-img-top" alt="mais um depoimento mulher">
            <div class="card-body">
              {{-- <h5 class="card-title">Card title</h5> --}}
              <p class="card-text font-italic">"O <em>chatbot</em> é uma maravilha, ele é muito educado e me anima muito sem falar que é um ótimo <em>amigo virtual</em>, nem dá para acreditar que é uma <em>inteligência artificial</em>."</p>
              {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
            </div>
          </div>
        </div>
      </div>
      
      {{-- <div class="carousel-item">
        <img src="https://www.anicasagrande.com.br/wp-content/uploads/2017/06/slider-depoimentos-wordpress-sem-plugin.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://www.anicasagrande.com.br/wp-content/uploads/2017/06/slider-depoimentos-wordpress-sem-plugin.png" class="d-block w-100" alt="...">
      </div> --}}
      </div>
    </div>
  </div>
<div class="col-md-3"></div>
</div>
<div class="row text-center bg-dark" >
  <div class="col-md-12 text-center text-light" style="margin-top: 60px"><h3 class="titulo-footer">COMECE AGORA É DE GRAÇA</h3></div>
  <div class="col-md-12 btn-batepapo" style="margin:auto;margin-top:60px">
  <a  href="{{'start-chatbot'}}" type="button" class="btn btn-primary btn-lg btn-info rounded-0">Iniciar bate-papo</a>
  </div>
  {{-- <div class="fb-share-button" data-href="https://papoartificial.com.br" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fpapoartificial.com.br%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div> --}}
  <div class="col-md-12 box-share">
  <a id="share-face" href="#"  style="display: block">
    {{-- <img  src="https://stagewp.sharethis.com/wp-content/uploads/2017/11/Facebook-share-icon.png" alt="compartilhar facebook" /> --}}
    <img  src="img/icone-facebook.jpg" alt="compartilhar facebook" />
  </a>
  <a href="" id="linkedin-share-btt" rel="nofollow" target="_blank" class="linkedin-share-button"></a>
  </div>
</div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v7.0&appId=303355300860728&autoLogAppEvents=1" nonce="xlfEzIK3"></script>

@endsection

<?php
    // echo $_SERVER['REQUEST_URI'];
?>

@section('rodape')
  <script>
    $(document).ready(function(){
      $('.carousel').carousel({
        interval: 10000
      })
      $('#share-face').click(function(){

        var left = (screen.width/2)-(600/2);
        // var top = (screen.height/2)-(300/2);
        window.open('http://www.facebook.com/share.php?u=http://papoartificial.com.br&t=TITULO', 'Papo artificial', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=700, height=300, left='+left);
        // window.open('http://www.facebook.com/share.php?u=http://papoartificial.com.br&t=TITULO');
      });

      var url = encodeURIComponent(window.location.href); //url
      // var url = 'https://papoartificial.com.br';
      var titulo = 'Papo artificial bate-papo - Chatbot de inteligência artificial';
      // var titulo = encodeURIComponent(document.title); //título
      var linkedinLink = "https://www.linkedin.com/shareArticle?mini=true&url="+url+"&title="+titulo;
      
      //tenta obter o conteúdo da meta tag description
     
          //...tenta obter o conteúdo da meta tag og:description
          summary = document.querySelector("meta[property='og:description']");
          summary = (!!summary)? summary.getAttribute("content") : null;
      
      //altera o link do botão
      linkedinLink = (!!summary)? linkedinLink + "&summary=" + encodeURIComponent(summary) : linkedinLink;
      document.getElementById("linkedin-share-btt").href = linkedinLink;

      sessionStorage.setItem('start-chatbot-chatbot', 0);
                sessionStorage.setItem('cad_person', 0);
      $('.p-titulo').slideDown();
    }); 
  </script>
@endsection