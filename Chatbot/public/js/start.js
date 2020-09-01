$(document).ready(function(){
    sessionStorage.setItem('start', 0);

    $('.btn-cadastrar').click(function(){

        apelido     = $('#apelido').val();
        interesse   = $('#select-interesse').val();
        sexo   = $('#select-sexo').val();
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

        if(sexo == 0 || sexo == ""){
            erro = 1; 
            $('.erro-sexo').html('<b>Digite seu gênero</b>');
        }else{
            erro = 0;                   
            $('.erro-sexo').empty();
        } 

        

        if(apelido != "" && demaior == true && interesse != 0 && sexo != 0){
       

            // $dados = 'apelido='+apelido+'&email='+email+'&nascimento='+nascimento+'&senha='+senha&interesse=;
            $dados = 'apelido='+apelido+'&interesse='+interesse+'&avatar='+sexo;
            console.log($dados);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'start-chatbot',
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
                    // $('.modal').modal('show');
                    // $('.modal-body').html('<h5 class="text-danger">'+result+'</h5>');
                }
            });
        }
    });
});