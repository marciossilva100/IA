$(document).ready(function(){

    id_ocasiao = $('#id-ocasiao-val').val();
    idTema = $('#id-tema-val').val();
    temaText = $('#tema-val').val();

    function enviaDados($dados){
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

        $.ajax({
                    url:'ocasioes-edit',
                    type:'json',
                    method:'post',
                    data:$dados,
                    success: function(result){
                        if(result.length != ""){
                        obj = JSON.parse(result);  
                        console.log(result);                         
                        window.location.href = 'ocasioes-edit?id_ocasiao='+obj.id_ocasiao+'&tema='+obj.temaId+'&temaText='+obj.temaText;
                            $('.modal').modal('show');
                            $('.modal-body').html('<h5 class="text-success">Dados inseridos com sucesso!</h5>');
                        }else{
                            $('.modal').modal('show');
                            $('.modal-body').html('<h5 class="text-success">Dados Atualizados com sucesso!</h5>');
                        }
                        
                    },
                    error: function(result){
                        console.log(result);
                        $('.modal').modal('show');
                        $('.modal-body').html('<h5 class="text-success">Dados atualizados com sucesso!</h5>');
                    }
        });
    }
            
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });      

    $data = 'id_ocasiao='+id_ocasiao+'&cod=6';
    console.log($data);               
    $.ajax({
        url:'ocasioes-edit',
        type:'json',
        method:'post',
        data:$data,
        success: function(result){
            // result = result.replace('\\',"");
            result = result.replace(/[\\$]/g, '');
            obj = JSON.parse(result);
            tamanho = obj.respostaText.length;
            console.log(obj.count);

            if(obj.count > 0){
                $html ='';
                for($i=0;$i<tamanho;$i++){

                    $html +='<input style="margin-right:4px;margin-top:10px" value="'+obj.respostaText[$i]+'"';
                    $html +=' name="valor_ocasiao[]" class="btn-remove btn btn-secondary btn-sm"  type="button">';
                
                }         
                // $html +='<input type="hidden" value="'+obj.id_criterio+'" id="id-plv">';
                // $html +='<input type="hidden" value="'+obj.id_tempo+'" id="id-tempo">';
                // $html +='<input type="hidden" value="'+obj.id_resposta+'" id="id-respostaAux">';

                $('.add').html($html);
                    
            }else{
         
                $('.modal').modal('show');
                $('.modal-body').html('<h5 class="text-danger">Nenhum resultado foi encontrado!</h5>');
            }
                console.log(result);
        },
        error: function(result){
            console.log(result);
            $('.modal').modal('show');
        }
    });

    
    // $(document).keypress(function(e) {
    //     if(e.which == 13){
    $('#btn-palavra').click(function(){
            palavra = $('.add-ocasiao').val();
            if(palavra != ""){
            $('.add').append('<input style="margin-right:4px" value="'+palavra+'" name="valor_ocasiao[]" class="btn-remove btn btn-secondary btn-sm"  type="button">');
            }
            $('.add-ocasiao').val("");
    });
        // }
    // });

    // $('#btn-palavra').click();

   

    $(document).keypress(function(e) {
        if(e.which == 13) $('#btn-resposta').click();         
    });
    $('#btn-resposta').click(function(){
            id_tempo = $('.select-tema').val();
            resposta = $('.add-resposta').val();
            if(id_tempo != 0){
                if(resposta != ""){
                $('.add-3').append('<input style="margin-right:4px;margin-top:10px" value="'+resposta+'" name="valor_resposta[]" class="btn-remove btn btn-secondary btn-sm"  type="button">');
                }
            }else{
                $('.modal').modal('show');
                $('.modal-body').html('<h5 class="text-danger">Escolha um tempo do verbo!</h5>');
            }
            $('.add-resposta').val("");
    });

    $(document).keypress(function(e) {
        if(e.which == 13) $('#btn-criterio').click();
        
    });
    $('#btn-criterio').click(function(){
            criterio = $('.add-criterio').val();
            id_tempo = $('.select-tema').val();
            console.log(id_tempo);
            if(id_tempo != 0){
                if(criterio != ""){
                $('.add-2').append('<input style="margin-right:4px;margin-top:10px" value="'+criterio+'" name="valor_criterio[]" class="btn-remove btn btn-secondary btn-sm"  type="button">');
                }
                
            }else{
                $('.modal').modal('show');
                $('.modal-body').html('<h5 class="text-danger">Escolha um tempo do verbo!</h5>');
            }
            
            $('.add-criterio').val("");
    });


    // alert($('.teste').val());
    $(document).on('click','.btn-remove',function(){
        $(this).remove();
    });

    

    $(document).on('click','.btn-enviar-resposta',function(){

        id_resposta = $('#id_resposta').val();
        id_criterio = $('#id-plv').val();
        id_tempo = $('.select-tema option:selected').val();
        resposta = $('#id-respostaAux').val();
        
        id_genero = $('.select-genero option:selected').val(); 


        if(id_resposta == undefined) id_resposta = 0;

        var inputs = jQuery('input[name^="valor_ocasiao"]');
        var ocasiao = [];
        for(var i = 0; i < inputs.length; i++){
            ocasiao.push($(inputs[i]).val());
        }
        // $dadost = 'id_ocasiao=<?=$id_ocasiao?>&idtema=<?=$idTema?>&palavras='+values+'&cod=4';

        var inputs = jQuery('input[name^="valor_criterio"]');
        var palavras = [];
        for(var i = 0; i < inputs.length; i++){
            palavras.push($(inputs[i]).val());
        }

        var inputs = jQuery('input[name^="valor_resposta"]');
        var respostas = [];
        for(var i = 0; i < inputs.length; i++){
            respostas.push($(inputs[i]).val());
        }


        if(palavras == undefined || palavras == ""){
            $('.modal').modal('show');
            $('.modal-body').html('<h5 class="text-danger">Voce precisa adicionar palavras!</h5>');
        }else if(id_genero == 0){
            $('.modal').modal('show');
            $('.modal-body').html('<h5 class="text-danger">Voce precisa adicionar o genero!</h5>');
        }else if(respostas == undefined || respostas == ""){
            $('.modal').modal('show');
            $('.modal-body').html('<h5 class="text-danger">Voce precisa adicionar respostas!</h5>');
        }else{
        $dados = 'id_resposta='+id_resposta+'&temaText='+temaText+'&id_criterio='+id_criterio+'&id_ocasiao='+id_ocasiao+'&palavras='+palavras+'&id_genero='+id_genero+'&respostas='+respostas+'&id_tempo='+id_tempo+'&ocasiao='+ocasiao+'&idTema='+idTema+'&cod=5';
        enviaDados($dados);

        }
        console.log($dados);

    });

     // chama para o select da ocasiao
            $dadosselect = '&cod=1';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'ocasioes-edit',
                type:'json',
                method:'post',
                data:$dadosselect,
                success: function(result){
                    obj = JSON.parse(result);
                    tamanho = obj.id_tempo.length;
        
                    $html = '<option value="0" selected>Escolha o tempo</option>';
                    // $html += '<option value="0">Todos</option>';
                    for($i=0;$i<tamanho;$i++){
                        $html += '<option value="'+obj.id_tempo[$i]+'">'+obj.tempo[$i]+'</option>';
                    }
                    $('.select-tema').html($html);
                    // console.log('tudo ok');
                },
                error: function(result){
                    console.log(result);
                }
            });

        // chama para o select das respostas
    
            // id_tempo = 1;
            $dadosselect = '&cod=4';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'ocasioes-edit',
                type:'json',
                method:'post',
                data:$dadosselect,
                success: function(result){
                    obj = JSON.parse(result);
                    tamanho = obj.id_resposta.length;
        
                    $html = '<option value="0" selected>Escolha uma resposta</option>';
                    // $html += '<option value="0">Todos</option>';
                    for($i=0;$i<tamanho;$i++){
                        $html += '<option value="'+obj.id_resposta[$i]+'">'+obj.resposta[$i]+'</option>';
                    }
                    $('.select-resposta').html($html);
                    // console.log('tudo ok');
                },
                error: function(result){
                    console.log(result);
                }
            });    

            // SELECT DA OCASIÃO

        $(".select-tema").change(function(){

        id_tempo = $('.select-tema option:selected').val(); 
        if(id_tempo != 0){
            $('.box-select-resposta').show();
            $('.box-select-genero').show();

        }else{
            $('.box-select-resposta').hide();
            $('.box-select-genero').hide();
        }

        // console.log(id_tempo);

            $dados = 'id_tempo='+id_tempo+'&id_ocasiao='+id_ocasiao+'&cod=2';
            console.log($dados);
            $.ajax({
                url:'ocasioes-edit',
                type:'json',
                method:'post',
                data:$dados,
                success: function(result){
                // result = result.replace('\\',"");
                result = result.replace(/[\\$]/g, '');
                obj = JSON.parse(result);
                tamanho = obj.palavraText.length;
                console.log(obj.count);

                if(obj.count > 0){
                    $html ='';
                    for($i=0;$i<tamanho;$i++){

                            $html +='<input style="margin-right:4px;margin-top:10px" value="'+obj.palavraText[$i]+'"';
                            $html +=' name="valor_criterio[]" class="btn-remove btn btn-secondary btn-sm"  type="button">';
            
                    }         
                    $html +='<input type="hidden" value="'+obj.id_criterio+'" id="id-plv">';
                    $html +='<input type="hidden" value="'+obj.id_tempo+'" id="id-tempo">';
                    // $html +='<input type="hidden" value="'+obj.id_resposta+'" id="id-respostaAux">';

                    $('.add-2').html($html);
                    // tamanho = obj.respostaText.length;
                    // $html ='';
                    // for($i=0;$i<tamanho;$i++){


                    //         $html +='<input style="margin-right:4px;margin-top:10px" value="'+obj.respostaText[$i]+'"';
                    //         $html +=' name="valor_resposta[]" class="btn-remove btn btn-secondary btn-sm"  type="button">';

                    // } 

                    // $html +='<input type="hidden" value="'+obj.id_resposta+'" id="id_resposta">';
                        
                    // $('.add-3').html($html);
                }else{
                    $('.add-2,.add-3').empty();
                    $('.modal').modal('show');
                    $('.modal-body').html('<h5 class="text-danger">Nenhum resultado foi encontrado!</h5>');
                }
                    console.log(result);
                },
                error: function(result){
                    console.log('aconteceu algo de errado');
                    $('.modal').modal('show');
                }
            });
        });

        // SELECT DAS RESPOSTAS
        $(".select-resposta").change(function(){
        id_resposta = $('.select-resposta option:selected').val(); 
        // id_resposta = 0; 
        console.log(id_resposta);

            $dados = 'id_resposta='+id_resposta+'&cod=7';
            console.log($dados);
            $.ajax({
                url:'ocasioes-edit',
                datatype:'json',
                method:'post',
                data:$dados,
                success: function(result){
                // result = result.replace('\\',"");
                // result = result.replace(/[\\$]/g, '');
                obj = JSON.parse(result);
                tamanho = obj.respostaText.length;
                console.log(result);

                if(tamanho > 0){
                    $html ='';
                    for($i=0;$i<tamanho;$i++){

                            $html +='<input style="margin-right:4px;margin-top:10px" value="'+obj.respostaText[$i]+'"';
                            $html +=' name="valor_resposta[]" class="btn-remove btn btn-secondary btn-sm"  type="button">';
            
                    }         
                    $html +='<input type="hidden" value="0" id="id_resposta">';

                    
                    $('.add-3').html($html);
                 
                }
                    console.log(result);
                },
                error: function(result){
                    console.log('aconteceu algo de errado');
                    $('.modal').modal('show');
                }
            });
        });

        $(".select-genero").change(function(){
        id_genero = $('.select-genero option:selected').val(); 
        id_criterio = $('#id-plv').val();
        // id_resposta = $('.select-resposta option:selected').val(); 

        // console.log(id_genero);

            $dados = 'id_genero='+id_genero+'&cod=8&id_criterio='+id_criterio;
            console.log($dados);
            $.ajax({
                url:'ocasioes-edit',
                datatype:'json',
                method:'post',
                data:$dados,
                success: function(result){

                obj = JSON.parse(result);
                tamanho = obj.respostaText.length;
                console.log(result);

                tamanho = obj.respostaText.length;
                if(tamanho > 0 && obj.respostaText != "" ){
                $html ='';
                    for($i=0;$i<tamanho;$i++){


                            $html +='<input style="margin-right:4px;margin-top:10px" value="'+obj.respostaText[$i]+'"';
                            $html +=' name="valor_resposta[]" class="btn-remove btn btn-secondary btn-sm"  type="button">';

                    } 

                    $html +='<input type="hidden" value="'+obj.id_resposta+'" id="id_resposta">';
                        
                    $('.add-3').html($html);
                 
                
                    console.log(result);
                }else{
                    $('.add-3').empty();
                }
                console.log(obj.respostaText);
                },
                error: function(result){
                    console.log('aconteceu algo de errado');
                    $('.modal').modal('show');
                }
            });
        });
       
        

    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })

});