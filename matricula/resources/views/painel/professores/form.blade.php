@extends('template.template')

@section('content')

@include('painel.mensagens.mensagens')

@if(isset($professor))
    <h2>Atualização do Professor: {{$professor->nome}}</h2><br><hr>
    <form method="POST" action="{{route('professores.update',$professor->id)}}" >
    <input type="hidden" name='_method' value='PUT'>
@else
    <h2>Cadastro de Professor</h2><br><hr>
    <form method="POST" action="{{route('professores.store')}}" >
@endif
    <input type="hidden" name="_token" value="{{csrf_token()}}">

   <input type="hidden" name="id" value="{{isset($professor->id)?$professor->id:''}}">

    <div class="form-group">
        <label for="nome">NOME</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{isset($professor->nome)?$professor->nome:''}}" placeholder="XXXXXXX" required>
    </div>

    <div class="form-group">
        <label for="email">EMAIL</label>
        <input type="email" class="form-control" id="email" name="email" value="{{isset($professor->email)?$professor->email:''}}" placeholder="user@user.com" required>
    </div>
    <div class="form-group">
        <label for="certificados">Certificado</label>
        <input type="text" class="form-control" id="certificados" name="certificados" value="{{isset($professor->certificados)?$professor->certificados:''}}" placeholder="mmmmmmmm" required>
    </div>

    <div class="form-group">
        <label for="valor_hora">Valor Hora</label>
        <input type="text" class="form-control" id="valor_hora" name="valor_hora" value="{{isset($professor->valor_hora)?$professor->valor_hora:''}}" placeholder="900,00" required>
    </div>
    
      <!-- aqui a parada fica um pouco enrolada  -->
    <div class="form-group">
    <select multiple class="custom-select custom-select-lg mb-3" name="turma_id[]" id="turma_id">
        @foreach($turmas as $turma)
        <option value="{{$turma->id}}" 
            @if( isset( $professor ) && count($turmas_selecionadas) > 0) 
                @foreach($turmas_selecionadas as $turma1)
                    @if($turma1->id == $turma->id)  
                        selected
                    @endif
                 @endforeach
             @endif>
            {{$turma->nome}}
        </option>
        @endforeach
    </select>
    </div>
    <a href="{{route('turmas.index')}}" class="btn btn-warning">Voltar</a> <input type="submit" class="btn btn-success" value="Cadastrar">  
</form><br>


@endsection