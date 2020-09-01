<?php
use App\Http\Controllers\interesseController;
?>
@extends('layouts.layout')

@section('title')
<title>Papo artificial bate-papo grátis- preencha os campos e comece agora mesmo</title>
@endsection

@section('estilo')
<style>
    body{
        /* background:#000; */
    }
    form{
        background: #fff;
        box-shadow: 0px 0px 10px 0px;
    }
    @media (max-width:600px){
        h1{
            font-size: 1.6rem;
            /* margin-top: 30px; */
            /* margin-bottom: 30px; */
        }
    }
    h1{
            margin-top: 30px; 
            margin-bottom: 40px; 
        }
</style>
@endsection

@section('metas')
<link rel = "canonical" href = "https://papoartificial.com.br/start-chatbot">
@endsection

@section('conteudo')

        {{-- @if(empty(session('cad_person'))) --}}
     
       
        <div class="row h-100 box-form" style="height: 80vh !important;align-items: center;" >
            <div class="col-md-12 text-center text-secondary titulo-avatar">
                <h1>Sem cadastro, é rápido e GRÁTIS!</h1>    
            </div>

            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form style="padding: 7%;
                border: 1px solid;
                border-color: #ccc;
                border-radius: 5px;" action="javascript:void(0)">
                    <div class="form-group">
                        <label for="nome">Apelido</label><br>
                        <small class="erro-nome text-danger"></small>
                        <input type="text" maxlength="20" class="form-control" id="apelido" name="nome">
                    </div>
                
                    {{-- <div class="form-group">
                        <label for="password">Nascimento</label><br>
                        <small class="erro-nasc text-danger"></small>
                        <input type="date" class="form-control" id="nascimento" name="nascimento">
                    </div> --}}
                    <div class="form-group">
                    <label for="nome">Interesse</label><br>
                    <small class="erro-interesse text-danger"></small>
                        <?php
                            $interesse = new interesseController;
                            $interesse = $interesse->getInteresse();
                        
                        ?>
                    <select class="custom-select" id="select-interesse">
                        <option value="0" selected>Escolha uma opção</option>
                        @foreach ($interesse as $item)
                            <option value="{{$item->id_interesse}}">{{$item->interesse}}</option>
                        @endforeach

                    </select>
                    </div>
                    <div class="form-group">
                    <label>Eu sou:</label><br>
                    <small class="erro-sexo text-danger"></small>
                    <select class="custom-select" id="select-sexo">
                        <option value="0">Escolha uma opção</option>
                        <option value="avatar-02.png">Mulher</option>
                        <option value="avatar-01.png">Homem</option>
                    </select>
                     
                    </div>
                    
                    <small class="erro-demaior text-danger"></small><br>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="demaior" name="demaior">
                        <label class="form-check-label" for="dropdownCheck2">
                        Sou maior de 18 anos
                        </label>
                        
                    </div>
                    <div style="margin-bottom: 10px;margin-top:10px">
                    <button type="submit" class="btn btn-dark btn-cadastrar" >Iniciar Chat</button>
                    </div>
                    {{-- <a href="login" class="align-bottom" style="margin-top: 10px">Já possuo cadastro</a> --}}

                </form>
            </div>
            <div class="col-md-4"></div>
        </div>

    
    
     
@endsection

@section('rodape')
    <script src="js/start.js"></script>
@endsection