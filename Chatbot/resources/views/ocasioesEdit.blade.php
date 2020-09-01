@extends('layouts.layout')

@section('metas')
<meta name="robots" content="noindex, nofollow">
@endsection

<?php
$id_ocasiao = $_GET['id_ocasiao'];
$ocasiao = $_GET['ocasiao'];
$idTema = $_GET['tema'];
$tema = $_GET['temaText'];

?>
@section('conteudo')
    <div class="row">

        <div class="col-md-12">
        <div class="shadow-lg p-3 mb-5 bg-white rounded"><h2 class="text-secondary">{{$tema}}</h2><div><a href="{{'admin'}}" class="btn btn-danger " style="float: right;
            position: relative;
            bottom: 40px;">Retornar</a></div>
            <div><a href="{{'chat'}}" class="btn btn-secondary " style="float: right;
                position: relative;
                bottom: 40px;right:10px">Chat</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
 
        <form action="javascript:void(0)">
        <div class="input-group col-md-12">
            {{-- <label for="inputEmail4">Adicionar palavra</label> --}}
            <input class="form-control add-ocasiao"  type="text" placeholder="Adicionar palavra" autofocus="true"> 
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button" id="btn-palavra">Enviar</button>
            </div>
        </div>
        </form>
    </div><br>

    <div class="row">
        
        <form action="javascript:void(0)">          
            <?php $ocasiao = explode(",",$ocasiao);?>
            
            <div class="form-group col-md-12 add">
          
            </div>
        {{-- <div class="form-group col-md-12">

        <button class="btn btn-primary btn-ocasiao">Atualizar</button>
        </div> --}}
        </form>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-bottom: 20px">
            <div class="card-header">
                <h4 class="text-secondary">Criterios</h4>
            </div>
        </div><br>
        

        <form action="javascript:void(0)"> 
            <div class="col-md-12">
                <select class="custom-select select-tema"></select>
            </div>
            <div class="input-group col-md-12" style="margin-top: 20px">  
            <input class="form-control add-criterio" type="text" placeholder="Adicionar palavra" autofocus="true"> 
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="btn-criterio">Enviar</button>
            </div>
            </div>

        </form>
    </div>

    <div class="row">
        <form action="javascript:void(0)">

            <div class="form-group col-md-12 add-2">    
            
            </div>
 
        </form>
    </div>

    <div class="row" style="margin-top: 20px">
        
        
        <div class="col-md-12">
            <div class="card-header">
                <h4 class="text-secondary">Resposta</h4>
            </div>
        </div>
        <div class="col-md-12 box-select-resposta" style="margin-top: 20px;display:none">
            <select class="custom-select select-resposta"></select>
        </div>

        <div class="col-md-4 box-select-genero" style="margin-top: 20px;display:none">
            <select class="custom-select select-genero">
                <option value="0">Selecione um genero</option>
                <option value="1">Homem</option>
                <option value="2">Garota</option>
                <option value="3">Misto</option>
            </select>
        </div>
        
        <form action="javascript:void(0)">      
            <div class="input-group col-md-12" style="margin-top: 20px">  
            <input class="form-control add-resposta" type="text" placeholder="Adicionar resposta" autofocus="true"> 
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="btn-resposta">Enviar</button>
              </div>
            </div>

        </form>
    </div>

    <div class="row">
        <form action="javascript:void(0)">
        {{-- <div class="form-group col-md-4">
                <label for="inputEmail4">Adicionar palavra</label>
                <input class="form-control add-ocasiao" type="text" > 
                <button >Adicionar</button>         
            </div> --}}
            <div class="form-group col-md-12 add-3">
              
            </div>
        <div class="form-group col-md-12">

        <button class="btn btn-primary btn-enviar-resposta">Atualizar</button>
        </div>
        </form>
    </div>

<input type="button" value="{{$id_ocasiao}}" id="id-ocasiao-val">
<input type="button" value="{{$idTema}}" id="id-tema-val">
<input type="button" value="{{$tema}}" id="tema-val">

@endsection

@section('rodape')
<script src="js/ocasioes-edit.js"></script>
@endsection