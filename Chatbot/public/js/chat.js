$(document).ready(function(){
      
 

    interesse = $('#interesse-val').val();
    genero = $('#genero-val').val();
    ico_person = $('#ico_person-val').val();
    person = $('#person-val').val();
    ico_avatar = $('#ico_avatar-val').val();

    // INICIA O CARROUSEL DE BANNERS

    $dados = 'cod=banner&interesse='+interesse+'&genero='+genero+''; 
    
    console.log($dados+' '+ico_person+' '+person);
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
    url:'chat',
    type:'json',
    method:'post',
    data:$dados,
    success: function(result){
      obj = JSON.parse(result);
      console.log(obj.banner_bottom);
      // localStorage.clear();
      sessionStorage.setItem('banner00','undefined');
      sessionStorage.setItem('banner01','undefined');
      sessionStorage.setItem('banner02','undefined');
      sessionStorage.setItem('banner03','undefined');

      // Storage.clear(); 
      size = obj.banner_bottom.length;
      console.log('o tamanho é '+size);
      // for(i=0;i<size;i++){      
        // console.log(obj.banner_bottom[i]);
        
        // sessionStorage.setItem('banner00', obj.banner_bottom[0]);
        
        for(i=0;i<size;i++){
        sessionStorage.setItem('banner0'+i, obj.banner_bottom[i]);

        }

        console.log(obj.banner_bottom+'teste');
          if(interesse != 3 && interesse != 5){
            loop(obj.banner_bottom[0]);
          }

          function loop(bannerfirst){
            $('.banner-bottom,.banner-left').empty();
            $('.banner-bottom,.banner-left').html(bannerfirst); 
            console.log(sessionStorage.getItem('banner02')+'teset');

            if(sessionStorage.getItem('banner01') != 'undefined' ){
              var tempo = setTimeout(function(){
              var banner = sessionStorage.getItem('banner01');
              console.log(banner);

                $('.banner-bottom,.banner-left').empty();
                $('.banner-bottom,.banner-left').html(banner);  
                              
              },15000);
            }

            if(sessionStorage.getItem('banner02') != 'undefined'){
              var aux = setTimeout(function(){
              var banner_ = sessionStorage.getItem('banner02');
                  console.log(banner_);
                  $('.banner-bottom,.banner-left').empty();
                  $('.banner-bottom,.banner-left').html(banner_);
              },30000);
            }

            if(sessionStorage.getItem('banner03') != 'undefined'){
              var aux = setTimeout(function(){
              var banner_ = sessionStorage.getItem('banner03');
                  console.log(banner_);
                  $('.banner-bottom,.banner-left').empty();
                  $('.banner-bottom,.banner-left').html(banner_);
              },45000);
            }

            if(sessionStorage.getItem('banner04') != 'undefined'){
              var aux = setTimeout(function(){
              var banner_ = sessionStorage.getItem('banner04');
                  console.log(banner_);
                  $('.banner-bottom,.banner-left').empty();
                  $('.banner-bottom,.banner-left').html(banner_);
              },45000);
            }

            var aux = setTimeout(function(){
            var banner = sessionStorage.getItem('banner00');
              loop(banner);
            },60000);
          }



    },
    error: function(result){
        console.log(result);
    }
    });
    


    function slide1(banner){
          $('.banner-bottom').empty();
          $('.banner-bottom').html(banner);  
          
    };   
   
    function slide2(banner){
          $('.banner-bottom').empty();
          $('.banner-bottom').html(banner);                 
    }   

    sessionStorage.setItem('start', 0);

    $('.menu-mobile').click(function(){
      $('.container-fluid').slideToggle( "slow" )
      
    });

    // CARREGA AS MENSAGENS DO BOT NO CHAT
    function getMsgBot(dados){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
        url:'/chat',
        type:'json',
        method:'post',
        data:dados,
        success: function(result){
          // var result = result.replace(/"/g, '');
          obj = JSON.parse(result);

          if(obj.resposta_str == 'exit'){
            location.reload();
          }
      
          if(obj.resposta_str != 'undefined'){
          $p_bot = '<div class="media-padd msg-human">';
          $p_bot += '<div class="media media-bot">';
          $p_bot += '<img src="img/'+ico_person+'" style="width:45px;margin:auto" class="align-self-start mr-3" alt="...">';
          $p_bot += '<div class="media-body">';
          $p_bot += '<p class="p-chat" style="color:#1b2f4f;border: 1px solid;border-color: #35357380;">'+obj.resposta_str+'</p>';
          $p_bot += '</div>';
          $p_bot += '</div>';
          $p_bot += '</div>';
          }

          var sessao = sessionStorage.getItem('start');
          console.log(sessao);
          if(obj.cod == 0 && sessao != 1){
          var tempo = setInterval(function() {
            // clearTimeout(tempo);
            sessionStorage.setItem('start', 1);
            
            var hoy = new Date();
            var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
            console.log(hora);
            if(hoy.getMinutes() >= obj.min && hoy.getSeconds() >= obj.sec){
              sessionStorage.setItem('start', 0);
              clearInterval(tempo);
              dados = 'cod=gelo&person='+person+'';
              console.log(dados);
              getMsgBot(dados);
            }
          
          }, 1000);
          }

           $('.msg-aux').remove();
        $('.chat-box').append($p_bot);
        updateScroll();

        },
        error: function(result){
          // alert(result);
          location.reload();

        },
        beforeSend: function(){
          
        } 
      });
    }

    // SAIR
    $('#sair').click(function(){     
              
              // zera as sessoes javascript 
              sessionStorage.setItem('start', 0);
              sessionStorage.setItem('cad_person', 0);

                  $dados = 'cod=1';                    
                  $.ajaxSetup({
                      headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  $.ajax({
                      url:'chat',
                      type:'json',
                      method:'post',
                      data:$dados,
                      success: function(result){
                      window.location.href = 'start-chatbot';

                      },
                      error: function(result){
                      // $('.erro-email').html('<b>Email já existe, escolha outro</b>');
                      console.log(result);
                      }
                 });

    });

    function updateScroll(){
        var objDiv = document.getElementById("chat-box");
        objDiv.scrollTop = objDiv.scrollHeight;
      }

      $(document).keypress(function(e) {
          if(e.which == 13) $('#btn-enviar').click();
      });

    // ENVIA AS MENSAGENS DO USUARIO PARA O CHAT
    $('#btn-enviar').click(function(){
      msg = $('#msg').val();

      msg_aux = 'digitando...';
      if(msg != ''){

      $p = '<div class="media-padd msg-human">';
      $p += '<div class="media media-human">';
      $p += '<img src="img/'+ico_avatar+'" style="width:45px;margin:auto" class="align-self-start mr-3" alt="...">';
      $p += '<div class="media-body">';
      $p += '<p class="p-chat" style="background: #24406b">'+msg+'</p>';
      $p += '</div>';
      $p += '</div>';
      $p += '</div>';
        

      $p_aux = '<div class="media-padd msg-human msg-aux">';
      $p_aux += '<div class="media media-bot">';
      $p_aux += '<img src="img/'+ico_person+'" style="width:45px;margin:auto" class="align-self-start mr-3" alt="...">';
      $p_aux += '<div class="media-body">';
      $p_aux += '<p class="p-chat" style="color:#1b2f4f;border: 1px solid;border-color: #35357380;">'+msg_aux+'</p>';
      $p_aux += '</div>';
      $p_aux += '</div>';
      $p_aux += '</div>';

      
      $('.chat-box').append($p);
      $('#msg').val("");
      updateScroll();

      function msgBot_(){
        $('.chat-box').append($p_aux);
        updateScroll();
      }setTimeout(msgBot_, 1000); 

      function msgBot(){
        dados = 'person='+person+'&msg='+msg+'&cod=0';
        console.log(dados);
        getMsgBot(dados);
       
        // if(cod == 1) window.location.href = "http://netflix.com";
      }setTimeout(msgBot, 3000);
  
            
    }
    });
   

    function msgBot(){
      dados = 'person='+person+'&msg='+msg+'&cod=spk';
      getMsgBot(dados);
        console.log(dados);       
      }setTimeout(msgBot, 3000);

  });  