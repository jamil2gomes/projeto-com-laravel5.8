@extends('template.template')

@section('content')
@include('painel.mensagens.mensagens')
@if(isset($turma))
    <h2>Atualização da Turma: {{$turma->nome}}</h2><br><hr>
    <form method="POST" action="{{route('turmas.update',$turma->id)}}" >
    <input type="hidden" name='_method' value='PUT'>
@else
    <h2>Cadastro de Turmas</h2><br><hr>
    <form method="POST" action="{{route('turmas.store')}}" >
@endif
    <input type="hidden" name="_token" value="{{csrf_token()}}">

   <input type="hidden" name="id" value="{{isset($turma->id)?$turma->id:''}}">

    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{isset($turma->nome)?$turma->nome:''}}" placeholder="XXXXXXX" required>
    </div>

    <div class="form-group">
        <label for="periodo">Periodo</label>

        <input type="text" class="form-control" id="periodo" name="periodo" value="{{isset($turma->periodo)?$turma->periodo:''}}" placeholder="YYYYYYYY" required>
    </div>

    <div class="form-group">
        <label for="ch">CH</label>
        <input type="text" class="form-control" id="ch" name="ch" value="{{isset($turma->ch)?$turma->ch:''}}" placeholder="99" required>
    </div>
    <a href="{{route('turmas.index')}}" class="btn btn-warning">Voltar</a>  <input type="submit" class="btn btn-success" value="Cadastrar">  
</form><br><br>


@endsection