<!doctype html>
<html lang="pt-br">
  <head>

    @yield('title')
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="img/girl.png"/>
    <meta name="google-site-verification" content="VsLPHWPmqiGO8m-KUSlZ6rcWbr7KF7XMe2pfFRAciEw" />
    {{-- facebook --}}
    <meta property="og:locale" content="en_US">
    <meta property="og:url" content="https://papoartificial.com.br">
    <meta property="og:title" content="Papo artificial bate-papo - Chatbot de inteligência artificial">
    <meta property="og:site_name" content="Papo Artificial">
    <meta property="og:image" content="https://papoartificial.com.br/img/woman-phone.jpg">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Se sente sozinho? experimente conversar com essa inteligência artificial.">
    @yield('metas')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <link href="https://fonts.googleapis.com/css2?family=Nobile:wght@700&display=swap" rel="stylesheet">
    <meta name="lomadee-verification" content="22705868" />
    <meta name="description" content="Chatbot de inteligência artificial para bate-papo artificial. Experimente nosso chatbot de inteligência artificial e se divirta-se" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173462083-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-173462083-1');
    </script>

   @yield('anuncios')

    @yield('estilo')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  </head>
  <body>
      @yield('menu')
      <div class="<?=($_SERVER['REQUEST_URI'] == '/' ? 'container-fluid' : 'container')?>">
            @yield('navegacao')

            @yield('conteudo')


            <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Aviso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                  </div>
                  <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    <button type="button" class="btn btn-secondary btn-modal-close" data-dismiss="modal">Ok</button>
                  </div>
                </div>
              </div>
            </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    @yield('rodape')

    <script type="text/javascript">
var lmdimgpixel=document.createElement('img');
lmdimgpixel.src='//secure.lomadee.com/pub.png?pid=22705868';
lmdimgpixel.id='lmd-verification-pixel-22705868';
lmdimgpixel.style='display:none';

var elmt = document.getElementsByTagName('body')[0];
elmt.appendChild(lmdimgpixel);
</script>
</body>
</html>