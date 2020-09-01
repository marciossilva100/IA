@extends('layouts.layout')

@section('metas')
<meta name="robots" content="noindex, nofollow">
@endsection

<?php
$id_ocasiao = $_GET['id_ocasiao'];
$ocasiao = $_GET['ocasiao'];
$tema = $_GET['tema'];
?>
@section('conteudo')
    <div class="row">
        <div class="col-md-4" style="margin-top: 60px">
            <div>
            <a href="{{'teste'}}" class="btn btn-danger">Retornar</a>
                </div><br><br>
        <h2 class="text-secondary">{{$tema}}</h2>
        </div>
        
    </div>

    <div class="row">
 
        <form action="javascript:void(0)">
        <div class="input-group col-md-12">
            {{-- <label for="inputEmail4">Adicionar palavra</label> --}}
            <input class="form-control add-ocasiao" type="text" placeholder="Adicionar palavra" autofocus="true"> 
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button" id="btn-palavra">Enviar</button>
            </div>
        </div>
        </form>
    </div><br>

    <div class="row">
        
        <form action="javascript:void(0)">
            <select class="custom-select select-tema">
            </select>          
            <?php $ocasiao = explode(",",$ocasiao);?>
            
            {{-- <div class="form-group col-md-4">
                <label for="inputEmail4">Adicionar palavra</label>
                <input class="form-control add-ocasiao" type="text" > 
                <button >Adicionar</button>         
            </div> --}}
            <div class="form-group col-md-12 add">
                @foreach($ocasiao as $value)
                {{-- <span class="badge badge-dark teste">{{$value}}<button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button></span> --}}
                  <input value="{{$value}}" name="valor[]" class="btn-remove btn btn-secondary btn-sm"  type="button">
                @endforeach
       
            {{-- <input class="form-control" type="text" value="{{$ocasiao}}"> --}}
            
            
        </div>
        <div class="form-group col-md-12">

        <button class="btn btn-primary btn-enviar">Enviar</button>
        </div>
        </form>
    </div>
@endsection

@section('rodape')
<script>
    $(document).ready(function(){

        $(document).keypress(function(e) {
            if(e.which == 13) $('#btn-palavra').click();
        });

        $('#btn-palavra').click(function(){
            palavra = $('.add-ocasiao').val();
            $('.add').append('<input style="margin-right:4px" value="'+palavra+'" name="valor[]" class="btn-remove btn btn-secondary btn-sm"  type="button">');
            $('.add-ocasiao').val("");
        });

        // alert($('.teste').val());
        $(document).on('click','.btn-remove',function(){
            $(this).remove();
            // console.log($(this).val());
        });

        $(document).on('click','.btn-enviar',function(){

            var inputs = jQuery('input[name^="valor"]');
            var values = [];
            for(var i = 0; i < inputs.length; i++){
                values.push($(inputs[i]).val());
            }
            console.log(values);
        });

        // chama para o select
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                id_tema = 1;
                $dadosselect = 'id_tema='+id_tema+'&cod=1';
                $.ajax({
                    url:'tema',
                    type:'json',
                    method:'post',
                    data:$dadosselect,
                    success: function(result){
                        obj = JSON.parse(result);
                        tamanho = obj.id_tempo.length;
            
                        $html = '<option selected>Escolha um tema</option>';
                        $html += '<option value="0">Todos</option>';
                        for($i=0;$i<tamanho;$i++){
                            $html += '<option value="'+obj.id_tempo[$i]+'">'+obj.tempo[$i]+'</option>';
                        }
                        $('.select-tema').html($html);
                        // console.log('tudo ok');
                    },
                    error: function(result){

                    }
                });

        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        })

    });
</script>
@endsection