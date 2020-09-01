@extends('layouts.layout')

@section('metas')
<meta name="robots" content="noindex, nofollow">
@endsection

@section('conteudo')

    <div class="row" style="padding-top: 60px">
        <div class="col-md-6">
        <select class="custom-select custom-select mb-3 select-tema"></select>  
        </div>    
        <div class="col-md-6">
            <div class="input-group col-md-12">
                {{-- <label for="inputEmail4">Adicionar palavra</label> --}}
                <input class="form-control add-tema" type="text" maxlength="15"  placeholder="Adicionar tema" autofocus="true"> 
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="btn-tema">Enviar</button>
                  
                </div>
            </div>
        </div>

    </div>
    <div class="row box-ocasiao" style="display: none">
        <div class="col-md-12 text-secondary"><h3>Adicionar Ocasião</h3></div>
        <form action="javascript:void(0)">
        <div class="input-group col-md-12">
            {{-- <label for="inputEmail4">Adicionar palavra</label> --}}
            <input class="form-control add-ocasiao"  type="text" placeholder="Adicionar palavra" autofocus="true"> 
            <div class="input-group-append">
              <button class="btn btn-info" type="button" id="btn-palavra">Enviar</button>
              <button class="btn btn-secondary" type="button" id="btn-enviar-palavra">Atualizar</button>
            </div>
        </div>
        </form>
    </div><br>

    <div class="row box-ocasiao" style="display: none">        
        <form action="javascript:void(0)">                              
            <div class="form-group col-md-12 add"></div>
        </form>
    </div>
    <div class="row" >
        <div class="tabela col-md-12" style="height: 500px;overflow:auto;"></div>

    </div>
@endsection

@section('rodape')
    <script src="js/admin.js"></script>
@endsection