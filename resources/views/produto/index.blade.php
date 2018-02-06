@extends('layouts.app')

@section('content')

<div class="col-12">
  <div class="row">
    <div class="col-md-3">
      <div class="alert alert-light" role="alert">
        Filtrar produtos
      </div>
      {!! Form::open(['action' => 'Cadastro\\ProdutoController@index']) !!}
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Pesquisar com palavra chave" aria-label="pesquisar" aria-describedby="basic-addon1">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-success" name="button"><img src="https://png.icons8.com/ios/20/ffffff/search.png"></button>
            </div>
        </div>
      {!! Form::close() !!}

      <ul class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">Escolher categoria</a>
        <a href="#" class="list-group-item list-group-item-action"> <img src="https://png.icons8.com/ios/30/000000/tv-filled.png"> Eletrônico</a>
        <a href="#" class="list-group-item list-group-item-action"> <img src="https://png.icons8.com/wired/30/000000/coins.png"> Moedas</a>
        <a href="#" class="list-group-item list-group-item-action"> <img src="https://png.icons8.com/ios/30/000000/traffic-jam-filled.png"> Automoveis</a>
        <a href="#" class="list-group-item list-group-item-action"> <img src="https://png.icons8.com/ios/30/000000/home-filled.png"> Imoveis</a>
      </ul>
    </div>
    <div class="col-md-9">
          <h6> <img src="https://png.icons8.com/ios-glyphs/20/ff5722/fire-element.png">Produtos em destaques</h6>
          <hr>
          <div class="list-group">
          @foreach($produto as $item)
            <a href="{{url('/produto/'.$item->id)}}" class="list-group-item list-group-item-action listProduct">
                <img src="https://png.icons8.com/color/30/ffffff/barcode.png" alt="" class="img-responsive">
                  <small>{{ $item->titulo_produto }}</small>
                  <small class=""> <b>R$: </b>{{ $item->valor_inicial }}</small>
                  <small class="pull-right"> <button type="button" class="btn btn-warning btn-sm" name="button"><img src="https://png.icons8.com/wired/20/000000/law.png"> Compre Agora! </button> </small>
            </a>
          @endforeach
        </div>
    </div>
  </div>
</div>

@endsection
