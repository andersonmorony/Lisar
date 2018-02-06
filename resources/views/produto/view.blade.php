@extends('layouts.app')

@section('content')
<div class="col-12">
    <a href="{{ url('/produto') }}">
      <img src="https://png.icons8.com/metro/20/000000/back.png"> Voltar
    </a>
</div>
  <div class="col-12" style="margin-top:30px;">

    <div class="card" id="valorAtualizado">
      <div class="card-body center">
        <small class="pull-right">
          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalLong"><img src="https://png.icons8.com/wired/20/000000/law.png"> Dar seu Lance!</button>
        </small>
        <div class="clearfix">
        </div>
        <p>MAIOR VALOR NO MOMENTO</p>
        <h1>R$: {{ $produto->valor or $produto->valor_inicial }} </h1><br>
        <small style="color:#fff27e;">Valor Ínicial: {{ $produto->valor_inicial }}</small>
        <p>{{ $produto->updated_at }}</p>
        <p>{{ 'Tempo Restante:'  }}</p>
      </div>
    </div>

    <ul class="list-group list-group-flush center">

      @foreach($lances as $item)
      <li class="list-group-item">
        <div class="row">
          <div class="col-4">
              <small>{{ $item->created_at }}</small>
          </div>
          <div class="col-4">
              <small>{{ $item->name }}</small><br>
          </div>
          <div class="col-4">
              <small> <b>R$: </b> {{ $item->valor }}</small>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3f51b5;color:#fff;">
        <h5 class="modal-title" id="exampleModalLongTitle">Lance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['url' => '/lance', 'method' => 'POST']) !!}

      <div class="modal-body">

        {!! Form::label('valor', 'Quanto será seu lance') !!}
        {!! Form::hidden('produto_id', $produto->id, ['class' => 'form-control']) !!}
        {!! Form::number('valor', '', ['class' => 'form-control']) !!}
        <small>* Lance não pode ser menor que o atual</small>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-warning">Dar o Lance</button>
      </div>
      {!! Form::close() !!}

    </div>
  </div>
</div>
@endsection
