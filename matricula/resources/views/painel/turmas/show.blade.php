@extends('template.template')

@section('content')


<h2>Detalhes da turma: {{$turma->nome}}</h2>

<p><b>Nome:</b>{{$turma->nome}}</p>
<p><b>Periodo:</b>{{$turma->periodo}}</p>
<p><b>CH:</b>{{$turma->ch}}</p>
<hr>
<a href="{{route('turmas.index')}}" class="btn btn-warning">Voltar</a>
<h2>Alunos da Turma</h2>

@if(count($alunos) == 0)
    <p><b>Não há alunos matriculados nessa turma</b></p>
@else
<table class="table table-hover">
<thead>
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">EMAIL</th>
        <th scope="col">DATA NASCIMENTO</th>
    </tr>
</thead>
<tbody>
    @foreach($alunos as $aluno)
        <tr>
            <td>{{$aluno->nome}}</td>
            <td>{{$aluno->cpf}}</td>
            <td>{{$aluno->email}}</td>
            <td>{{date( 'd/m/Y', strtotime($aluno->data))}}</td>
        </tr>
    @endforeach
</tbody>
</table>
@endif
<br>
<h2>Instrutores da Turma</h2>
@if(count($professores) == 0)
    <p><b>Não há instrutores vinculados a essa turma</b></p>
@else
<table class="table table-hover">
<thead>
    <tr>
        <th scope="col">NOME</th>
        <th scope="col">VALOR</th>
        <th scope="col">EMAIL</th>
        <th scope="col">CERTIFICADOS</th>
    </tr>
</thead>
<tbody>
    @foreach($professores as $professor)
        <tr>
            <td>{{$professor->nome}}</td>
            <td>{{$professor->valor_hora}}</td>
            <td>{{$professor->email}}</td>
            <td>{{$professor->certificados}}</td>
        </tr>
    @endforeach
</tbody>
</table>
@endif

<hr>



@endsection