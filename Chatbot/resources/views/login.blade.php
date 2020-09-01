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

    <div class="row h-100 box-form" style="height: 100vh !important;align-items: center;" >
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="javascript:void(0)" style="padding: 7%;
                border: 1px solid;
                border-color: #ccc;
                border-radius: 5px;">
                    <div class="form-group">Email</label>
                    <input type="email" class="form-control" id="email" value="<?= $_COOKIE['email_cookie'] ?? ""?>" >
                    </div>
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
                    <label for="exampleDropdownFormPassword2" >Senha</label>
                    <input type="password" class="form-control" id="senha"  value="<?= $_COOKIE['senha_cookie'] ?? ""?>">
                    </div>
                    <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="lembrar" name="lembrar">
                        <label class="form-check-label" for="dropdownCheck2">
                        Lembrar-me
                        </label>
                    </div>
                    </div>
                    <div style="margin-bottom: 10px">
                        <button type="submit" class="btn btn-dark" id="btn-login">Entrar</button>
                    </div>
                    <a href="cadastro" class="align-bottom" style="margin-top: 10px">Não possuo cadastro</a>
                </form>
            </div>
            <div class="col-md-4"></div>
    </div>

@endsection

@section('rodape')
    <script src="js/login.js"></script>
@endsection