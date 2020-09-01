$(document).ready(function(){

    $('.btn-cadastrar').click(function(){

        apelido     = $('#apelido').val();
        email       = $('#email').val();
        nascimento  = $('#nascimento').val();
        senha       = $('#senha').val();
        interesse   = $('#select-interesse').val();

        demaior = $('#demaior').is(":checked");


        // console.log(apelido);

        if(demaior == false){
            erro = 1; 
            $('.erro-demaior').html('<b>Deixe marcado caso seja maior de 18 anos</b>');
        }else{
            erro = 0;                   
            $('.erro-demaior').empty();
        } 

        if(interesse == 0 || interesse == ""){
            erro = 1; 
            $('.erro-interesse').html('<b>Escolha um interesse</b>');
        }else{
            erro = 0;                   
            $('.erro-interesse').empty();
        } 

        if(apelido == ""){
            erro = 1; 
            $('.erro-nome').html('<b>Digite um apelido</b>');
        }else{
            erro = 0;                   
            $('.erro-nome').empty();
        } 

        if(email == ""){
            erro = 1; 
            $('.erro-email').html('<b>Digite um email</b>');
        }else{
            erro = 0;
            $('.erro-email').empty();
        }
        
        // if(nascimento == ""){
        //     erro = 1; 
        //     $('.erro-nasc').html('<b>Digite a data de nascimento</b>');
        // }else{
        //     erro = 0;
        //     $('.erro-nasc').empty();
        // }
        
        if(senha == ""){
            erro = 1; 
            $('.erro-senha').html('<b>Digite uma senha</b>');
        }else{
            erro = 0;
            $('.erro-senha').empty();
        }

        if(senha != ""  && email != "" && apelido != "" && demaior == true && interesse != 0){

            // nascimento = nascimento+' <?=date("H:i:s")?>';

            // $dados = 'apelido='+apelido+'&email='+email+'&nascimento='+nascimento+'&senha='+senha&interesse=;
            $dados = 'apelido='+apelido+'&email='+email+'&senha='+senha+'&interesse='+interesse;
            console.log($dados);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'cadastro',
                type:'json',
                method:'post',
                data:$dados,
                success: function(result){
                    console.log(result);             
                    window.location.href = 'escolher-genero';                 

                },
                error: function(result){
                    $('.erro-email').html('<b>Email já existe, escolha outro</b>');
                    console.log(result);
                }
            });
        }
    });
});