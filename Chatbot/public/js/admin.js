$(document).ready(function(){
    // $('.box-ocasiao').hide();

$(document).keypress(function(e) {
    if(e.which == 13) $('#btn-palavra').click();         
});

// adiciona uma nova caixinha de ocasiao e limpa o campo
$('#btn-palavra').click(function(){
    palavra = $('.add-ocasiao').val();
    if(palavra != ""){
    $('.add').append('<input style="margin-right:4px" value="'+palavra+'" name="valor[]" class="btn-remove btn btn-secondary btn-sm"  type="button">');
    }
    $('.add-ocasiao').val("");
});

// elimina as caixinhas de ocasioes
$(document).on('click','.btn-remove',function(){
    $(this).remove();
});

// envia as palavras para o banco
// $(document).on('click','#btn-enviar-palavra',function(){
//     var inputs = jQuery('input[name^="valor"]');
//     var palavras = [];
//     for(var i = 0; i < inputs.length; i++){
//         palavras.push($(inputs[i]).val());
//     }
//     temaId = $('.select-tema option:selected').val();
//     $dados = 'ocasiao='+palavras+'&temaId='+temaId+'&cod=4';
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//         url:'admin',
//         type:'json',
//         method:'post',
//         data:$dados,
//         success: function(result){
//             $('.modal').modal('show');   
//             $('.add-plv').remove();
//             $('.modal-body').html('<h5 class="text-success">Ocasião adicionada com sucesso!</h5>');

//         $('.btn-modal-close').click(function(){
//             location.reload();
//         });
//         // }
//         },
//         error: function(result){
//             $('.modal').modal('show');
//             $('.modal-body').html('<h5 class="text-danger">Tema já existe, por favor escolha outro!</h5>');
//         }
//     });

//     console.log($dados);
// });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // adiciona tema no banco de dados
$('#btn-tema').click(function(){
        temaText = $('.add-tema').val();
            if(temaText != "" && temaText != undefined){
                $insert = 'tema='+temaText+'&cod=3';
                $.ajax({
                    url:'admin',
                    type:'json',
                    method:'post',
                    data:$insert,
                    success: function(result){
                        $('.modal').modal('show');   
                        // if(result>0) {
                        //     $('.modal-body').html('<h5 class="text-danger">Tema já existe, por favor escolha outro!'+result+'</h5>');
                        // }else{
                             $('.modal-body').html('<h5 class="text-success">Tema adicionado com sucesso!</h5>');
                             $('.btn-modal-close').click(function(){
                             location.reload();

                             });
                        // }
                    },
                    error: function(result){
                        $('.modal').modal('show');
                        $('.modal-body').html('<h5 class="text-danger">Tema já existe, por favor escolha outro!</h5>');

                    }
                });
            }else{
                $('.modal').modal('show');
                $('.modal-body').html('<h5 class="text-danger">Você precisa escolher um tema!</h5>');
            }
});


// carrega as opcoes do tema no <select>
// id_tema = 1;
// $dadosselect = 'id_tema='+id_tema+'&cod=1';
//     $.ajax({
//         url:'admin',
//         type:'json',
//         method:'post',
//         data:$dadosselect,
//         success: function(result){
//             obj = JSON.parse(result);
//             tamanho = obj.id_tema.length;
                           
//             $html = '<option selected>Escolha um tema</option>';
//             $html += '<option value="0">Todos</option>';
//             for($i=0;$i<tamanho;$i++){
//                 $html += '<option value="'+obj.id_tema[$i]+'">'+obj.tema[$i]+'</option>';
//             }
//             $('.select-tema').html($html);
//                 // console.log('tudo ok');
//         },
//         error: function(result){

//         }
//     });
    
// envia a opcao selecionada do select e monta a <table>
$(".select-tema").change(function(){
    tema = $(this).val(); 
    temaText = $('.select-tema option:selected').text();
    console.log(temaText);

        $dados = 'id_tema='+tema+'&cod=2';
        $.ajax({
            url:'admin',
            type:'json',
            method:'post',
            data:$dados,
            success: function(result){
            // result = result.replace('\\',"");
            result = result.replace(/[\\$]/g, '');
            obj = JSON.parse(result);
            tamanho = obj.id_ocasiao.length;
            // console.log(obj.id_ocasiao[1]);
            $html = '<table class="table table-dark">';
            $html += '<thead><tr><th scope="col">Id</th><th scope="col">Tema</th><th scope="col">Ocasiao</th></tr>';
            $html +='</thead><tbody>';

            for($i=0;$i<tamanho;$i++){
                $html +='<tr>';
                $html +='<td>'+obj.id_ocasiao[$i]+'</td>';
                $html +='<td>'+obj.tema[$i]+'</td>';
                $html +='<td>'+obj.ocasiao[$i]+'<a href="ocasioes-edit?id_ocasiao='+obj.id_ocasiao[$i]+'&ocasiao='+obj.ocasiao[$i]+'&tema='+obj.idtema[$i]+'&temaText='+obj.tema[$i]+'"';
                $html +='class="btn btn-success float-right" id="'+obj.id_ocasiao[$i]+'">Editar</a></td></tr>';              
            }         
            $html +=' </tbody></table>';
            if(obj.cod > 0){
                $('.box-ocasiao').show();
                $('.add').empty();
            }else{
                $('.box-ocasiao').hide();
            }
            $('.tabela').html($html);
                console.log(result);
            },
            error: function(result){
                // console.log('aconteceu algo de errado');
                $('.box-ocasiao').hide();
                $('.modal').modal('show');
                $('.modal-body').html('<h5 class="text-danger">Nenhuma palavra foi adicionada a este tipo de tema.</h2>');
                $('.add-plv').remove();
                $('.modal-footer').prepend('<a href="ocasioes-edit?id_ocasiao=0&ocasiao=&temaText='+temaText+'&tema='+tema+'" type="button" class="btn btn-primary add-plv">Adicionar palavras</a>');
            }
        });
    });

}); 
$(document).ready(function(){
            // $('.box-ocasiao').hide();

        $(document).keypress(function(e) {
            if(e.which == 13) $('#btn-palavra').click();         
        });

        // adiciona uma nova caixinha de palavra
        $('#btn-palavra').click(function(){
            palavra = $('.add-ocasiao').val();
            if(palavra != ""){
            $('.add').append('<input style="margin-right:4px" value="'+palavra+'" name="valor[]" class="btn-remove btn btn-secondary btn-sm"  type="button">');
            }
            $('.add-ocasiao').val("");
        });

        $(document).on('click','.btn-remove',function(){
            $(this).remove();
            // console.log($(this).val());
        });

        // envia as palavras para o banco de dados
        $(document).on('click','#btn-enviar-palavra',function(){
            var inputs = jQuery('input[name^="valor"]');
            var palavras = [];
            for(var i = 0; i < inputs.length; i++){
                palavras.push($(inputs[i]).val());
            }
            temaId = $('.select-tema option:selected').val();
            $dados = 'ocasiao='+palavras+'&temaId='+temaId+'&cod=4';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'admin',
                type:'json',
                method:'post',
                data:$dados,
                success: function(result){
                    $('.modal').modal('show');   
                    $('.add-plv').remove();
                    $('.modal-body').html('<h5 class="text-success">Ocasião adicionada com sucesso!</h5>');

                $('.btn-modal-close').click(function(){
                    location.reload();
                });
                // }
                },
                error: function(result){
                    $('.modal').modal('show');
                    $('.modal-body').html('<h5 class="text-danger">Tema já existe, por favor escolha outro!</h5>');
                }
            });

            console.log($dados);
        });
            // $('.btn-buscar').click(function(){
            

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
        });

        // adiciona o tema no banco
        // $('#btn-tema').click(function(){
        //     temaText = $('.add-tema').val();
        //     if(temaText != "" && temaText != undefined){
        //         $insert = 'tema='+temaText+'&cod=3';
        //         $.ajax({
        //         url:'admin',
        //         type:'json',
        //         method:'post',
        //         data:$insert,
        //             success: function(result){
        //             $('.modal').modal('show');   
                    
        //                 $('.modal-body').html('<h5 class="text-success">Tema adicionado com sucesso!</h5>');
        //                 $('.btn-modal-close').click(function(){
        //                     location.reload();

        //                 });
        //                         // }
        //             },
        //             error: function(result){
        //                 $('.modal').modal('show');
        //                 $('.modal-body').html('<h5 class="text-danger">Tema já existe, por favor escolha outro!</h5>');
        //             }
        //     });
        //             }else{
        //                 $('.modal').modal('show');
        //                 $('.modal-body').html('<h5 class="text-danger">Você precisa escolher um tema!</h5>');
        //             }
        // });


    // carrega as opcoes do tema no <select>
    id_tema = 1;
    $dadosselect = 'id_tema='+id_tema+'&cod=1';
    $.ajax({
        url:'admin',
        type:'json',
        method:'post',
        data:$dadosselect,
        success: function(result){
        obj = JSON.parse(result);
        tamanho = obj.id_tema.length;
                                
            $html = '<option selected>Escolha um tema</option>';
            $html += '<option value="0">Todos</option>';
            for($i=0;$i<tamanho;$i++){
                $html += '<option value="'+obj.id_tema[$i]+'">'+obj.tema[$i]+'</option>';
            }
        $('.select-tema').html($html);
                // console.log('tudo ok');
        },
        error: function(result){

        }
    });
            
            
    // $(".select-tema").change(function(){
    //         tema = $(this).val(); 
    //         temaText = $('.select-tema option:selected').text();
    //         console.log(temaText);

    //             $dados = 'id_tema='+tema+'&cod=2';
    //             $.ajax({
    //                 url:'admin',
    //                 type:'json',
    //                 method:'post',
    //                 data:$dados,
    //                 success: function(result){
    //                 // result = result.replace('\\',"");
    //                 result = result.replace(/[\\$]/g, '');
    //                 obj = JSON.parse(result);
    //                 tamanho = obj.id_ocasiao.length;
    //                 // console.log(obj.id_ocasiao[1]);
    //                 $html = '<table class="table table-dark">';
    //                 $html += '<thead><tr><th scope="col">Id</th><th scope="col">Tema</th><th scope="col">Ocasiao</th></tr>';
    //                 $html +='</thead><tbody>';

    //                 for($i=0;$i<tamanho;$i++){
    //                     $html +='<tr>';
    //                     $html +='<td>'+obj.id_ocasiao[$i]+'</td>';
    //                     $html +='<td>'+obj.tema[$i]+'</td>';
    //                     $html +='<td>'+obj.ocasiao[$i]+'<a href="ocasioes-edit?id_ocasiao='+obj.id_ocasiao[$i]+'&ocasiao='+obj.ocasiao[$i]+'&tema='+obj.idtema[$i]+'&temaText='+obj.tema[$i]+'"';
    //                     $html +='class="btn btn-success float-right" id="'+obj.id_ocasiao[$i]+'">Editar</a></td></tr>';              
    //                 }         
    //                 $html +=' </tbody></table>';
    //                 if(obj.cod > 0){
    //                     $('.box-ocasiao').show();
    //                     $('.add').empty();
    //                 }else{
    //                     $('.box-ocasiao').hide();
    //                 }
    //                 $('.tabela').html($html);
    //                     console.log(result);
    //                 },
    //                 error: function(result){
    //                     // console.log('aconteceu algo de errado');
    //                     $('.box-ocasiao').hide();
    //                     $('.modal').modal('show');
    //                     $('.modal-body').html('<h5 class="text-danger">Nenhuma palavra foi adicionada a este tipo de tema.</h2>');
    //                     $('.add-plv').remove();
    //                     $('.modal-footer').prepend('<a href="ocasioes-edit?id_ocasiao=0&ocasiao=&temaText='+temaText+'&tema='+tema+'" type="button" class="btn btn-primary add-plv">Adicionar palavras</a>');
    //                 }
    //             });
    //         });

        });