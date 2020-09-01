
@extends('layouts.layout')

@section('metas')
<meta name="robots" content="noindex, nofollow">
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
</style>
@endsection

@section('conteudo')

        {{-- @if(empty(session('cad_person'))) --}}
     
       
        <div class="row h-100 box-form" style="height: 80vh !important;align-items: center;" >
            <div class="col-md-12 text-center text-secondary titulo-avatar"><h2>Cadastre-se, é de GRAÇA!</h2></div>

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
                    <div class="form-group">
                        <label for="email">Email</label><br>
                        <small class="erro-email text-danger"></small>
                        <input type="email" class="form-control" id="email" name="email" maxlength="30">
                    </div>
                    {{-- <div class="form-group">
                        <label for="password">Nascimento</label><br>
                        <small class="erro-nasc text-danger"></small>
                        <input type="date" class="form-control" id="nascimento" name="nascimento">
                    </div> --}}
                    <div class="form-group">
                    <label for="nome">Interesse</label><br>
                    <small class="erro-interesse text-danger"></small>

                    <select class="custom-select" id="select-interesse">
                        <option value="0" selected>Escolha uma opção</option>
                        <option value="1">Alimentação</option>
                        <option value="2">Beleza e Moda</option>
                        <option value="3">Entretenimento</option>
                        <option value="4">Educação</option>
                        <option value="5">Esportes</option>
                        <option value="6">Negócios</option>
                        <option value="7">Sexo</option>
                        <option value="8">Tecnologia</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Senha</label><br>
                        <small class="erro-senha text-danger"></small>
                        <input type="password" class="form-control" maxlength="10" id="senha" name="password">
                    </div>
                    <small class="erro-demaior text-danger"></small><br>

                    <div class="form-check">

                        <input type="checkbox" class="form-check-input" id="demaior" name="demaior">
                        <label class="form-check-label" for="dropdownCheck2">
                        Sou maior de 18 anos
                        </label>
                        
                    </div>
                    <div style="margin-bottom: 10px;margin-top:10px">
                    <button type="submit" class="btn btn-dark btn-cadastrar" >Cadastrar</button>
                    </div>
                    <a href="login" class="align-bottom" style="margin-top: 10px">Já possuo cadastro</a>

                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
     
@endsection

@section('rodape')
    <script src="js/cadastro.js"></script>
@endsection