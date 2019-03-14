@extends('template.template')

@section('content')

@if(isset($aluno))
    <h2>Atualização do Aluno: {{$aluno->nome}}</h2><br><hr>
    <form method="POST" action="{{route('alunos.update',$aluno->id)}}" >
    <input type="hidden" name='_method' value='PUT'>
@else
    <h2>Cadastro de Aluno</h2><br><hr>
    <form method="POST" action="{{route('alunos.store')}}" >
@endif
    <input type="hidden" name="_token" value="{{csrf_token()}}">

   <input type="hidden" name="id" value="{{isset($aluno->id)?$aluno->id:''}}">

    <div class="form-group">
        <label for="nome">NOME</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{isset($aluno->nome)?$aluno->nome:''}}" placeholder="XXXXXXX" required>
    </div>

    <div class="form-group">
        <label for="cpf">CPF</label>

        <input type="text" class="form-control" id="cpf" name="cpf" value="{{isset($aluno->cpf)?$aluno->cpf:''}}" placeholder="YYYYYYYY" required>
    </div>

    <div class="form-group">
        <label for="telefone">Telefone</label>

        <input type="text" class="form-control" id="telefone" name="telefone" value="{{isset($aluno->telefone)?$aluno->telefone:''}}" placeholder="kkkkkkkkkk" required>
    </div>

    <div class="form-group">
        <label for="email">EMAIL</label>
        <input type="email" class="form-control" id="email" name="email" value="{{isset($aluno->email)?$aluno->email:''}}" placeholder="user@user.com" required>
    </div>
    <div class="form-group">
        <label for="data">DATA DE NASCIMENTO</label>
        <input type="date" class="form-control" id="data" name="data" value="{{isset($aluno->data)?$aluno->data:''}}" placeholder="dd/mm/aaaa" required>
    </div>

    <div class="form-group">
    <select class="custom-select custom-select-lg mb-3" name='turma_id' id="turma_id">
        @foreach($turmas as $turma)
        <option value="{{$turma->id}}"
            @if( isset( $aluno ) && $aluno->turma_id == $turma->id) selected @endif>
            {{$turma->nome}}
        </option>
        @endforeach
    </select>
    </div>
    <a href="{{route('turmas.index')}}" class="btn btn-warning">Voltar</a> <input type="submit" class="btn btn-success" value="Cadastrar">  
</form><br>


@endsection