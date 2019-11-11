@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
    <painel titulo="Artigos">

      <p>
      <form action="{{ route('site') }}" method="GET" class="form-inline text-center">
      <input type="search" name="busca" id="busca" placeholder="Buscar" value="{{ isset($busca)? $busca : '' }}" class="form-control">
        <button class="btn btn-info"> Buscar</button>
      </form>
      </p>

            <div class="row">
              @foreach ($lista as $key => $value)
                    
            <artigocard data='{{$value->data}}'
            titulo='{{ str_limit($value->titulo, 50, "(...)") }}'
            descricao='{{ str_limit($value->descricao, 50, "...") }}'
            autor='{{ $value->autor }}'
            url='{{ route('artigo', [$value->id, str_slug($value->titulo)]) }}'
            imagem='http://lorempixel.com/640/640'>
          </artigocard>
          @endforeach
        </div>

        <div align="right"> {{ $lista }}</div>

    </painel>
        <pagina>
                
@endsection
