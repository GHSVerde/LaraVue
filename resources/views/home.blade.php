@extends('layouts.app')

@section('content')


                <pagina tamanho="10">
                    <painel titulo="Dashboard">
                        <div class="row">
                            <div class="col-md-4">
                                <caixa qtd="80" titulo="Artigos" url="{{ route('artigos.index') }}" cor="#ffc107" icone="ion ion-ios-paper"></caixa>
                            </div>
                            <div class="col-md-4">
                                <caixa qtd="1500" titulo="Usuários" url="#" cor="#03A9F4" icone="ion ion-ios-people"></caixa>
                            </div>
                            <div class="col-md-4">
                                <caixa qtd="3" titulo="Autores" url="#" cor="#8BC34A" icone="ion ion-ios-person"></caixa>
                            </div>
                        </div>
                    </painel>
                </pagina>
@endsection
