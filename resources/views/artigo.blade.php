@extends('layouts.app')

@section('content')
<pagina tamanho="12">
  <painel>

  <h1 align='center'>{{ $artigo->titulo }}</h1>
  <p align='center'>{{ $artigo->descricao }}</p>
  <div>
    {!! $artigo->conteudo !!}
  </div>
<p align='center'><small>Por: {{ $artigo->user->name }} - {{ date('d/m/Y', strtotime($artigo->data)) }}</small></p>
<btn url={{route('site')}}
     texto='Voltar'
     cor='indigo'></btn>
  </painel>
<pagina>

@endsection