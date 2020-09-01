$(document).ready(function(){
    sessionStorage.setItem('start', 0);


    $('#btn-login').click(function(){     
        ligar = 1;
        email = $('#email').val();
        senha = $('#senha').val();
        lembrar = $('#lembrar').is(":checked");
        interesse   = $('#select-interesse').val();

        if(interesse == 0 || interesse == ""){
            erro = 1; 
            $('.erro-interesse').html('<b>Escolha um interesse</b>');
        }else{
            erro = 0;                   
            $('.erro-interesse').empty();
        } 


        console.log(lembrar);

        if(senha != "" && email != "" && ligar != 0 && interesse != 0){
            $dados = 'senha='+senha+'&email='+email+'&lembrar='+lembrar+'&interesse='+interesse; 
            console.log($dados);                      
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'login',
                type:'json',
                method:'post',
                data:$dados,
                success: function(result){
                    obj = JSON.parse(result);
                    console.log(result);
               
                    if(obj.msg != 0){
                    // sessionStorage.setItem('cad_person', 1);
                        window.location.href = 'escolher-genero';


                    }else{
                        $('.modal').modal('show');
                        $('.modal-body').html('<h5 class="text-danger">Usuario ou senha incorreta!</h5>');
                    }
                },
                error: function(result){
                // $('.erro-email').html('<b>Email já existe, escolha outro</b>');
                // console.log(result);
                $('.modal').modal('show');
                $('.modal-body').html('<h5 class="text-danger">'+result+'</h5>');
                }
            });
        } 
    });

function reloadPag(){

    location.reload();     

}setTimeout(reloadPag, 60000 * 60);
});