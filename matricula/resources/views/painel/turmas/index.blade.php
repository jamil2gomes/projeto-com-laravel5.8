@extends('template.template')

@section('content')
<h1>SISTEMA DE CONTROLE DE MATRÍCULAS</h1>
<h2>Informações da Instituição</h2>
<ol>
    <li>Nome da instituição: XXXXXXXXXX</li>
    <li>Endereço:            XXXXXXXXXX</li>
    <li>Razão Social:        XXXXXXXXXX</li>
    <li>Telefone:            XXXXXXXXXX</li>
</ol><br>
<h2>Informações de turmas</h2>
<br>
<a href="{{route('turmas.create')}}" class="btn btn-primary">Nova Turma</a><br><br>
@include('painel.mensagens.mensagens')
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Periodo</th>
      <th scope="col">CH</th>
      <th scope='col' >Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($turmas as $turma)
         <tr>
            <td><a href="{{route('turmas.show',$turma->id)}}"> {{$turma->nome}}</a></td>
            <td>{{$turma->periodo}}</td>
            <td>{{$turma->ch}}</td>
            <td><a href="{{route('turmas.edit',$turma->id)}}" class="btn btn-info btn-block">Editar</a>
          
                <form action="{{route('turmas.destroy',$turma->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input class="btn btn-danger btn-block" type="submit" value="Apagar">
                </form>
            </td>
         </tr>
    @endforeach
    {{$turmas->links()}}
  </tbody>
</table>

<h2>Informações de alunos</h2>
<br>
<a href="{{route('alunos.create')}}" class="btn btn-primary">Novo Aluno</a><br><br>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">DATA NASCIMENTO</th>
      <th scope="col">TELEFONE</th>
      <th scope='col' >AÇÃO</th>
    </tr>
  </thead>
  <tbody>
    @foreach($alunos as $aluno)
         <tr>
            <td>{{$aluno->nome}}</td>
            <td>{{$aluno->cpf}}</td>
            <td>{{date( 'd/m/Y', strtotime($aluno->data))}}</td>
            <td>{{$aluno->telefone}}</td>
            <td><a href="{{route('alunos.edit',$aluno->id)}}" class="btn btn-info  btn-block">Editar</a>

                <form action="{{route('alunos.destroy',$aluno->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input class="btn btn-danger btn-block" type="submit" value="Apagar">
                </form>
            </td>
         </tr>
    @endforeach
    {{$alunos->links()}}
  </tbody>
</table>


<h2>Informações de instrutores</h2>
<br>
<a href="{{route('professores.create')}}" class="btn btn-primary">Novo Professor</a><br><br>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">EMAIL</th>
      <th scope="col">VALOR</th>
      <th scope="col">CERTIFICADOS</th>
      <th scope='col' >AÇÃO</th>
    </tr>
  </thead>
  <tbody>
    @foreach($professores as $professor)
         <tr>
            <td>{{$professor->nome}}</td>
            <td>{{$professor->email}}</td>
            <td>{{$professor->valor_hora}}</td>
            <td>{{$professor->certificados}}</td>
            <td>
              <a href="{{route('professores.edit',$professor->id)}}" class="btn btn-info  btn-block">Editar</a>
                <form action="{{route('professores.destroy',$professor->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input class="btn btn-danger  btn-block" type="submit" value="Apagar">
                </form>
            </td>
         </tr>
    @endforeach
    {{$professores->links()}}
  </tbody>
</table>

@endsection